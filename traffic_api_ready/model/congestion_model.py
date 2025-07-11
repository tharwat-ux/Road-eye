import numpy as np
import joblib
import os
from datetime import datetime
import math

# تحديد الفترات الزمنيةب 240 قيمة)
timestamp = np.arange(1, 1441,60)

# تحويل اليوم النصي إلى رقم
def day_to_number(day):
    days = {
        'saturday': 0,
        'sunday': 1,
        'monday': 2,
        'tuesday': 3,
        'wednesday': 4,
        'thursday': 5,
        'friday': 6
    }
    return days.get(day.lower(), -1)

# اليوم الحالي كنص ثم كرقم
today_day = datetime.today().strftime('%A')  # "Monday", "Tuesday"...
today = day_to_number(today_day)

# المسار الأساسي
BASE_DIR = os.path.dirname(os.path.abspath(__file__))  # ✅ صححنا _file إلى _file_

def predict_congestion(data=None):
    # تحميل الموديلات
    poly = joblib.load(os.path.join(BASE_DIR, "polynomial_features.pkl"))
    model = joblib.load(os.path.join(BASE_DIR, "polynomial_model.pkl"))
    scaler_X = joblib.load(os.path.join(BASE_DIR, "scaler_X.pkl"))
    scaler_y = joblib.load(os.path.join(BASE_DIR, "scaler_y.pkl"))

    congestion_list = []

    for i in range(len(timestamp)):
        x_input = np.array([[ 
            timestamp[i],  # الدقائق منذ منتصف الليل
            today,         # اليوم
            0,             # عدد الحوادث
            0              # الطقس
        ]])

        # المعالجة والتنبؤ
        x_scaled = scaler_X.transform(x_input)
        x_poly = poly.transform(x_scaled)
        y_pred_scaled = model.predict(x_poly)
        y_pred = scaler_y.inverse_transform(y_pred_scaled)

        avg_speed = y_pred[0][0]
        car_count = y_pred[0][1]
        congestion = min(100, (car_count ** 1.5) * math.exp(-avg_speed / 25))
        congestion_list.append(round(congestion, 2))  # ✅ فقط نسبة الزحام

    return congestion_list