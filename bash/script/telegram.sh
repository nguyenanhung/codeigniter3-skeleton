#!/bin/bash
echo "==================================================="
echo "Powered by Hung Nguyen - dev@nguyenanhung.com"
echo "==================================================="

# Kiểm tra xem có đủ 3 tham số không
if [ $# -ne 3 ]; then
  echo "Use: $0 <project_name> <message> <url>"
  exit 1
fi

# Lưu các tham số vào biến
project_name="$1"
message="$2"
url="$3"

# Cấu hình token của bot Telegram
telegram_bot_token="xxx"

# Gửi tin nhắn tới bot Telegram
curl -s -X POST "https://api.telegram.org/bot$telegram_bot_token/sendMessage" \
  -d "chat_id=xxx" \
  -d "text=Project: $project_name%0AMessage: $message%0AURL: $url"

echo ""
#echo "Đã gửi thông báo thành công!"
