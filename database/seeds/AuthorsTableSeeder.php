<?php

use Illuminate\Database\Seeder;
use App\Author;
    
class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create([
            'user_id' => 1,
            'name' => 'J.K Rowling',
            'avatar' => 'http://static.cand.com.vn/Uploaded_ANTG/nguyenbinh/nguyenbinh1/15_chan1283.jpg',
            'description' => 'Mặc dù cô dùng bút danh là "J. K. Rowling" (phát âm như từ \'rolling\')[7], tên của cô trước khi tái hôn chỉ đơn giản là Joanne Rowling. Vì lo ngại đối tượng độc giả là các chàng trai trẻ sẽ có thể không thích một tác phẩm được viết bởi một người phụ nữ nên các nhà xuất bản của cô đã yêu cầu cô có 2 chữ ở đầu. Vì không có tên lót, cô đã chọn chữ \'K\' (từ \'Kathleen\' tên bà nội cô) làm ký tự thứ 2 trong bút danh[8]. Cô tự gọi mình là \'Jo\'. Sau khi kết hôn, có một số lần cô sử dụng tên Joanne Murray khi quản lý công việc kinh doanh của cá nhân. Trong vụ thẩm vấn Leveson, cô trình bày các chứng cứ dưới cái tên Joanne Kathleen Rowling[9] và mục của cô tại cơ sở dữ liệu Who\'s Who cũng lưu tên cô là Joanne Kathleen Rowling.'
        ]);
        
        Author::create([
            'user_id' => 1,
            'name' => 'Stephen Hawking',
            'avatar' => 'https://vnn-imgs-f.vgcloud.vn/2018/03/14/16/stephen-hawking-1.jpg',
            'description' => 'Hawking sinh ngày 8 tháng 1 năm 1942, tại Oxford, Anh.[8][9] Cha ông là Frank Hawking và mẹ ông là Isobel. Cả hai người có điều kiện kinh tế khó khăn nhưng phấn đấu vào học tại Đại học Oxford, Frank học y trong khi Isobel học ngành triết, chính trị và kinh tế học.[9] Hai người gặp nhau trong những ngày đầu Chiến tranh thế giới thứ hai tại một viện nghiên cứu y học nơi Isobel làm thư ký còn Frank là nhà nghiên cứu[9][10]. Cha mẹ Hawking sống tại Highgate nhưng khi London bị oanh kích trong chiến tranh, mẹ ông rời xuống Oxford để sinh nở an toàn hơn.[11] Ông có hai em gái, Philippa và Mary, và một em trai nuôi, Edward.[12] Hawking học tiểu học ở Trường Nhà Byron; về sau ông chỉ trích cái gọi là "phương pháp tiến bộ" của trường đã khiến ông không thể học đọc. Năm 1950, khi cha ông trở thành trưởng bộ môn ký sinh trùng tại Viện Nghiên cứu Y tế Quốc gia, gia đình Hawking chuyển tới sống tại St Albans, Hertfordshire[13][14]. Hawking khi đó 8 tuổi đi học tại Trung học nữ sinh St Albans vài tháng (vào thời đó những cậu bé ít tuổi có thể học ở trường nữ sinh).[15][16] Ở St Albans, cả gia đình thường được người xung quanh đánh giá là hết sức trí thức và có phần lập dị;[13][17] trong các bữa ăn mỗi người cầm một quyển sách vừa ăn vừa im lặng đọc sách. Họ sống trong một cuộc sống thanh đạm trong một ngôi nhà chung lớn, huyên náo và tồi tàn, và đi lại bằng một chiếc xe taxi Luân Đôn thải hồi.[18][19] Cha của Hawking thường xuyên vắng nhà vì công tác ở châu Phi, và trong một dịp như vậy bà Isobel cùng các con du hành tới Mallorca bốn tháng để thăm bạn của bà Beryl và chồng bà ta-nhà thơ Robert Graves. Trở về Anh, Hawking vào học Trường Radlett trong một năm[16] và từ năm 1952 chuyển sang trường St Albans.[20] Gia đình ông rất đề cao giá trị của việc học hành.[13] Cha Hawking muốn con trai mình học trường Westminster danh giá, nhưng Hawking lúc đó 13 tuổi bị ốm vào đúng ngày thi lấy học bổng. Gia đình ông không thể trang trải học phí mà không có phần học bổng hỗ trợ, nên Hawking đành tiếp tục học ở St Albans.[21][22] Một hệ quả tích cực của điều này đó là Hawking duy trì được một nhóm bạn thân mà ông thường tham gia chơi bài, làm pháo hoa, các mô hình phi cơ và tàu thuyền,[23] cũng như thảo luận về Cơ đốc giáo và năng lực ngoại cảm.[24] Từ 1958, với sự giúp đỡ của thầy dạy toán nổi tiếng Dikran Tahta, họ xây dựng một máy tính với các linh kiện lấy từ đồng hồ, một máy tổng đài điện thoại cũ và các thiết bị tái chế khác. Thực tế rằng khi 9 tuổi, kết quả học tập của ông chỉ đứng ở phần cuối lớp. Lên các lớp trên có sự tiến bộ hơn nhưng không nhiều. Vấn đề không nằm ở trí tuệ mà có vẻ do sự trễ nải của ông. Và mặc dù điểm số không tốt nhưng cả giáo viên và bạn bè đều thấy được tố chất thiên tài của ông. Biệt danh của ông ở trường là “Einstein”.[27] Theo thời gian, ông ngày càng chứng tỏ năng khiếu đáng chú ý đối với các môn khoa học tự nhiên, và nhờ thầy Tahta khuyến khích, quyết định học toán tại đại học.[28][29][30] Cha Hawking khuyên ông học y vì lo ngại rằng không có mấy việc làm cho một sinh viên ngành toán ra trường.[31] Theo nguyện vọng của cha, Hawking tới học dự bị ở trường cha ông từng học là University College (thuộc Đại học Oxford). Vì khi đó tại trường không có ngành toán, Hawking quyết định học vật lý và hóa học. Mặc dù hiệu trưởng khuyên ông chờ thêm một năm, Hawking đã thi sớm và giành học bổng tháng 3 năm 1959.'
        ]);
    }
}
