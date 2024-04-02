<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // xiaomi 3 - samsung 1 - iphone 7
        // name - des - price - feature - qty - sale_amout - cate - manu
        $Products = [
            ['Samsung Galaxy S23', 'Hiệu năng vượt trội với con chip hàng đầu Qualcomm - 
            Phục vụ tốt nhu cầu đa nhiệm ngày của người dùng.', 13750000, rand(0, 1), rand(0, 20), 150000, 1, 1],
            ['Samsung Galaxy S23 Ultra', 'Thoả sức chụp ảnh, quay video chuyên nghiệp - Camera đến 200MP, 
            chế độ chụp đêm cải tiến, bộ xử lí ảnh thông minh', 22990000, rand(0, 1), rand(0, 20), 100000, 1, 1],
            ['iPhone 15 128GB Chính hãng', 'iPhone 15 128GB được trang bị màn hình Dynamic Island kích thước 6.1 
            inch với công nghệ hiển thị Super Retina XDR màn lại trải nghiệm hình ảnh vượt trội.', 19790000, rand(0, 1), rand(0, 20), 0, 1, 7],
            ['Xiaomi Redmi Note 13 6GB/128GB', 'Redmi Note 13 mang đến những tính năng
            và hiệu năng vượt trội so với các đối thủ cùng tầm
            giá. Trong bài đánh giá này, chúng ta sẽ cùng khám
            phá những điểm nổi bật của Redmi Note 13 và xem
            liệu nó có phải là lựa chọn tốt nhất trong phân khúc
            giá rẻ hay không', 4990000, rand(0, 1), rand(0, 20), 15000, 1, 3],
            ['Xiaomi Redmi A2', 'Trong phân khúc điện thoại tầm trung, Xiaomi Redmi A2 2GB/32GB là một 
            trong những lựa chọn đáng cân nhắc nhất hiện nay. Với mức giá chỉ từ
            1.749.000 đồng, Redmi A2 vẫn mang đến cho người dùng thiết kế hiện đại,
            màn hình lớn, hiệu năng ổn định và camera chụp ảnh sắc nét cùng nhiều
            tính năng nổi bật, đáp ứng tốt nhu cầu sử dụng. Bây giờ hãy cùng 
            Điện thoại Giá Kho khám phá dòng điện thoại này nhé!', 1649000, rand(0, 1), rand(0, 20), 0, 1, 3],
            ['iPhone 15 Plus', 'Phone 15 256GB được cải tiến vượt bậc về cấu hình nhờ được trang bị con 
            chip A16 Bionic 2 lõi hiệu năng cho tốc độ nhanh chóng và tiết kiệm điện hơn
            . Camera với cảm biến chính 48MP cho chất lượng ảnh sắc nét đáng kinh
            ngạc. Máy sử dụng viên pin dung lượng lớn và hỗ trợ sạc nhanh 20W tiện
            lợi. Đặc biệt, Dynamic Island trên iPhone 14 Pro và Promax nay đã được
            trang bị trên iPhone 256GB bản tiêu chuẩn', 23490000, rand(0, 1), rand(0, 20), 0, 1, 7],
            [
                'Vivo Y35', 'vivo Y35 là một chiếc điện thoại tầm trung đáng chú ý được ra mắt vào tháng 10/2022,
            máy nổi bật nhờ sở hữu thiết kế đẹp, khả năng sạc nhanh cùng cấu hình ổn trong phân khúc,
            ngoài ra camera với độ phân giải lên đến 50 MP cũng là điểm cộng dành cho chiếc máy này.',
                4500000, rand(0, 1), rand(0, 20), 0, 1, 8
            ],
        ];
        // product_item
        // __SAMSUNG
        foreach ($Products as $key => $value) {
            Product::factory()->create([
                'name' => $value[0],
                'description' => $value[1],
                'price' => $value[2], 'feature' => $value[3],
                'qty' => $value[4], 'sale_amount' => $value[5],
                'category_id' => $value[6],
                'manufacture_id' => $value[7],
            ]);
        }

        $images = [
            ['Samsung Galaxy S23', 'samsung-galaxy-s23-den.jpg'],
            ['Samsung Galaxy S23 Ultra', 'samsung-galaxy-s23-ultra.jpg'],
            ['iPhone 15 128GB Chính hãng', 'iphone-15-den.jpg'],
            ['Xiaomi Redmi Note 13 6GB/128GB', 'xiaomi-redmi-note-13.png'],
            ['Xiaomi Redmi A2', 'xiaomi-redmi-a2.png'],
            ['iPhone 15 Plus', 'iphone-15-plus.png'],
            ['Vivo Y35', 'vivo-y35.png']
        ];
        foreach ($images as $key => $value) {
            ProductImage::factory()->create([
                'name' => $value[0],
                'url' => $value[1],
                'product_id' => $key + 1,
            ]);
        }

        $color = ['Black', 'White', 'Yellow', 'Blue', 'Pink', 'Red', 'Gray', 'Green', 'Purple'];
        foreach ($color as $value) {
            ProductColor::factory()->create([
                'color' => $value,
                'product_id' => rand(1, 5),
            ]);
        }
    }
}
