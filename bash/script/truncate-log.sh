#!/bin/bash
echo "==================================================="
echo "Powered by Hung Nguyen - dev@nguyenanhung.com"
echo "==================================================="

# Kiểm tra xem đã truyền đúng số lượng tham số hay chưa
if [ "$#" -ne 1 ]; then
    echo "Sử dụng: $0 <đường dẫn thư mục logs>"
    exit 1
fi

# Lấy đường dẫn đến thư mục logs từ tham số
logs_folder="$1"

# Kiểm tra xem thư mục logs tồn tại
if [ ! -d "$logs_folder" ]; then
    echo "Thư mục logs không tồn tại."
    exit 1
fi

# Mảng tên các tệp log
log_files=(
    "access.log"
    "error.log"
)

# Duyệt qua từng tệp log và truncate chúng
for log_file in "${log_files[@]}"; do
    if [ -f "$logs_folder/$log_file" ]; then
        truncate -s 0 "$logs_folder/$log_file"
        echo "Đã truncate tệp log $log_file."
    else
        echo "Tệp log $log_file không tồn tại trong thư mục logs."
    fi
done

echo "Đã truncate các tệp log trong thư mục logs."
