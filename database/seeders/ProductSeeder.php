<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\Color;
use App\Models\Banner;
use App\Models\BannerImage;
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
        //__PRODUCT_SMARTPHONE__
        $products = [
            ['Samsung Galaxy S23 Ultra', 'Thoả sức chụp ảnh, quay video chuyên nghiệp - Camera đến 200MP, 
            chế độ chụp đêm cải tiến, bộ xử lí ảnh thông minh', 22990000, rand(0, 1), rand(0, 20), 100000, 1, 1],
            ['Samsung Galaxy S23', 'Hiệu năng vượt trội với con chip hàng đầu Qualcomm - 
            Phục vụ tốt nhu cầu đa nhiệm ngày của người dùng.', 13750000, rand(0, 1), rand(0, 20), 150000, 1, 1],
            ['iPhone 15 128GB', 'iPhone 15 128GB được trang bị màn hình Dynamic Island kích thước 6.1 
            inch với công nghệ hiển thị Super Retina XDR màn lại trải nghiệm hình ảnh vượt trội.', 19790000, rand(0, 1), rand(0, 20), 0, 1, 7],
            ['Xiaomi Redmi Note 13', 'Redmi Note 13 mang đến những tính năng
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
            ], [
                'Google Pixel 3', 'Google Pixel 3 thuộc thế hệ thứ 3 trong dòng Pixel được thiết kế bởi chính Google
             và thực sự đây là một chiếc smartphone Android đáng sở hữu nhất thời điểm hiện tại.', 2290000, rand(0, 1),
                rand(0, 20), 0, 1, 3
            ],
            [
                'Samsung Galaxy A15', 'Samsung cải thiện dòng sản phẩm phân khúc giá thấp của mình trong năm 2023
             thông qua việc giới thiệu mẫu Samsung Galaxy A15 5G. Với một thiết kế độc đáo và hiện đại, sản phẩm đáp
              ứng đầy đủ các tiêu chí về hiệu suất và giá trị với cấu hình ổn định và giá cả vô cùng hợp lý.', 5990000, rand(0, 1),
                rand(0, 20), 0, 1, 1
            ],

            [
                'iphone 15 Pro Max', 'iPhone 15 Pro Max là một chiếc điện thoại thông minh cao cấp được mong đợi nhất 
            năm 2023. Với nhiều tính năng mới và cải tiến, iPhone 15 Pro Max chắc chắn sẽ là một lựa chọn tuyệt vời
             cho những người dùng đang tìm kiếm một chiếc điện thoại có hiệu năng mạnh mẽ, camera chất lượng và thiết
              kế sang trọng.
            ', 34250000, rand(0, 1), rand(0, 20), 0, 1, 7
            ],
            [
                'iphone 15 Pro', 'iPhone 15 Pro Max là một chiếc điện thoại thông minh cao cấp được mong đợi nhất 
            năm 2023. Với nhiều tính năng mới và cải tiến, iPhone 15 Pro Max chắc chắn sẽ là một lựa chọn tuyệt vời
             cho những người dùng đang tìm kiếm một chiếc điện thoại có hiệu năng mạnh mẽ, camera chất lượng và thiết
              kế sang trọng.
            ', 26490000, rand(0, 1), rand(0, 20), 0, 1, 7
            ],

            ['Xiaomi 14 5G', 'Xiaomi 14 được ra mắt với tâm hướng mang đến những trải nghiệm mới mẻ và chất lượng. Như một lá cờ đầu trong ngành công nghệ, điện thoại không chỉ có thiết kế đẹp mà còn ấn tượng về màn hình, cấu hình mạnh mẽ, máy ảnh chất lượng và pin có thời gian sử dụng 
            lâu dài.', 22490000, rand(0, 1), rand(0, 20), 250000, 1, 3],
            ['  Xiaomi Redmi Note 13 Pro', 'Sự bùng nổ của công nghệ di động trong những năm gần đây đã mang đến cho người dùng vô số lựa chọn smartphone đa dạng. Trong phân khúc tầm trung, Xiaomi Redmi Note 13 Pro 128GB nổi lên như một ứng cử viên sáng giá với những ưu điểm vượt trội về 
            thiết kế, hiệu năng nhờ chip Helio G99-Ultra, camera 200 MP và kết hợp sạc nhanh 67 W.', 6890000, rand(0, 1), rand(0, 20), 0, 1, 3],
            ['realme Note 50', 'realme Note 50 64GB tiếp tục thu hút sự chú ý nhờ vào mức giá nổi bật và hấp dẫn của mình. Mặc dù nằm trong phân khúc giá thấp, sản phẩm này vẫn mang đến nhiều công nghệ ấn tượng, tạo nên sự đáng chú ý khi trang bị màn hình lớn 6.74 inch, pin 5000 mAh và đạt 
            chuẩn IP54.', 2490000, rand(0, 1), rand(0, 20), 0, 1, 6],
            ['realme C67', 'Nhằm mang đến cho người dùng thêm nhiều lựa chọn ở phân khúc giá rẻ thì realme đã cho ra mắt realme C67, một sản phẩm nổi bật với thiết kế sang trọng, camera chụp ảnh đẹp cùng pin lớn có sạc nhanh, hứa hẹn đem đến nhiều trải nghiệm tốt cho
             người dùng.', 5290000, rand(0, 1), rand(0, 20), 0, 1, 6],
            ['OPPO Reno11 F 5G', 'OPPO Reno11 F 5G là một chiếc điện thoại tầm trung mới được OPPO ra mắt trong thời gian gần đây. Máy sở hữu nhiều ưu điểm nổi bật như thiết kế trẻ trung, màn hình đẹp, hiệu năng mạnh mẽ nhờ chip Dimensity 7050 5G, hứa hẹn mang đến 
            trải nghiệm tốt khi sử dụng.', 8990000, rand(0, 1), rand(0, 20), 0, 1, 4],
            [
                'Samsung Galaxy S24 5G', 'Trong sự kiện Unpacked 2024 diễn ra vào ngày 18/01, Samsung đã chính thức ra mắt chiếc điện thoại Samsung Galaxy S24. Sản phẩm này mang đến nhiều cải tiến độc đáo, bao gồm việc sử dụng chip mới của Samsung, tích hợp nhiều tính năng thông minh sử dụng 
            trí tuệ nhân tạo và cải thiện đáng kể hiệu suất chụp ảnh từ hệ thống camera.',
                20490000, rand(0, 1), rand(0, 20), 300000, 1, 1
            ],
            [
                'Samsung Galaxy S24+ 5G', 'Samsung đã cho ra mắt Samsung Galaxy S24+ 5G 256GB, chiếc điện thoại đẳng cấp của họ tại sự kiện hàng năm diễn ra vào ngày 18/01 tại Mỹ. Điểm độc đáo của sản phẩm nằm ở chip mới của Samsung, đi kèm với sự phát triển trong việc bổ sung nhiều tính năng
                 thông minh có tích hợp AI và tăng cường khả năng chụp ảnh ở phần camera.',
                23490000, rand(0, 1), rand(0, 20), 200000, 1, 1
            ],
        ];

        foreach ($products as $key => $value) {
            Product::factory()->create([
                'name' => $value[0],
                'description' => $value[1],
                'price' => $value[2], 'feature' => $value[3],
                'qty' => $value[4], 'sale_amount' => $value[5],
                'category_id' => $value[6],
                'manufacture_id' => $value[7],
            ]);
            ProductColor::factory()->create([
                'color_id' => rand(1, 3),
                'product_id' =>  $key + 1,
            ]);
            ProductColor::factory()->create([
                'color_id' => rand(1, 9),
                'product_id' =>  rand(1, 18),
            ]);
        }

        $images = [
            ['Samsung Galaxy S23 Ultra', 'samsung-galaxy-s23-ultra.jpg'],
            ['Samsung Galaxy S23', 'samsung-galaxy-s23.jpg'],
            ['iPhone 15 128GB', 'iphone-15.jpg'],
            ['Xiaomi Redmi Note 13', 'xiaomi-redmi-note-13.jpg'],
            ['Xiaomi Redmi A2', 'xiaomi-redmi-a2.jpg'],
            ['iPhone 15 Plus', 'iphone-15-plus.jpg'],
            ['Vivo Y35', 'vivo-y35.jpg'],
            ['Google Pixel 3', 'google-pixel-3.jpg'],
            ['Samsung Galaxy A15', 'samsung-galaxy-a15.jpg'],
            ['iphone 15 Pro Max', 'iphone-15-pro-max.jpg'],
            ['iphone 15 Pro', 'iphone-15-pro.jpg'],
            ['Xiaomi 14 5G', 'xiaomi-14.jpg'],
            ['Xiaomi Redmi Note 13 Pro', 'xiaomi-redmi-note-13-pro.jpg'],
            ['realme Note 50', 'realme-note-50.jpg'],
            ['realme C67', 'realme-c67.jpg'],
            ['OPPO Reno11 F 5G', 'oppo-reno-11.jpg'],
            ['Samsung Galaxy S24 5G', 'samsung-galaxy-s24.jpg'],
            ['Samsung Galaxy S24+ 5G', 'samsung-galaxy-s24-plus.jpg'],
        ];

        foreach ($images as $key => $value) {
            ProductImage::factory()->create([
                'name' => $value[0],
                'url' => $value[1],
                'product_id' => $key + 1,
            ]);
        }


        for ($i = 0; $i < 3; $i++) {
            ProductImage::factory()->create([
                'name' => 'Samsung Galaxy S23 Ultra',
                'url' => 'samsung-galaxy-s23-ultra-' . ($i + 1) . '.jpg',
                'product_id' => 1,
            ]);
        }
        // $color = [
        //     ['Black', '#000'], ['White', '#fff'], ['Yellow', '#ff0'], ['Blue', '#00f'],
        //     ['Pink', '#f0f'], ['Red', '#f00'], ['Gray', '#888'], ['Green', '#0f0'], ['Purple', '#808']
        // ];
        $color = [
            ['Black', '#000'], ['White', '#fff'], ['Gray', '#888']
        ];
        foreach ($color as $value) {
            Color::factory()->create([
                'color' => $value[0],
                'hex' => $value[1]
            ]);
        }
        $banner = [
            ['NEW ERA OF SMARTPHONES S23 ULTRA', 1],
            ['NEW ERA OF SMARTPHONES S24+', 18]
        ];
        $bannerImg = [
            ['banner ss s23 ultra', 'banner_ss23u.jpg', 1],
            ['banner ss s24 plus', 'banner_ss24p.jpg', 2]
        ];
        foreach ($banner as $value) {
            Banner::factory()->create([
                'name' => $value[0],
                'product_id' => $value[1]
            ]);
        }
        foreach ($bannerImg as $value) {
            BannerImage::factory()->create([
                'name' => $value[0],
                'url' => $value[1],
                'banner_id' => $value[2]
            ]);
        }
    }
}
