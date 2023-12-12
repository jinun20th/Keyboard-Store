<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            Product::create([
                'name' => 'Bộ quà tặng cốc sứ Giáng sinh kèm hộp '. $i,
                'slug' => 'coc-' . $i,
                'details' => '',
                'price' => rand(50000, 200000),
                'category_id' => 5,
                'image' => 'products/dummy/image0.jpg',
                'images' => '["products/dummy/image0-0.jpg", "products/dummy/image0-1.jpg", "products/dummy/image0-2.jpg"]',
                'description' => 'Đặc điểm nổi bật của cốc sứ hoạ tiết Noel

                - Chất liệu: Cốc được làm từ sứ tráng men, được nung ở nhiệt độ tiêu chuẩn đảm bảo an toàn cho người sử dụng.
                
                - Bộ sản phẩm bao gồm: 1 cốc sứ, 1 thìa vàng và 1 hộp đựng
                
                - Kích thước:
                
                -Cốc: chiều cao 11cm x đường kính cốc 8cm, dung tích 450ml
                
                -Thìa: 15cm
                
                - Hộp đựng: chiều dài 16cm x chiều rộng 11cm x chiều cao 20cm

                - Cốc được thiết kế với hoạ tiết đậm chất giáng sinh mang đến cảm ngọt ngào cho người dùng

                - Chiếc cốc với dung tích chứa được 450ml thuận tiện cho quá trình sử dụng

                - Nếu bạn đang tìm một món quà có ích và ý nghĩa dành cho người thân và bạn bè nhân dịp lễ Giáng sinh này, chiếc cốc sứ hoạ tiết Noel sẽ vô cùng phù hợp. Nào còn chần chờ gì nữa, chọn ngay Cốc sứ hoạ tiết Noel để ngày Giáng sinh ngập tràn niềm vui, hứng khởi.

                ',
                'quantity' => 10
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            Product::create([
                'name' => 'Bó hoa sáp thơm 7 bông - Quà tặng người yêu '. $i,
                'slug' => 'hoa-' . $i,
                'details' => '',
                'price' => rand(100000, 300000),
                'category_id' => 1,
                'image' => 'products/dummy/image1.jpg',
                'images' => '["products/dummy/image1-0.jpg", "products/dummy/image1-1.jpg"]',
                'description' => 'Đặc điểm nổi bật của Bó hoa hồng sáp thơm 
                - Chất liệu: Hoa sáp
                
                - Quà gồm 2 phân loại
                
                + Bó hoa sáp 7 bông không túi
                
                + Bó hoa sáp 7 bông kèm túi nhựa quai
                
                Bó hoa trong túi quà nhám được được bó cẩn thận đẹp mắt với sự kết hợp của hoa hồng điểm xuyến thêm cành lá tạo nên 1 bó hoa đặc sắc ấn tượng và sống động. 

                Đi kèm với bó hoa là thiệp và túi nhám sang trọng.

                Bó hoa hồng sáp kèm túi món quà tặng độc đáo, ấn tượng, sang trọng và lãng mạn để bạn dành tặng bạn gái, người yêu, vợ nhân những ngày lễ quan trọng như ngày 8/3, 20/10 hoặc đôi khi chẳng vì 1 lý do gì cả thì 1 món quà bất ngờ nho nhỏ cũng mang đến ấm áp trong tim người ấy. Vậy thì còn chần chờ gì nữa mà không sở hữu ngay món quà tặng xinh đẹp này 
',
                'quantity' => 10
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            Product::create([
                'name' => 'Bộ quà tặng Luvgift Colorful Time '. $i,
                'slug' => 'luv-' . $i,
                'details' => '',
                'price' => rand(400000, 600000),
                'category_id' => 9,
                'image' => 'products/dummy/image2.jpg',
                'images' => '["products/dummy/image2-0.jpg", "products/dummy/image2-1.jpg"]',
                'description' => 'Mỗi cô gái đều gắn liền với sự trẻ trung duyên dáng khiến bao chàng say đắm. LuvGift cũng vậy, dịu dàng tinh tế đủ khiến trái tim nàng rung động.

                Được lấy cảm hứng từ những món đồ tinh tế, bộ quà LuvGift Colorful Time đậm chất thi vị giúp chăm sóc, nuôi dưỡng tâm hồn nàng thêm yêu đời, vui tươi lạc quan.
                
                Đặc điểm nổi bật của Quà tặng LuvGift Mùa Duyên Dáng Luv195:
                    - Kích thước hộp quà: 25.5 * 20.5 * 9.5cm
                   
                   - Bộ sản phẩm gồm:
                   
                   Hộp trang sức nhung H09 Be - bên trong chứa Bông tai bạc 925 trái tim đính đá
                   
                   Cốc starbucks giữ nhiệt kèm ống hút
                   
                   Khăn lụa 70x70cm (Mẫu ngẫu nhiên)
                   
                   Nến thơm hũ thiếc mini Đa Sắc
                   
                   Bó hoa khô nghệ thuật
                   
                   Hộp quà kraft nắp đóng form cứng H22 Trung màu kraft
                   
                   Thiệp chúc mừng thông điệp tiếng anh
                   
                   Bông tai bạc trái tim đính đá:
                   - Kích thước bông tai: chiều ngang 1.1cm
                   
                   - Chất liệu bạc 925
                   
                   Bạc 925 là tên gọi tắt của dòng bạc cao cấp 92,5 - tên gọi xuất phát từ Ý một trong những quốc gia nổi tiếng thế giới về chất lượng bạc.
                   
                   Dòng trang sức bạc này có tỉ lệ bạc đạt khoảng 92,5%, 7,5% còn lại là những hợp chất khác để tạo nên độ sáng bóng, bền cho sản phẩm. Bạc 92,5 ra đời đã tạo ra một bước ngoặt mới trong công nghệ chế tác trang sức bạc.
                   
                   Đặc điểm nổi bật của Cốc giữ nhiệt Starbucks bằng inox:
                    - Chất liệu: Inox 304

                    - Dung tích: 500ML

                    - Bộ sản phẩm gồm: Cốc Starbucks, hộp, ống hút đi kèm

                    Cốc giữ nhiệt được thiết kế với kích thước gọn gàng, năng động, vừa tay cầm, bên trong được phủ một lớp inox 304 tráng bạc cao cấp giúp đễ dàng vệ sinh mà không bị ố vàng, phần nắp có gioăng cao su kín an toàn tránh rò rỉ và tràn nước khi bạn di chuyển.
                   
                    Khăn lụa vuông 70cm
                    - Chất liệu: Vải Lụa
                    
                    - Kích thước khăn: 70x70cm. Mẫu khăn được giao ngẫu nhiên.
                    
                    Khăn được làm từ chất liệu vải lụa mềm mại tạo nên nét đẹp dịu dàng, thanh lịch cho bạn gái khi đeo. Chất liệu tự nhiên của lụa giúp bảo vệ, nâng niu làn da tránh các tác động của môi trường.
                    
                    Với khăn lụa vuông, bạn có thể biến hóa thành quý cô kiêu sa, cô nàng công sở thanh lịch, nhẹ nhàng hay cô gái mộng mơ. Khăn lụa vuông không quá to và dài như khăn choàng, chính vì vậy nàng có thể thỏa sức biến hóa. Nào là buộc thõng hai vạt trước ngực hay Buộc thắt nút đơn giản, quàng cổ chữ V cách điệu, quàng khăn thủy thủ, thắt lệch vai…
                    ',
                'quantity' => 10
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            Product::create([
                'name' => 'Đèn quả cầu pha lê 3D đế gỗ 8cm - Dải ngân hà '. $i,
                'slug' => 'den-' . $i,
                'details' => '',
                'price' => rand(150000, 200000),
                'category_id' => 10,
                'image' => 'products/dummy/image3.jpg',
                'images' => '["products/dummy/image3-0.jpg", "products/dummy/image3-1.jpg"]',
                'description' => 'Quả cầu pha lê được chế tác tinh xảo khắc hoạ hình ảnh dải ngân hà với muôn vàn vì tinh tú và ấn tượng hơn khi phần đế có đèn led chiếu lên khối pha lê toả sáng lung linh huyền ảo. Đây chính là món quà tặng ý nghĩa và đầy tinh tế để bạn trao gửi cho những người thân yêu nhân dịp đặc biệt.
                
                Đặc điểm nổi bật của Quả cầu pha lê 3D đế gỗ:
                - Chất liệu: Quả cầu pha lê + đế gỗ 

                - Kích thước: đường kính quả cầu 8cm

                - Sản phẩm gồm: 1 quả cầu pha lê + 1 đế gỗ đèn led
                Với việc áp dụng công nghệ khắc Laze 3D vào trong pha lê, hình ảnh dải ngân hà thu nhỏ hiện lên thật ảo diệu, sống động.

                Phần đế của hộp nhạc được làm bằng gỗ sồi tự nhiên, không mùi, an toàn cho người sử dụng, tích hợp thêm đèn led ánh sáng vàng có khả năng phản chiếu cánh sen lên trần nhà tuyệt đẹp.

                Hướng dẫn sử dụng:

                - Cắm điện phần đế bằng cáp sạc kèm theo, qua cổng USB của máy tính hoặc adapter.
                
                - Gạt công tắc ở dưới đáy để bật đèn.
                
                Khi quả cầu được chiếu sáng hình ảnh dải ngân hà lung linh hiện ra ngay trước mắt. Chắc hẳn, người nhận quà sẽ rất trầm trồ và thích thú với món quà tặng thú vị này.
                
                Quả cầu pha lê 3D Hành tinh nhỏ kỳ thực là 1 món quà tặng tuyệt vời để bạn dành tặng bạn bè, người thân, bạn gái của mình nhân các dịp đặc biệt như sinh nhật, 20/10, 8/3.


                ',
                'quantity' => 10
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            Product::create([
                'name' => 'Gấu bông quàng khăn Giáng sinh '. $i,
                'slug' => 'thu-' . $i,
                'details' => '',
                'price' => rand(15000, 180000),
                'category_id' => 1,
                'image' => 'products/dummy/image4.jpg',
                'images' => '["products/dummy/image4-0.jpg", "products/dummy/image4-1.jpg"]',
                'description' => 'Gấu Bông Giáng sinh được may tỉ mỉ, cẩn thận với hoạ tiết, tông màu đậm chất Noel siêu dễ thương chắc chắn sẽ là món quà tuyệt vời dành cho người mình yêu.

                Đặc điểm nổi bật của Gấu bông quàng khăn Giáng sinh

                Chất liệu: Vải, bông, len, nhung
                
                Gấu có chiều cao 20cm
                Sử dụng vải mềm, chất lượng cao, mềm mại

                Với thiết kế dễ thương, chú gấu đội chiếc mũ ông già noel quà quàng chiếc khăn kẻ xanh đỏ, tông màu giáng sinh vô cùng ấm áp sẽ khiến bạn phải siêu lòng.

                Gấu bông quàng khăn Giáng sinh sẽ là một người bạn ngọt ngào đáng yêu trong mùa đông lạnh giá này đó. Hãy dành tặng món quà tuyệt vời này cho người thân yêu và bạn bè nhé
                ',
                'quantity' => 10
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            Product::create([
                'name' => 'Thuyền hải tặc trong chai dây treo '. $i,
                'slug' => 'mo-hinh-' . $i,
                'details' => '',
                'price' => rand(200000, 250000),
                'category_id' => 2,
                'image' => 'products/dummy/image5.jpg',
                'images' => '["products/dummy/image5-0.jpg", "products/dummy/image5-1.jpg"]',
                'description' => 'Mô hình thuyền hải tặc trong chai thủy tinh dây treo là món đồ trang trí sinh động độc đáo cho căn phòng của bạn trở nên ấn tượng nổi bật. Chiếc thuyền cũng mang đến ý nghĩa thuận buồm xuôi gió, đặt món đồ này tại bàn làm việc sẽ giúp cho công việc được thuận lợi, tinh thần căng tràn sức sống để làm việc tốt hơn. Mô hình thuyền trong chai cũng sẽ là món quà tặng thú vị để bạn dành tặng người thân bạn bè.
                
                Đặc điểm nổi bật của Mô hình thuyền trong chai dây treo
                - Chất liệu: Chai thủy tinh

                - Kích thước chai : 10*10*21cm

                Với đôi bàn tay khéo léo và tỉ mẩn của những người thợ thủ công, chiếc thuyền buồm như có phép màu để nằm gọn trong chai 1 cách tinh tế và nghệ thuật.

                Bên ngoài chai cách điệu thêm những sợi dây thừng kết thành tấm lưới đánh bắt cá đậm chất biển khơi.

                Mô hình thuyền buồm trong chai không chỉ là món đồ trang trí cho căn phòng thêm sinh động và ấn tượng mà nó còn mang đến ý nghĩa mong cầu cho mọi điều suôn sẻ, thuận buồm xuôi gió.
                
                Chọn ngay mô hình thuyền buồm trong chai lưới dây treo trang hoàng cho không gian của bạn nhé và cũng đừng quên dành tặng món quà độc đáo ý nghĩa này cho những người thân yêu.
                ',
                'quantity' => 10
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            Product::create([
                'name' => 'Hộp nhạc Lego Giáng sinh Noel lắp ráp '. $i,
                'slug' => 'nhac-' . $i,
                'details' => "",
                'price' => rand(200000, 250000),
                'category_id' => 2,
                'image' => 'products/dummy/image7.jpg',
                'images' => '["products/dummy/image7-0.jpg"]',
                'description' => "Hộp nhạc Lego lắp ráp với hình ảnh Người tuyết hay ngôi nhà Ông già Noel tượng trưng cho Giáng sinh và tiếng nhạc giáng sinh bất hủ. Sự kết hợp giữa Lego và hộp nhạc sẽ là món quà thú vị dành tặng bạn bè và người thân trong mùa Noel này.

                Đặc điểm nổi bật Hộp nhạc  Noel Lego lắp ráp
                - Chất liệu Nhựa ABS an toàn
                
                - Kích thước:
                
                + Hộp quà: 14.8 x 14.8 x 20.1cm
                
                + Hộp nhạc: 13 x 13 x 20cm
                
                Phụ kiện đi kèm: Pin + sách hướng dẫn lắp ghép
                
                Độ tuổi phù hợp: 7 tuổi trở lênHộp quà thiết kế lịch sự thích hợp làm quà tặng. Hộp nhạc chạy bằng pin AA với 2 chế độ bật thủ công:

                Chế độ 1: Xoay tròn + phun tuyết tự động
                
                Chế độ 2: Xoay tròn + phun tuyết tự động + phát nhạcHộp nhạc bao gồm nhiều bài khác nhau được phát liên tục: Jingle bell, We wish you a Merry chrismas, Silent night…

                Ông già Noel, cây thông, người tuyết và ngôi nhà giáng sinh đều được làm thủ công cẩn thận. Lồng vỏ nhựa trong suốt vừa bảo vệ các chi tiết vừa làm nổi bật các chi tiết màu sắc bên trong thêm phần đẹp mắt.

                Bạn đang tìm kiếm một món quà vừa độc lạ lại ý nghĩa trong dịp Giáng Sinh năm nay thì đừng bỏ lỡ Hộp nhạc lego lung linh này. Món quà không chỉ các bạn nhỏ mà người lớn cũng mê tít ngay từ cái nhìn đầu tiên.

                Hãy mang yêu thương mang 1 mùa giáng sinh an lành ấm áp đến cho những người thân yêu của bạn bằng món quà tặng ý nghĩa tại Quà trực tuyến nhé!
                ",
                'quantity' => 10
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            Product::create([
                'name' => 'Khung ảnh cổ điển để bàn '. $i,
                'slug' => 'tranh-' . $i,
                'details' => '',
                'price' => rand(100000, 150000),
                'category_id' => 4,
                'image' => 'products/dummy/image6.jpg',
                'images' => '["products/dummy/image6-0.jpg", "products/dummy/image6-1.jpg"]',
                'description' => '  Khung ảnh kiểu cô điển để bàn với viền được làm từ nhựa thông tự nhiên hết sức thân thiện với môi trường và người dùng.Đây là nơi của ký ức lưu lại những gì tốt đẹp, hạnh phúc của cuộc đời bạn.

                -       Trong cuộc sống hiện đại hiện nay chúng ta quên mất đi những giá trị của tấm ảnh , việc sử dụng phổ biến điện thoại để  lưu trữ khoảnh khắc và ký ức đáng nhớ trong cuộc cuốc hiện đại hiện nay là điều tất nhiên đối với chúng ta.Chúng ta đã một phần quên đi những bức ảnh những tấm ảnh đắt giá mà ngày trước nó là thông dụng trong cuộc sống.Quatructuyen.com xin giới thiệu tới quý khách sản phẩm hết sức tinh tế khung ảnh kiểu cổ điển lưu lại những giá trị đích thực của cuộc sống.
                
                -       Khung ảnh kiểu cổ điển để bàn được thiết kế với hoa văn uốn lượn tinh tế và hoài cổ,với chất liệu chủ yếu là gỗ thông cao cấp khung ảnh kiểu cổ điển để bàn cũng không kém phần sang trọng và lịch sự sẽ tạo nên nét cổ điển,tươi mới cho căn phòng của bạn.

                -       Vì thế đây đúng là sự lựa chọn hoàn hảo cho căn phòng của bạn không những là vật trang trí tô điểm cho căn phòng của bạn nó còn tạo cho bạn những hồi ức tốt đẹp và những quá khứ bị lãng quên.

                -       Một bức ảnh tuyệt vời nhuốm màu thời gian sẽ được bạn trưng bày tại phòng khách,kệ ,bàn học,bàn trang điểm và nhất là kệ đầu giường đó. Vừa giúp trang trí phòng, vừa mang lại cho gia đình bạn sự yêu thương và gắn bó.
                ',
                'quantity' => 10
            ]);
        }
        $products = Product::all();
        foreach ($products as $product) {
            if ($product->id % 3 == 0) {
                $product->featured = true;
                $product->save();
            }
        }
    }
}
