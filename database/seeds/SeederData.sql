-- Use db_ooad;

insert into age (name)
values
('3-5 tuổi'),
('6-8 tuổi'),
('7-12 tuổi'),
('Trên 13 tuổi'),
('Trên 16 tuổi'),
('Trên 18 tuổi');

insert into author (name)
values
('Nguyễn Nhật Ánh'),
('Adam Khoo'),
('Agatha Christie'),
('Akamitsu Awamura'),
('Alexander Dumas con'),
('Antoine De Saint-Exupéry');

insert into category(name) 
values 
('Chính trị - Pháp lý'),
('Công nghệ Thông tin'),
('Điện ảnh - Nhạc - Họa'),
('Khoa học - Kỹ thuật'),
('Kiến thức tổng hợp'),
('Kinh tế'),
('Kỹ năng sống'),
('Lịch sử'),
('Nông - Lâm - Ngư nghiệp'),
('Tạp chí'),
('Tâm lý - Giới tính'),
('Thiếu nhi'),
('Thường thức - Gia đình'),
('Tôn giáo - Tâm linh'),
('Truyện tranh - Manga - Comic'),
('Văn hóa - Địa lý - Du lịch'),
('Văn học'),
('Y học');

insert into language (name)
values
('Tiếng Việt'),
('Tiếng Anh');

insert into publisher (name)
values
('1980 Books'),
('Alphabooks'),
('Bách Việt'),
('BIZBOOKS'),
('Công Ty CP Đầu Tư Văn Hóa Tinh Hoa'),
('Công Ty CP Văn Hóa Nhân Văn'),
('Công ty CP WE CREATE'),
('DT Books'),
('Đinh Tị'),
('Ecoblader'),
('First News - Trí Việt'),
('HappyLive'),
('Hương Huy'),
('Khang Việt Book'),
('MCBOOKS'),
('Minh Long'),
('Nhã Nam'),
('Nhà sách Lao Động'),
('Nhà Sách Lộc'),
('Nhà sách Minh Thắng'),
('Nhân Trí Việt'),
('NXB Tổng Hợp'),
('NXB Trẻ'),
('Omega Plus'),
('Pandabooks'),
('Phương Nam'),
('Saigon Books'),
('Tân Việt'),
('TGM Books'),
('Thái Hà'),
('TT Giới thiệu Sách Tp. HCM'),
('Uranix'),
('Văn Lang');

insert into publishing_company (name)
values
('NXB Phụ Nữ'),
('NXB Trẻ'),
('NXB Hà Nội'),
('NXB Văn Hóa Thông Tin'),
('NXB Văn Học');

insert into topic (name) values 
('Tuổi thơ'),
('Huyền bí - Giả tưởng'),
('Kinh điển'),
('Trinh thám'),
('Tản văn'),
('Tiểu sử'),
('Âm nhạc'),
('Tâm linh'),
('Kĩ năng'),
('Kinh tế');

insert into translator (name)
values
('Uông Xuân Vy'),
('Trần Đăng Khoa'),
('Tuấn Việt'),
('Anh Trần'),
('Lan Phương'),
('Huỳnh Mỹ Duyên'),
('Hải Nguyên');

insert into book (title, publisher_id, publishing_company_id, language_id, age_id, book_cover, publishing_year, book_cover_size, introduction, number_of_pages, inventory_number, price, sale, rating, created_at)
values
('Tôi thấy hoa vàng trên cỏ xanh', 23, 2, 1, 4, 'Mềm', '2010', '13x20', 
'Ta bắt gặp trong Tôi Thấy Hoa Vàng Trên Cỏ Xanh một thế giới đấy bất ngờ và thi vị non trẻ với những suy ngẫm giản dị thôi nhưng gần gũi đến lạ. 
Câu chuyện của Tôi Thấy Hoa Vàng Trên Cỏ Xanh có chút này chút kia, để ai soi vào cũng thấy mình trong đó, kiểu như lá thư tình đầu đời của cu Thiều chẳng hạn... ngây ngô và khờ khạo.',
 286, 100, 82000, 25, 5, '2019-12-20 0:0:0'),
 
('Chiến thắng trò chơi cuộc sống', 29, 1, 1, 4, 'Mềm', '2013', '16x24', 
'Kinh nghiệm sống và sự trưởng thành không phụ thuộc vào việc bạn đã sống bao lâu, mà phụ thuộc vào việc bao nhiêu năm qua bạn đã và đang sống như thế nào.', 
298, 50, 120000, 35, 5, '2019-12-21 16:46:04'),

('Tôi tài giỏi, bạn cũng thế (Tái bản 2019)', 29, 1, 1, 4, 'Mềm', '2019', '16x24', 
'Tôi Tài Giỏi - Bạn Cũng Thế sẽ giúp tìm ra giải pháp tốt nhất cho mọi vấn đề, và giúp nhận ra cách thức để thành công. Tuy nhiên để làm một người tài giỏi thì người đọc cần đặt quyển sách xuống và thực thi ngay các kế hoạch. Đương nhiên, không phải chỉ chăm chỉ ngày một, ngày hai mà mỗi người phải thực hiện lâu dài, thậm chí cả đời thì mới đạt được những gì mình muốn.
“Thật không biết phải làm sao với con trai chúng tôi. Nó được gởi đi học thêm khắp nơi mà vẫn làm bài thi tệ hại. Chúng tôi tự hỏi sau này nó có làm nên trò trống gì không nữa”…
Tôi tài giỏi, bạn cũng thế ! tổng hợp những kỹ năng và phương pháp đã mang tới thành công vượt bậc cho cậu bé Adam kém cõi và dĩ nhiên bạn cũng có thể thành công như vậy! Quyển sách này dành cho các học sinh, sinh viên, các bậc phụ huynh, các nhà giáo và bất kỳ ai luôn mong muốn tăng cường khả năng tận dụng não bộ hoặc phát huy tối đa tiềm năng của mình.', 
256, 75, 118000, 35, 5, '2019-12-20 16:46:04'),

('Làm Chủ Tư Duy, Thay Đổi Vận Mệnh', 29, 1, 1, 4, 'Mềm', '2010', '16x24', 
'Trong quyển sách này, bạn sẽ học được cách chịu trách nhiệm về cuộc sống và thiết kế con đường đi đến thành công cho chính mình. Bạn sẽ học được cách mô phỏng những mô thức trong cách nghĩ cách làm đã giúp cho nhiều người trở nên thành công rực rỡ trên mọi phương diện, để đến lượt mình, bạn cũng có những thành công tương tự, hoặc hơn thế nữa.', 
433, 20, 115000, 0, 5, '2019-12-20 16:46:04'),

('Winning The Game Of Stocks!', 2, 3, 2, 4, 'Mềm', '2013', '16x24', 
'In this book, you are going to discover how you can…
Invest in Winning Stocks That Generate High Double-Digit Returns
Identify Market Uptrends and Downtrends Accurately
Hedge and Protect Your Portfolio from Market Crashes
Short Sell and Profit in a Down-trending Market
Manage Your Risks and Maximize Your Returns
Develop the Psychology of a Disciplined Investor
Build a Winning Portfolio That Suits Your Investment Goals
Build a Passive Income Stream from Real Estate Investment Trusts
Build a Multi-Million Dollar Net Worth on an Average Income
And Much, Much More!', 
321, 10, 599000, 0, 5, '2019-12-20 16:46:04'),

('Kỳ Án Dòng Chữ Tắt', 23, 2, 1, 5, 'Mềm', '2016', '13x20', 
'Hercule Poirot nghỉ ẩn ở London tại một nhà trọ ít ai ngờ đến. Tình cờ, cùng nhà trọ với ông có cảnh sát điều tra Edward Catchpool của Scotland Yard. Và cũng tình cờ ông gặp người phụ nữ tên Jennie, hốt hoảng như trong tình trạng bị nguy hiểm. Nhưng tất cả không còn là tình cờ nữa khi xảy ra vụ án mạng ba người chết tại khách sạn Bloxham và Catchpool phụ trách điều tra. 
Ngay từ đầu Poirot khẳng định người phụ nữ tên Jennie có liên quan đến vụ giết ba người ở khách sạn đó, nhưng Catchpool một mực bác đi, khiến cho ông thám tử già lừng danh định đi nghỉ ẩn này lại phải nhảy vào cuộc. Vụ điều tra mở ra cả một ân oán tình thù 16 năm trước tại một làng quê nước Anh mà kết cuộc bi thảm là cái chết của vợ chồng cha xứ ở tuổi rất trẻ, 
và một số người tha phương lưu lạc để quên đi tội lỗi của mình…', 
448, 55, 122000, 37, 5, '2019-12-20 16:46:04'),

('Ngôi Nhà Quái Dị', 23, 2, 1, 5, 'Mềm', '2016', '13x20', 
'Gia đình ba thế hệ của ông già Leonides cùng sống trong căn nhà "ba đầu hồi" quái dị do ông tự thiết kế. Leonides là một doanh nhân thành đạt giàu có, bảo bọc cho gia đình hai con trai Roger và Philip, ba đứa cháu con của Philip. Ông có hai đời vợ. Vợ trước mất do bị trúng bom thời chiến tranh, 
cô em gái không lấy chồng của bà vợ này đến giúp anh rể chăm sóc các cháu. Khi các cháu đã lớn cả, ở tuổi 80 ông Leonides lại đi bước nữa với một phụ nữ trẻ đẹp. Rồi một anh gia sư trạc tuổi bà vợ sau của ông xuất hiện trong gia đình, những ghét bỏ khinh khi lâu nay của các con cháu ông Leonides bùng lên với đồn đoán về cuộc tình vụng trộm giữa bà mẹ kế trẻ đẹp và anh gia sư. 
Giữa lúc đó ông Leonides bị chết do tiêm nhầm thuốc! Bác sĩ từ chối chứng tử vì dứt khoát nghi ngờ đây là một vụ giết người. Cảnh sát tiến hành điều tra và điên đầu vì bất cứ ai trong gia đình đó cũng có động cơ giết ông Leonides… Ngoài ra, di chúc ông đã đọc cho con cháu nghe và đã ký tên biến mất?', 
272, 72, 85000, 38, 5, '2019-12-20 16:46:04'),

('Án Mạng Trên Sông Nile', 23, 2, 1, 5, 'Mềm', '2017', '13x20', 
'Linnet Ridgeway sở hữu trong tay tất cả mọi thứ mà bất cứ một người nào cũng có thể lấy làm ghen tị: tuổi trẻ, sắc đẹp, sự thông minh, của cải và một vị hôn phu rất xứng với cô. Rồi một ngày nọ, người bạn thân nhất của của Linnet - Jackie - đưa vị hôn phu điển trai của mình là Simon Doyle đến, 
để xin Linnet cho anh một việc làm. Giờ thì chính Linnet và Simon lại đi hưởng tuần trăng mật với nhau, trên một chuyến tàu dạo quanh sông Nile. Bất chợt, Linnet bị giết hại, Jackie trở thành đối tượng bị tình nghi hàng đầu nhưng cô không hề có khả năng thực hiện được điều ấy. 
Không chỉ dừng lại ở đó, thủ phạm lần lượt ra tay thêm với hai vị khách nữa trong đoàn. Đúng là một vụ án bí hiểm, không có manh mối, nhân chứng, và đoàn khách du lịch dường như cũng không có mối quan hệ với nạn nhân. Tuy nhiên, không có điều gì có thể lọt khỏi tầm mắt của thám tử lừng danh Hercule Poirot.',
451 , 54, 105000, 35, 5, '2019-12-20 16:46:04'),

('Án Mạng Trên Chuyến Tàu Tốc Hành Phương Đông (Tái Bản 2017)', 23, 2, 1, 5, 'Mềm', '2017', '13x20', 
'Vừa quá nửa đêm, chuyến tàu tốc hành phương Đông nổi tiếng buộc phải ngừng lại vì tuyết rơi quá dày. Vào buổi sáng, tay triệu phú Simon Ratchett được phát hiện nằm chết trong toa riêng của mình với mười hai nhát dao, cửa khoang được khóa từ bên trong. Một trong những hành khách có mặt trên chuyến tàu là thủ phạm.
Một mình giữa cơn bão tuyết cùng nhân dạng mù mờ về tên sát nhân qua lời chứng của mọi người, thám tử Hercule Poirot phải tìm ra chân tướng kẻ thủ ác giữa mười hai kẻ thù của nạn nhân, trước khi tên giết người kịp đào thoát…', 
306, 36, 110000, 45, 5, '2019-12-20 16:46:04'),

('Khúc Nguyền Ca Của Thánh Kiếm Sĩ – Tập 1', 32, 3, 1, 5, 'Mềm', '2017', '13x19', 
'Haimura Moroha bước vào niên học đầu tiên tại Học viện Akane, ngôi trường đặc biệt chuyên đào tạo Đấng Cứu Thế - những học sinh mang kí ức tiền kiếp của các anh hùng hoặc người vĩ đại từ kiếp trước. Tuy nhiên, khác với họ, bản thân Moroha nắm giữ đến hai kí ức tiền kiếp.Tại một thời điểm khác trong quá khứ, cậu là Flaga, người bảo vệ thánh kiếm, sánh bước bên công chúa Sarasha lật đổ cả một đế chế.
Ở một thời điểm khác nữa, cậu là Shu Saura, ma vương cô độc cùng với Ma nữ Địa ngục gieo rắc kinh hoàng cho nhân gian.
Hai quá khứ, hai vận mệnh, hai người thiếu nữ đặt trong tim. Cuộc chiến của cậu chỉ vừa mới khởi đầu.', 
368, 68, 99000, 35, 5, '2019-12-20 16:46:04'),

('Khúc Nguyền Ca Của Thánh Kiếm Sĩ – Tập 2', 32, 3, 1, 5, 'Mềm', '2017', '13x18', 
'Haimura Moroha bước vào niên học đầu tiên tại Học viện Akane, ngôi trường đặc biệt chuyên đào tạo Đấng Cứu Thế - những học sinh mang kí ức tiền kiếp của các anh hùng hoặc người vĩ đại từ kiếp trước. Tuy nhiên, khác với họ, bản thân Moroha nắm giữ đến hai kí ức tiền kiếp.Tại một thời điểm khác trong quá khứ, cậu là Flaga, người bảo vệ thánh kiếm, sánh bước bên công chúa Sarasha lật đổ cả một đế chế.
Ở một thời điểm khác nữa, cậu là Shu Saura, ma vương cô độc cùng với Ma nữ Địa ngục gieo rắc kinh hoàng cho nhân gian.
Hai quá khứ, hai vận mệnh, hai người thiếu nữ đặt trong tim. Cuộc chiến của cậu chỉ vừa mới khởi đầu.', 
378, 78, 99000, 35, 5, '2019-12-20 16:46:04'),

('Trà Hoa Nữ (Bìa Cứng)', 14, 4, 1, 5, 'Cứng', '2016', '16x24', 
'Trà hoa nữ (La Dame aux Camélias) được viết khi ông hai mươi tư tuổi, là tác phẩm đầu tiên khẳng định tài năng và đã đem lại vinh quang rực rỡ cho Alexandre Dumas con. Câu chuyện đau thương về cuộc đời nàng kỹ nữ yêu hoa trà Macgơrit Gôchiê đã được độc giả Pháp thời bấy giờ hoan nghênh một cách khác thường, nhất là sau khi tác phẩm được chính tác giả chuyển thể thành kịch. 
Gần một trăm năm mươi năm nay, mặc dù không tránh khỏi những hạn chế tất yếu do đặc điểm thời đại Dumas quy định, tác phẩm giàu chất lãng mạn trữ tình đồng thời chứa đựng nhiều yếu tố hiện thực, thấm đượm tinh thần nhân đạo này đã chứng minh giá trị và sức sống lâu dài của nó. Không chỉ được dịch ra các thứ tiếng, Trà hoa nữ còn được dựng phim, kịch ở nhiều nước và bao giờ cũng được người xem ưu ái đón nhận.', 
244, 44, 79000, 50, 5, '2019-12-20 16:46:04'),

('Trà Hoa Nữ (Đinh Tị)', 9, 5, 1, 5, 'Mềm', '2016', '14x20', 
'Nội dung Trà hoa nữ kể về mối tình bất thành của anh nhà giàu Duval với cô kỹ nữ Marguerite, một đề tài tưởng đâu là quen thuộc, nhưng bằng ngòi bút sắc sảo cộng với tình cảm bao dung mà tác giả muốn truyền tải, truyện được độc giả đón nhận không ngần ngại, 
dù là giới quý tộc, cái giới bị hạ thấp hơn cả cô kỹ nữ trong truyện. Mặc dù Marguerite sống bằng nghề kỹ nữ nhưng trái với nghề của mình, Marguerite là người có tâm hồn và cá tính; nàng có lòng vị tha, biết hi sinh bản thân mình cho người mình yêu. Marguerite Gautier trong truyện được viết dựa trên hình mẫu của Marie Duplessis, 
người yêu của chính tác giả.', 
316, 16, 68000, 15, 5, '2019-12-20 16:46:04'),

('Trà Hoa Nữ (Nhã Nam)', 17, 5, 1, 5, 'Mềm', '2015', '14x20', 
'Trà hoa nữ là câu chuyện đau thương về cuộc đời nàng kỹ nữ yêu hoa trà có tên là Marguerite Gautier. 
Nội dung kể về mối tình bất thành của anh nhà giàu Duval với cô kỹ nữ Marguerite, một đề tài tưởng đâu là quen thuộc, nhưng bằng ngòi bút sắc sảo cộng với tình cảm bao dung mà tác giả muốn truyền tải, truyện được độc giả đón nhận không ngần ngại, dù là giới quý tộc. Mặc dù Marguerite sống bằng nghề kỹ nữ nhưng trái với nghề của mình, 
Marguerite là người có tâm hồn và cá tính; nàng có lòng vị tha, biết hi sinh bản thân mình cho người mình yêu. Marguerite Gautier trong chuyện được viết dựa trên hình mẫu của Marie Duplessis, người yêu của chính tác giả.', 
303, 30, 68000, 35, 5, '2019-12-20 16:46:04'),

('The Little Prince (Hardcover)', 32, 3, 1, 5, 'Cứng', '2015', '16x20', 
'The Little Prince English edition 2015 translated from original title Le Petit Prince. This book offers extra Augmented Reality content with music, games and 3D images. Which allows you to interact with the prince who came from a little asteroid, take pictures with him, remove the baobabs from the asteroid and much',
231 , 13, 241000, 39, 5, '2019-12-20 16:46:04');

insert into book_picture (book_id, link)
values
(1, 'toi_thay_hoa_vang.jpg'),
(2, 'ChienThangTroChoiCuocSong.jpg'),
(3, 'ToiTaiGioiBanCungThe.png'),
(4, 'LamChuTuDuyThayDoiVanMenh.jpg'),
(5, 'winning_the_game_of_stock.jpg'),
(6, 'KyAnDongChuTat.gif'),
(7, 'NgoiNhaQuaiDi.jpg'),
(8, 'AnMangTrenSongNile.jpg'),
(9, 'AnMangTrenChuyenTauTocHanhPhuongDong2017.jpg'),
(10, 'KhucNguyenCaCuaThanhKiemSi1.jpg'),
(11, 'KhucNguyenCaCuaThanhKiemSi2.jpg'),
(12, 'TraHoaNuBiaCung.jpg'),
(13, 'TraHoaNuDinhTi.png'),
(14, 'TraHoaNuNhaNam.jpg'),
(15, 'TheLittlePrince.jpg');

insert into author_book (author_id, book_id)
values
(1, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(4, 10),
(4, 11),
(5, 12),
(5, 13),
(5, 14),
(6, 15);

insert into book_category values
(1, 17),
(2, 6),
(3, 7),
(4, 6),
(5, 7),
(6, 17),
(7, 17),
(8, 17),		
(9, 17),
(10, 15),
(11, 15),
(12, 17),
(13, 17),
(14, 17),
(15, 17);

insert into book_topic values 
(1, 1),
(2, 9),
(3, 9),
(4, 9),
(5, 9),
(6, 4),
(7, 2),
(8, 4),
(9, 4),
(10, 2),
(11, 2),
(12, 5),
(13, 5),
(14, 5),
(15, 5);

insert into book_translator
values
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(6, 3),
(7, 4),
(8, 5),
(9, 3),
(10, 6),
(11, 6),
(12, 7),
(13, 7),
(14, 7),
(15, 7);

insert into method_delivery(method_name, delivery_fee, es_date)
values
('Giao hàng tiêu chuẩn', 12000, 3),
('Giao hàng nhanh', 20000, 1),
('Giao hàng tiết kiệm', 3000, 7);

insert into method_payment(method_name)
values
('Thanh toán sau khi nhận hàng');

insert into status(status_name)
values 
('Đang xử lý'),
('Đang vận chuyển'),
('Giao thành công'),
('Hủy');

insert into supplier(name, phone, email, address)
values
('Thành Đạt', '0987379022', 'thanhdat@gmail.com', '122/6, Phan Xích Long, Phú Nhuận, TPHCM'),
('Thành Nam', '0987379022', 'thanhnam@gmail.com', '122/6, Nơ Trang Long, Phú Nhuận, TPHCM');

insert into book_supplier
values
(1, 1, 50000),
(2, 2, 52000);
