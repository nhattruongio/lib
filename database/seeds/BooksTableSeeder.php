<?php

use Illuminate\Database\Seeder;
use App\Book;
use Illuminate\Support\Facades\Storage;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mytime = Carbon\Carbon::now();

        Book::create([
            'user_id' => 1,
            'author_id' => 1,
            'name_book' => 'Kẻ giấu mặt ngoài hành tinh',
            'image_book' => 'https://i-giaitri.vnecdn.net/2018/03/14/1BO12YJC-7283-1521009360.jpg',
            'description_book' => 'Cuốn sách do Stephen và con gái sáng tác vào năm 2009. Kẻ giấu mặt ngoài hành tinh kể hành trình giải mật mã vũ trụ và săn kho báu xuyên dải ngân hà của cậu bé George. Bạn thân của George - Annie - nói với cậu rằng được người ngoài hành tinh gửi thông điệp khẩn cấp. Ngay lập tức, George bay đến Mỹ để hợp tác Annie giải mật mã. Sau đó, cả hai cùng Emmett (em họ Annie) bay ra ngoài không gian để giải cứu Trái đất. Bên cạnh cuộc thám hiểm, Stephen còn đưa vào cuốn sách những bài viết về du hành không gian của bản thân, điển hình như: "Làm thế nào để du hành xuyên vũ trụ chỉ bằng trí não của bạn"... Theo The Guardian, cuốn sách như một câu chuyện phiêu lưu kịch tính cho bất cứ nhà vũ trụ học trẻ tuổi nào và bài học dễ hiểu, giàu tưởng tượng về vật lý trong không - thời gian.',
            'publish_date' => $mytime,
            'price_book' => 20000,
            'hire' => 0
        ]);

        Book::create([
            'user_id' => 1,
            'author_id' => 1,
            'name_book' => 'George và vụ nổ Big Bang',
            'image_book' => 'https://i-giaitri.vnecdn.net/2018/03/14/george-va-vu-no-big-bang-u547-3626-6588-1521009361.jpg',
            'description_book' => 'Tác phẩm xoay quanh cuộc giải cứu thế giới của George - cậu bé thông minh, ham khám phá. Chán nản vì cô bạn thân - Annie - có người chơi mới, bỏ rơi mình, George lao vào việc thí nghiệm với Eric - bố của Annie - tại Thụy Sỹ nhằm kiến tạo những lý thuyết vật lý mới cho nhân loại.
Tuy nhiên, một ngày, George phát hiện ra một tổ chức đang ra sức chống phá công trình nghiên cứu của Eric, đe dọa tính mạng toàn cầu. Vì vậy, cậu đã thực hiện chuyến đi vào không gian để cứu thế giới khỏi thảm họa.',
            'publish_date' => $mytime,
            'price_book' => 10000,
            'hire' => 0
        ]);

        Book::create([
            'user_id' => 1,
            'author_id' => 1,
            'name_book' => 'Harry Potter và Hòn đá Phù thủy',
            'image_book' => 'https://upload.wikimedia.org/wikipedia/vi/1/19/HarryPotter_1.jpg',
            'description_book' => 'Harry Potter và Hòn đá Phù thủy (nguyên tác: Harry Potter and the Philosopher\'s Stone, nghĩa: Harry Potter và Hòn đá Giả kim) là tiểu thuyết kỳ ảo của nữ văn sĩ người Anh J. K. Rowling. Đây là cuốn đầu trong loạt tiểu thuyết Harry Potter và là tiểu thuyết đầu tay của J. K. Rowling. Nội dung sách kể về Harry Potter, một phù thủy thiếu niên chỉ biết về tiềm năng phép thuật của mình sau khi nhận thư mời nhập học tại Học viện Ma thuật và Pháp thuật Hogwarts vào đúng vào dịp sinh nhật thứ mười một. Ngay năm học đầu tiên, Harry đã có những người bạn thân lẫn những đối thủ ở trường. Được bạn bè giúp sức, Harry chiến đấu chống lại sự trở lại của Chúa tể Hắc ám Voldemort, kẻ đã sát hại cha mẹ cậu nhưng lại thảm bại khi toan giết Harry dù cậu khi đó chỉ mới 15 tháng tuổi.',
            'publish_date' => $mytime,
            'price_book' => 30000,
            'hire' => 0
        ]);

        Book::create([
            'user_id' => 1,
            'author_id' => 1,
            'name_book' => 'Bản thiết kế vĩ đại',
            'image_book' => 'https://i-giaitri.vnecdn.net/2018/03/14/ban-thiet-ke-vi-dai-4797-1521009360.jpg',
            'description_book' => 'Cuốn sách do Stephen Hawking cùng Leonard Mlodilow viết vào năm 2010. Nội dung Bản thiết kế vĩ đại xoay quanh những bí ẩn của kiếp nhân sinh. Tác giả đặt ra nhiều câu hỏi về sự sống, vũ trụ và vạn vật, như: Tại sao phải có cái gì đó chứ không phải là hư không? Tại sao chúng ta tồn tại? Tại sao là tập hợp các định luật vật lý cụ thể này chứ không phải tập hợp khác?...
Để miêu tả vật lý lượng tử, Stephen và Leonard sử dụng ngôn ngữ bình dân giúp người đọc dù không có kiến thức sâu về vật lý cũng hiểu được. Trong cuốn sách, Stephen đưa ra lý thuyết được xem gần như hoàn chỉnh về vũ trụ. Ông viết: "Thực tế là bản thân con người chúng ta - cũng đơn thuần là tập hợp các hạt cơ bản của tự nhiên - có khả năng đi gần đến hiểu biết về các định luật vũ trụ chi phối chúng ta và vũ trụ của chúng ta, đã là một thành công lớn".',
            'publish_date' => $mytime,
            'price_book' => 30000,
            'hire' => 0
        ]);

        Book::create([
            'user_id' => 1,
            'author_id' => 1,
            'name_book' => 'Vũ trụ trong vỏ hạt dẻ',
            'image_book' => 'https://i-giaitri.vnecdn.net/2018/03/14/vu-tru-trong-vo-hat-de-500x500-3948-1521009360.jpg',
            'description_book' => 'Cuốn sách được xuất bản vào năm 2001. Vũ trụ trong vỏ hạt dẻ đặt ra các vấn đề của lý thuyết vật lý: "Vũ trụ trong một vỏ hạt - Vũ trụ có nhiều lịch sử, mỗi lịch sử được xác định bằng hạt tí hon", "Tiên đoán tương lai - Sự biến mất của thông tin trong các hố đen có thể làm giảm khả năng tiên đoán tương lai của chúng ta như thế nào?"...
Stephen còn mô tả về lịch sử hình thành và các nguyên lý của vật lý hiện đại. Tác phẩm từng đoạt giải Aventis dành cho "Sách khoa học" năm 2002 và đã bán được hơn 10 triệu bản. Vũ trụ trong vỏ hạt dẻ được xem là phần kế tiếp của cuốn Lược sử thời gian.',
            'publish_date' => $mytime,
            'price_book' => 30000,
            'hire' => 0
        ]);

        Book::create([
            'user_id' => 1,
            'author_id' => 1,
            'name_book' => 'A Brief History of Time',
            'image_book' => 'https://i-giaitri.vnecdn.net/2018/03/14/luoc-su-thoi-gian-8675-1521009360.jpg',
            'description_book' => 'Cuốn sách được xuất bản vào năm 1988. A Brief History of Time (Lược sử thời gian) gồm 11 chương, lý giải các hiện tượng thiên văn như Big Bang, lỗ đen, nón ánh sáng và đề cập đến những vấn đề lý thuyết vật lý quan trọng như: không - thời gian, thuyết tương đối, nguyên lý bất định...
Bằng một lối trình bày sáng sủa, giọng văn hài hước, Stephen Hawking đã dẫn dắt người đọc phiêu lưu suốt lịch sử vũ trụ, từ khi nó còn là một điểm kỳ dị với năng lượng vô cùng lớn, cho tới ngày nay. Ngay từ khi ra đời, Lược sử thời gian đã trở thành một trong những cuốn sách bán chạy nhất thế giới. Đến nay, tác phẩm được dịch ra 35 ngôn ngữ và bán hơn 10 triệu bản.',
            'publish_date' => $mytime,
            'price_book' => 30000,
            'hire' => 0
        ]);
    }
}
