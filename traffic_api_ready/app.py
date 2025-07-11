from flask import Flask, request, jsonify
from flask_cors import CORS
from model.congestion_model import predict_congestion  # تأكد أن الملف موجود ومسمى صح

app = Flask(__name__)
CORS(app)

@app.route('/predict', methods=['POST'])
def predict():
    try:
        # ✅ بيانات غير مستخدمة الآن لكنها موجودة لو حبيتي توسعي لاحقًا
        data = request.get_json()
        print("✅ Received from client:", data)

        # ✅ استدعاء الدالة لجلب نسب الزحام
        congestion_percentages = predict_congestion()

        # ✅ إرسالهم في JSON
        return jsonify({'congestion': congestion_percentages})

    except Exception as e:
        print("❌ Error:", str(e))
        return jsonify({'error': str(e)}), 400

if __name__ == '__main__':
    app.run(debug=True)
