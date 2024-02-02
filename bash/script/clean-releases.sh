#!/bin/bash
echo "==================================================="
echo "Powered by Hung Nguyen - dev@nguyenanhung.com"
echo "==================================================="

# Kiểm tra xem có tham số được truyền vào không
if [ -z "$1" ]; then
    echo "Cần chỉ định thư mục releases!"
    exit 1
fi

parent_folder="$1"

echo "============|| Clean folder Releases ||============"
echo "Folder Releases: $parent_folder"
echo "Script xoá các thư mục releases cũ cho nó nhẹ folder"

echo "Danh sách các folder hiện tại".
echo "==================================================="
ls -la "$parent_folder"

echo "==================================================="
# Lấy danh sách thư mục con
subfolders=($(ls -d $parent_folder/*))

# Sắp xếp thư mục con theo tên giảm dần
IFS=$'\n' sorted_subfolders=($(sort -r <<<"${subfolders[*]}"))

echo "==================================================="
echo "Giữ lại 5 thư mục được releases gần nhất"
echo "==================================================="

# Giữ lại 3 thư mục có tên lớn nhất, xoá các thư mục khác
for ((i = 0; i < ${#sorted_subfolders[@]}; i++)); do
    subfolder=${sorted_subfolders[i]}

    # Điều chỉnh số bản releases được giữ lại tại đây
    if [ $i -lt 5 ]; then
        echo "Giữ lại thư mục: $subfolder"
    else
        echo "Xoá thư mục: $subfolder với lệnh (sudo rm -rf: $subfolder)"
        # Thêm lệnh để xoá thư mục khi bạn đã kiểm tra và chắc chắn rằng script hoạt động đúng
        sudo rm -rf "$subfolder"
    fi
done

echo "==================================================="
ls -la "$parent_folder"

echo "==================================================="
echo "Finished script"
echo "==================================================="
