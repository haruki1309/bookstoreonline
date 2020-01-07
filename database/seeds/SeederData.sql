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
('Antoine De Saint-Exupéry'),
('W. Bruce Cameron'),
('Nguyễn Tấn Thanh Trúc'),
('Matthew Rake'),
('Jodi Picoult'),
('Bertrand Badré'),
('Hans Rosling Ola Rosling'),
('Anna Rosling Rönnlund'),
('Nguyễn Ngọc Tư'),
('Võ Diệu Thanh'),
('Christina Baker Kline'),
('Paulo Coelho'),
('Rosie Nguyễn'),
('Koga Fumitake'),
('Kishimi Ichiro'),
('Mộ Nhan Ca'),
('Hae Min'),
('Luis Sepulveda'),
('Yagisawa Satoshi'),
('Trác Thúy Miêu'),
('Andrea Hirata'),
('Anh Khang'),
('Viet Thanh Nguyen');

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
('NXB Văn Học'),
('NXB Hội Nhà Văn'),
('NXB Lao Động'),
('NXB Thế Giới'),
('NXB Văn Hóa - Văn Nghệ');

insert into topic (name) 
values 
('Tuổi thơ'),
('Huyền bí - Giả tưởng'),
('Kinh điển'),
('Trinh thám'),
('Tản văn'),
('Tiểu sử'),
('Âm nhạc'),
('Tâm linh'),
('Kĩ năng'),
('Kinh tế'),
('Tiểu thuyết lãng mạn'),
('Kiến thức - Bách khoa'),
('Truyện tranh thiếu nhi'),
('Bài học kinh doanh'),
('Văn học thiếu nhi');

insert into translator (name)
values
('Uông Xuân Vy'),
('Trần Đăng Khoa'),
('Tuấn Việt'),
('Anh Trần'),
('Lan Phương'), 
('Huỳnh Mỹ Duyên'),
('Hải Nguyên'),
('Huyền Trân'),
('Đoàn Phạm Thùy Trang'),
('Trương Hoàng Uyên Phương'),
('Nguyễn Đức Quang'),
('Trần Thị Kim Chi'), 
('Hà Thị Kim Ngân'),
('Lê Chu Cầu'),
('Nguyễn Thanh Vân'),
('Nguyễn Vinh Chi'), 
('Nguyễn Việt Tú Anh'),
('Trần Quỳnh Anh'),
('Dạ Thảo'),
('Phạm Viên Phương');

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
231, 13, 241000, 39, 5, '2019-12-20 16:46:04'),

('Hành Trình Của Một Chú Chó', 23, 2, 1, 3, 'Mềm', '2019', '13x20',
'Tiếp theo Mục đích sống của một chú chó luôn nằm trong top sách bestseller, phần 2 - Hành trình của một chú chó - tiếp tục kể về những kiếp sống của chú chó Buddy - được tái sinh nhiều lần để được lo lắng chăm sóc cho cô bé Clarity. Giữa họ đã xảy ra vô số sự cố, hài hước có, cảm động có, để kết thúc là một cảm hứng sống mạnh mẽ được truyền đi: con người và vật nuôi cần thực sự quan tâm đến nhau trong 1 cuộc sống quá nhiều biến cố; và tình yêu, lòng trung thành sẽ là yếu tố giúp cho một tình bạn được vững bền và vượt qua mọi rào cản.',
418, 50, 112000, 20, 4, '2019-12-20 16:46:04'),

('Điều Khám Phá Bất Ngờ - Chuyển Nhà', 23, 2, 1, 3, 'Mềm', '2019', '19x27',
'Chuyển nhà đi nơi khác ở có khi là niềm vui của người này trong gia đình mình nhưng lại là sự lo âu của người khác,… và có khi là cả nỗi buồn nữa. Qua câu chuyện "Chuyển Nhà" các em sẽ có cái nhìn toàn diện hơn cái được cũng như cái mất khi chúng ta thay đổi một nơi chốn sinh sống. Câu chuyện "Chuyển Nhà" cũng kêu gọi mỗi người, bên cạnh những tiện nghi hiện đại chúng ta cũng nên tìm về những điều giản dị gần gũi với thiên nhiên, điều đó sẽ giúp cuộc sống chúng ta trở nên cân bằng, nhờ đó những giá trị nhân văn được lưu truyền và gìn giữ.',
24, 25, 28000, 0, 0, '2019-12-20 16:46:04'),

('Điều Khám Phá Bất Ngờ - Thám Tử Mèo Nhí', 23, 2, 1, 3, 'Mềm', '2019', '25x25',
'"Thám tử mèo nhí" là câu chuyện giáo dục tính quan sát cuộc sống, tập suy luận và phán đoán từ những tín hiệu đời thường hàng ngày. Em có từng thích chơi trò thám tử không nhỉ? Trong câu chuyện này, có một bạn mèo con rất thích trổ tài thám tử và nơi bạn diễn tài năng này là một nơi rất đặc biệt. Để biết đó là đâu và bạn ấy trổ tài thế nào, các em cùng lật giở từng trang một của quyển sách này ra nhé!',
24, 25, 28000, 0, 0, '2019-12-20 16:46:04'),

('Điều Khám Phá Bất Ngờ - Gạo Nếp Gạo Tẻ', 23, 2, 1, 3, 'Mềm', '2019', '19x27',
'"Gạo nếp và gạo tẻ" là câu chuyện khám phá những điều bất ngờ nhưng gần gũi nhất với đời sống các em đó chính là chén cơm chúng ta ăn hàng ngày. Những bữa ăn hàng ngày quá đỗi quen thuộc với các bạn nhỏ, quen đến nỗi một là các bạn không thèm quan tâm mình sẽ ăn gì hay chỉ là câu mệnh lệnh tử tế “Hôm nay ăn gì vậy mẹ? vậy bà? vậy ba?” Đằng sau những bữa ăn là những câu chuyện tâm tình của những người bạn không thể thiếu trong các bữa ăn của người Việt. Đọc và suy ngẫm về một nét chấm phá về văn hoá ẩm thực phong phú của nước mình nhé các bạn.',
24, 25, 28000, 0, 0, '2019-12-20 16:46:04'),

('Điều Khám Phá Bất Ngờ - Tại Ải? Tại Ai?', 23, 2, 1, 3, 'Mềm', '2019', '19x27',
'"Tại ải? Tại ai?" là câu chuyện kể về một chú mèo đi lạc được đem về nuôi. Mỗi người trong gia đình đón nhận bé mèo theo cách cảm nhận riêng của của từng thành viên. Bé mèo sẽ có chuỗi ngày hạnh phúc trọn vẹn của mèo khi đến với gia đình mới chăng? Các em sẽ có câu trả lời cho tựa sách sau khi đọc đến trang cuối của câu chuyện nhé!',
24, 25, 28000, 0, 0, '2019-12-20 16:46:04'),

('Điều Khám Phá Bất Ngờ - Cún Lucy Và Đàn Vịt', 23, 2, 1, 3, 'Mềm', '2019', '25x25',
'"Cún Lucy và đàn vịt" là một câu chuyện khám phá những điều thú vị ngay trong những việc đơn giản hàng ngày như là đi dạo phố. Hãy cùng theo chân bạn cún Lucy để phát hiện điều gì mới lạ trong chuyến đi dạo công viên đầu tiên, có bao nhiêu thắc mắc mà cún Lucy muốn được giải thích. Các em hạy giúp bạn cún giải đáp nhé!',
24, 25, 28000, 0, 0, '2019-12-20 16:46:04'),

('Nếu Quái Vật Tiền Sử Hồi Sinh - Những Thợ Săn Duới Đáy Biển', 23, 2, 1, 3, 'Mềm', '2019', '19x26',
'Bộ sách sử dụng hình ảnh CGI (mô phỏng bằng máy tính) để so sánh mức độ khổng lồ và nguy hiểm của các loài sinh vật thời tiền sử nếu chẳng may chúng còn sống và tồn tại chung một thời đại với chúng ta. NHỮNG THỢ SĂN DƯỚI ĐÁY BIỂN giới thiệu những kẻ săn mồi to lớn khủng khiếp và nhanh nhẹn vô song, đến nỗi cá mập trắng lớn cũng chỉ là bữa ăn dễ bắt hàng ngày của chúng. Và chắc chắn là những thủy cung ngày nay không đủ an toàn cho bạn để vào mà tham quan lũ thủy quái đáng sợ này.',
32, 25, 28000, 15, 0, '2019-12-20 16:46:04'),

('Nếu Quái Vật Tiền Sử Hồi Sinh - Những Sinh Vật Phi Thường Cổ Xưa', 23, 2, 1, 3, 'Mềm', '2019', '19x26',
'Bộ sách sử dụng hình ảnh CGI (mô phỏng bằng máy tính) để so sánh mức độ khổng lồ và nguy hiểm của các loài sinh vật thời tiền sử nếu chẳng may chúng còn sống và tồn tại chung một thời đại với chúng ta. NHỮNG SINH VẬT PHI THƯỜNG CỔ XƯA giới thiệu những loài thủy tổ xa xưa đã không còn tồn tại ngày nay, những loài rắn, loài chim hay bò sát to lớn khổng lồ này mà còn nghênh ngang trên Trái Đất thì có lẽ chúng ta chỉ là một trong những món khai vị không đủ dính răng cho chúng mà thôi.',
32, 25, 28000, 15, 0, '2019-12-20 16:46:04'),

('Nếu Quái Vật Tiền Sử Hồi Sinh - Những Kẻ Săn Mồi Hung Tợn', 23, 2, 1, 3, 'Mềm', '2019', '19x26',
'Bộ sách sử dụng hình ảnh CGI (mô phỏng bằng máy tính) để so sánh mức độ khổng lồ và nguy hiểm của các loài sinh vật thời tiền sử nếu chẳng may chúng còn sống và tồn tại chung một thời đại với chúng ta. NHỮNG KẺ SĂN MỒI HUNG TỢN giới thiệu những loài thủy tổ xa xưa đã không còn tồn tại ngày nay, những loài rắn, loài chim hay bò sát to lớn khổng lồ này mà còn nghênh ngang trên Trái Đất thì có lẽ chúng ta chỉ là một trong những món khai vị không đủ dính răng cho chúng mà thôi.',
32, 25, 28000, 15, 0, '2019-12-20 16:46:04'),

('Những Điều Nhỏ Bé Vĩ Đại', 23, 2, 1, 5, 'Mềm', '2019', '13x20',
'Ruth, một y tá hộ sinh lành nghề bị gạt ra khỏi công việc vì cha đứa bé yêu cầu không để y tá người Mỹ gốc Phi chăm sóc con mình. Đứa bé chẳng may mất sau đó, và Ruth bị kiện ra tòa vì tội giết người.
Để chứng minh mình vô tội, để tiếng nói của người Mỹ gốc Phi được cất lên công bằng, Ruth phải trải qua một chặng đường rất khó khăn, nhưng cô không cô đơn. Bên cạnh cô là nữ luật sư, chị gái, con trai và những người bạn không ngờ khác…
Tác phẩm Những điều nhỏ bé vĩ đại của Jodi Picoult là một câu chuyện sâu sắc về vấn đề kỳ thị chủng tộc, sự lựa chọn, nỗi lo sợ và niềm hy vọng. Tiểu thuyết được sáng tác dựa trên một chuyện có thật ở Mỹ, gợi mở nhiều vấn đề để độc giả tự rút ra kết luận về cách chúng ta nhìn nhận bản thân và người khác trong thế giới đa dạng này.
Jodi Picoult là tác giả có sách bán chạy nhất theo bình chọn của New York Times. Bà đã xuất bản 25 tiểu thuyết, bao gồm Siêu Thoát, Luật nhà, Nơi chốn lưu đày, và các tác phẩm khác.',
740, 35, 225000, 35, 0, '2019-12-20 16:46:04'),

('Tài Chính Có Cứu Vãn Được Thế Giới?', 23, 2, 1, 5, 'Mềm', '2019', '15x23',
'Tài chính có cứu vãn được thế giới bàn về tài chính dưới góc nhìn vĩ mô, trong con mắt của người từng lãnh đạo một trong những quỹ tài chính lớn nhất thế giới, một nhân vật kỳ cựu, từng có ảnh hưởng quan trọng không chỉ trong giới tài chính mà còn cả với các quốc gia, cựu giám đốc điều hành của Ngân hàng Thế giới (World Bank). Sách thể hiện cách ông nhìn nhận, đánh giá và phân tích cuộc khủng hoảng tài chính 2007-2008, bài học rút ra và những gì cần làm để tài chính có thể phục vụ tốt nhất cho nhân loại. Với ông, tài chính là một công cụ, nếu trong tay người sử dụng tốt, nó sẽ trở thành công cụ tốt có khả năng tạo ra những biến đổi phi thường. Và ông đề xuất những cách thức để sử dụng hiệu quả công cụ tài chính đó - Now is the time to regain control over money to serve the common good (trích).',
294, 50, 125000, 31, 0, '2019-12-20 16:46:04'),

('Sự Thật Về Thế Giới : Mười Lý Do Khiến Ta Hiểu Sai Về Thế Giới - Và Vì Sao Thế Gian Này Tốt Hơn Ta Tưởng', 23, 2, 1, 5, 'Mềm', '2019', '13x20',
'Khi được hỏi những câu hỏi đơn giản về các xu hướng toàn cầu - có bao nhiêu phần trăm dân số thế giới sống trong đói nghèo; tại sao dân số thế giới gia tăng; có bao nhiêu bé gái được đến trường - ta thường có những câu trả lời sai một cách có hệ thống. Sai đến mức mà ngay cả những chú khỉ đột chọn những câu trả lời ngẫu nhiên mà vẫn còn cho kết quả tốt hơn một cách nhất quán so với các giáo viên, nhà báo, các nhà ngân hàng đầu tư, và cả những người đoạt giải Nobel.
Trong cuốn sách này, giáo sư y tế quốc tế kiêm diễn giả TED nổi tiếng toàn cầu Hans Rosling - cùng với hai cộng sự lâu năm Anna và Ola - sẽ trình bày một cách giải thích hoàn toàn mới lạ về hiện tượng nói trên. Họ trình bày mười bản năng bóp méo nhận thức của chúng ta - chẳng hạn như, con người có xu hướng chia thế giới thành hai phần (theo kiểu như chúng ta và họ dưới một hình thức nào đó); hoặc cách ta đón nhận tin tức truyền thông (nỗi sợ hãi thường chế ngự tâm trí ta); hoặc cách ta cảm nhận về sự tiến bộ (ta tưởng rằng thế giới này ngày càng tồi tệ hơn).
Vấn đề nằm ở chỗ, có nhiều điều ta không biết, và ngay cả những dự đoán của ta cũng đầy những định kiến vô thức dễ đoán.
Hóa ra là cõi nhân gian cho dù không hề hoàn hảo nhưng vẫn tốt đẹp hơn nhiều so với những gì ta tưởng. Điều đó không có nghĩa là chẳng còn gì phải lo. Nhưng nếu lúc nào cũng rầu rĩ về mọi việc thay vì đón nhận một thế giới quan dựa vào dữ liệu thực tế, ta sẽ đánh mất khả năng tập trung vào những mối đe dọa thật sự.
Khơi nguồn cảm hứng và gạn đục khơi trong, tràn ngập những giai thoại sống động và những câu chuyện mủi lòng, cuốn sách thiết thực và cấp bách này sẽ giúp bạn thay đổi cách nhìn nhận thế giới và truyền sức mạnh cho bạn để ứng phó với khủng hoảng cũng như nắm bắt cơ hội trong tương lai.',
454, 50, 160000, 35, 5, '2019-12-20 16:46:04'),

('Endless Field', 23, 2, 2, 4, 'Mềm', '2019', '13x20',
'Khi được hỏi những câu hỏi đơn giản về các xu hướng toàn cầu - có bao nhiêu phần trăm dân số thế giới sống trong đói nghèo; tại sao dân số thế giới gia tăng; có bao nhiêu bé gái được đến trường - ta thường có những câu trả lời sai một cách có hệ thống. Sai đến mức mà ngay cả những chú khỉ đột chọn những câu trả lời ngẫu nhiên mà vẫn còn cho kết quả tốt hơn một cách nhất quán so với các giáo viên, nhà báo, các nhà ngân hàng đầu tư, và cả những người đoạt giải Nobel.',
102, 50, 135000, 31, 5, '2019-12-20 16:46:04'),

('Viên Đạn Về Trời', 23, 2, 1, 4, 'Mềm', '2019', '13x20',
'“Tôi không phải sinh ra để chết vì súng đạn”. Lời của nhân vật chính trong tiểu thuyết. Nhưng nòng súng cứ ám ảnh mãi cô gái ấy suốt chiều dài câu chuyện. Nó không chỉ chĩa về cô từ phía người đàn ông yêu cô, mà còn từ tâm thức, khi cô luôn nghĩ về cái chết của ông nội cô, của cha cô. Những cái chết mà cô chỉ được người thân mô tả lại bằng hình ảnh, hồi ức đau thương. Trong khi đó, ngôi nhà cô đang ở là của kẻ thù của gia đình cô trong chiến tranh, và người mà cô đang si mê lại là con, cháu của họ. Không hề là một cuộc tranh đấu dễ dàng, nếu cô muốn được sống bình yên. Thậm chí nó còn khó khăn hơn việc cô tự giết mình. Cuối cùng, bằng một nỗ lực vượt thoát, cô ra đi, mang theo một ước lệ về ranh giới giữa tình yêu và hận thù, đó là trạng thái buông bỏ hoặc quên lãng. Cô đã chiến thắng được bản thân mình.',
212, 40, 75000, 35, 5, '2019-12-20 16:46:04'),

('Chuyến Tàu Trở Về', 23, 2, 1, 4, 'Mềm', '2019', '13x20',
'Cuốn sách này là một phiên bản khác của Chuyến Tàu Mồ Côi ( Orphan Train) - tác phẩm bán chạy nhất theo bình chọn của New York Times, dành cho bạn đọc nhỏ tuổi.
Molly là một cô bé có nửa dòng máu da đỏ, được một gia đình khác nuôi dưỡng từ khi em tám tuổi. Bị đối xử thiếu công bằng, cộng với những bi kịch gia đình trong quá khứ, em trở nên khép kín, hơi bất cần, thích phản kháng. Nhưng rồi cuộc gặp gỡ với bà cụ giàu có Vivian - người mà em phải giúp đỡ trong một án phạt phục vụ cộng đồng - đã khiến Molly thay đổi. Bà Vivian không hề giống bất kỳ người lớn nào mà em từng gặp. Bà cũng như Molly, từng là trẻ mồ côi và có những giai đoạn hết sức khó khăn trong cuộc sống. Cùng nhau, họ đã gỡ những nút thắc trong quá khứ và có một khởi đầu mớ
Truyện viết nhẹ nhàng, tươi sáng và có nhiều chi tiết cảm động. Truyện cũng hé lộ một bức tranh khác về nước Mỹ, trong một giai đoạn lịch sử khó quên.',
210, 40, 75000, 35, 5, '2019-12-20 16:46:04'),

('Nhà Giả Kim', 17, 5, 1, 3, 'Mềm', '2019', '13x20',
'Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người.
Tiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.
“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”
- Trích Nhà giả kim',
228, 40, 69000, 37, 5, '2019-12-20 16:46:04'),

('Tuổi Trẻ Đáng Giá Bao Nhiêu', 17, 6, 1, 4, 'Mềm', '2016', '14x20',
'"Bạn hối tiếc vì không nắm bắt lấy một cơ hội nào đó, chẳng có ai phải mất ngủ.
Bạn trải qua những ngày tháng nhạt nhẽo với công việc bạn căm ghét, người ta chẳng hề bận lòng.
Bạn có chết mòn nơi xó tường với những ước mơ dang dở, đó không phải là việc của họ.
Suy cho cùng, quyết định là ở bạn. Muốn có điều gì hay không là tùy bạn.
Nên hãy làm những điều bạn thích. Hãy đi theo tiếng nói trái tim. Hãy sống theo cách bạn cho là mình nên sống.
Vì sau tất cả, chẳng ai quan tâm."',
258, 40, 70000, 0, 5, '2019-12-20 16:46:04'),

('Dám Bị Ghét', 17, 7, 1, 4, 'Mềm', '2018', '14x20',
'Các mối quan hệ xã hội thật mệt mỏi.
Cuộc sống sao mà nhạt nhẽo và vô nghĩa.
Bản thân mình xấu xí và kém cỏi.
Quá khứ đầy buồn đau còn tương lai thì mờ mịt.
Yêu cầu của người khác thật khắc nghiệt và phi lý.
TẠI SAO BẠN CỨ PHẢI SỐNG THEO KHUÔN MẪU NGƯỜI KHÁC ĐẶT RA?
Dưới hình thức một cuộc đối thoại giữa Chàng thanh niên và Triết gia, cuốn sách trình bày một cách sinh động và hấp dẫn những nét chính trong tư tưởng của nhà tâm lý học Alfred Adler, người được mệnh danh là một trong “ba người khổng lồ của tâm lý học hiện đại”, sánh ngang với Freud và Jung. Khác với Freud cho rằng quá khứ và hoàn cảnh là động lực làm nên con người ta của hiện tại, Adler chủ trương “cuộc đời ta là do ta lựa chọn”, và tâm lý học Adler được gọi là “tâm lý học của lòng can đảm”.
Bạn bất hạnh không phải do quá khứ và hoàn cảnh, càng không phải do thiếu năng lực. Bạn chỉ thiếu “can đảm” mà thôi. Nói một cách khác, bạn không đủ “can đảm để dám hạnh phúc”. [] Bởi can đảm để dám hạnh phúc bao gồm cả “can đảm để dám bị ghét” nữa. [] Chỉ khi dám bị người khác ghét bỏ, chúng ta mới có được tự do, có được hạnh phúc.',
336, 40, 96000, 34, 4.5, '2019-12-20 16:46:04'),

('Lòng Tốt Của Bạn Cần Thêm Đôi Phần Sắc Sảo', 17, 3, 1, 4, 'Mềm', '2018', '14x20',
'Một người có thể sống cả đời theo cách mình thích là chuyện vô cùng khó khăn.
Chúng ta không giây phút nào không bị thế giới bên ngoài chỉ trỏ, lâu dần sẽ quên mất tâm tư ban sơ, mất đi khả năng suy nghĩ độc lập và giữ vững cái tôi.
So với từng câu từng câu an ủi dịu dàng, tôi nghĩ chúng ta cần một chậu nước lạnh hơn. Nó sẽ giúp chúng ta tỉnh táo ý thức được tính tình cáu bẳn của mình, tầm nhìn và lòng dạ hạn hẹp của mình, EQ thấp của mình, và tất cả những vấn đề mà bản thân chúng ta không nhìn rõ, nhưng người khác thấy rõ mồn một mà không muốn nói cho chúng ta biết.
Khi bạn khốn đốn, hoang mang, nếu đọc được cuốn sách này, mong rằng bạn có thể rút ra sức mạnh từ trong câu chữ của nó, đừng nộp vũ khí đầu hàng thế giới này.
[] Đời người là một quá trình thử sai, trưởng thành cũng không ngoại lệ. Nên làm những gì, đi con đường nào, mỗi người đều tuân theo tiếng nói của nội tâm, dò dẫm từng bước một. Vấp ngã, thì bò dậy; va vỡ đầu, thì lùi lại; đi đường sai, thì quay lại; lạc lối, thì ngừng chân…
Cuộc đời của mỗi người mỗi khác, ai ai cũng phải tự mình trải qua, mỗi người đều có bài học nhân sinh cần bản thân một mình hoàn thành.
Bởi vì từng trải, cho nên thấu hiểu.
Nguyện cho tất cả những người không hiểu và thấu hiểu trên đời không ngừng trưởng thành nhưng vẫn tốt bụng như xưa!”',
264, 40, 108000, 33, 4.5, '2019-12-20 16:46:04'),

('Yêu Những Điều Không Hoàn Hảo', 17, 8, 1, 4, 'Mềm', '2018', '14x20',
'Đại đức Hae Min sinh ra và lớn lên tại Hàn Quốc. Sau khi hoàn thành bằng Thạc sĩ Tôn giáo học đối chiếu ở Đại học Havard và Tiến sĩ Tôn giáo học ở Đại học Princeton, ông ở lại Mỹ tham gia giảng dạy về tôn giáo ở trường Đại học Hampshire, Massachusetts. Không chỉ dừng lại ở nghiên cứu lý thuyết, mùa xuân năm 2000 ông quyết định xuất gia theo tông phái Tào Khê, một tông phái tiêu biểu của Phật giáo Hàn Quốc. Năm 2015, Đại đức Hae Min trở về Seoul, cùng nhiều chuyên gia mở trường Trị liệu tâm hồn, điều trị miễn phí cho những người gặp bất hạnh trong cuộc sống hay đang mang trong lòng nhiều khổ tâm. Đại đức Haemin là một trong những người rất có ảnh hưởng tới giới trẻ Hàn Quốc, trang Twitter cá nhân (https://twitter.com/haeminsunim) của ông hiện có tới hơn một triệu người theo dõi. Sách cùng tác giả: - Những vỡ lẽ của tuổi trẻ - Yêu lấy những điều không hoàn hảo.',
300, 45, 139000, 36, 4.5, '2019-12-20 16:46:04'),

('Chuyện Con Mèo Dạy Hải Âu Bay (Tái Bản 2019)', 17, 6, 1, 3, 'Mềm', '2019', '14x20',
'Cô hải âu Kengah bị nhấn chìm trong váng dầu – thứ chất thải nguy hiểm mà những con người xấu xa bí mật đổ ra đại dương. Với nỗ lực đầy tuyệt vọng, cô bay vào bến cảng Hamburg và rơi xuống ban công của con mèo mun, to đùng, mập ú Zorba. Trong phút cuối cuộc đời, cô sinh ra một quả trứng và con mèo mun hứa với cô sẽ thực hiện ba lời hứa chừng như không tưởng với loài mèo:
Không ăn quả trứng.
Chăm sóc cho tới khi nó nở.
Dạy cho con hải âu bay.
Lời hứa của một con mèo cũng là trách nhiệm của toàn bộ mèo trên bến cảng, bởi vậy bè bạn của Zorba bao gồm ngài mèo Đại Tá đầy uy tín, mèo Secretario nhanh nhảu, mèo Einstein uyên bác, mèo Bốn Biển đầy kinh nghiệm đã chung sức giúp nó hoàn thành trách nhiệm. Tuy nhiên, việc chăm sóc, dạy dỗ một con hải âu đâu phải chuyện đùa, sẽ có hàng trăm rắc rối nảy sinh và cần có những kế hoạch đầy linh hoạt được bàn bạc kỹ càng…
Chuyện con mèo dạy hải âu bay là kiệt tác dành cho thiếu nhi của nhà văn Chi Lê nổi tiếng Luis Sepúlveda – tác giả của cuốn Lão già mê đọc truyện tình đã bán được 18 triệu bản khắp thế giới. Tác phẩm không chỉ là một câu chuyện ấm áp, trong sáng, dễ thương về loài vật mà còn chuyển tải thông điệp về trách nhiệm với môi trường, về sự sẻ chia và yêu thương cũng như ý nghĩa của những nỗ lực – “Chỉ những kẻ dám mới có thể bay”.
Cuốn sách mở đầu cho mùa hè với minh họa dễ thương, hài hước là món quà dành cho mọi trẻ em và người lớn.',
144, 45, 49000, 37, 4.5, '2019-12-20 16:46:04'),

('Những Giấc Mơ Ở Hiệu Sách Morisaki', 17, 3, 1, 4, 'Mềm', '2017', '14x20',
'Bị người yêu lừa dối, Takako bỏ việc và rơi vào chuỗi ngày ngủ triền miên để trốn tránh nỗi buồn. Thế rồi, một cuộc điện thoại từ người cậu ruột cả 10 năm trời không gặp đã đánh thức cô khỏi cơn mộng mị. Takako đồng ý đến trông hiệu sách nửa buổi giúp cậu chỉ để làm vừa lòng mẹ. Nhưng thật ngoài tưởng tượng, chờ đợi cô là hiệu sách Morisaki cũ kỹ với thế giới của hàng nghìn cuốn sách chứa trong mình cả thời gian và lịch sử. Sách đã chữa lành vết thương trong lòng cô.
Và hơn thế nữa, Takako tìm thấy bao nhiêu điều mới mẻ và thú vị mà trước đây cô chưa từng biết đến.Câu chuyện nhẹ nhàng mà sâu lắng, đặc biệt với những ai có sở thích sưu tầm sách cổ.',
118, 45, 60000, 35, 4.5, '2019-12-20 16:46:04'),

('Vọng Sài Gòn', 17, 6, 1, 4, 'Mềm', '2019', '14x20',
'“Đọc sách để thư giãn, nhưng không phải với cuốn này. Miêu viết là để bạn đọc đấu vật với tiềm thức của chính mình, cào xới đến xây xát cả tàng thức để tìm cho ra những hạt đậu tốt/xấu mà mảnh đất này để lại. Để biết mình đang yêu một thành phố như thế nào.”
- Liêu Hà Trinh, MC, diễn viên
“Người viết cuốn sách có tình yêu nồng nàn đến dữ dội đối với vùng đất Sài Gòn khiến cho bất cứ ai, dù sống ở đây chưa lâu hay có gốc gác nhiều đời ở vùng đất này, vừa cảm thấy gần gũi nhiều điều cuốn sách đề cập đến, vừa cảm thấy tình không đủ nặng, yêu chưa da diết và còn nhiều thờ ơ với nó, khi đọc những trang viết của Trác Thúy Miêu.”
- Phạm Công Luận',
300, 45, 108000, 35, 4.5, '2019-12-20 16:46:04'),

('Chiến Binh Cầu Vồng (Tái Bản)', 17, 6, 1, 4, 'Mềm', '2014', '14x20',
'Cuốn sách nhỏ bé chứa đựng bên trong nó nghị lực phi thường của 10 đứa trẻ nghèo đói (nhưng ham học mãnh liệt), 1 người cha đánh cá nghèo khổ (phải gồng mình nuôi mười bốn miệng ăn nhưng dám-can-đảm cho con trai của mình đi học), 1 thầy hiệu trưởng (yêu nghề, yêu học trò đến khi nhắm mắt vẫn không yên) và 1 cô giáo (dám đương đầu với thế lực, cửa quyền để bảo vệ đến cùng ngôi trường xiêu vẹo)…
Cứ tỉ tê, tỉ tê tự nhiên theo giọng kể chứa đầy cảm xúc (cái cảm xúc đau đớn, phẫn nộ nhưng đầy tuyệt vọng) cuốn sách dẫn chứng nhiều nghịch lý đau lòng của cái giàu và cái nghèo, của quyền lực và sự thân cô thế cô.
Nhưng điều tôi buồn nhất, bất mãn nhất là nỗ lực được đi học, được thoát nghèo, được trở thành 1 nhà toán học của Lintang đã không thoát khỏi định mệnh của cái nghèo. Thực tế cuộc sống ác nghiệt đến mức bóp tan tành và vùi dập giấc mơ của 1 đứa trẻ. Chấp nhận là chấp nhận thế nào???
Giá mà, tất cả những nhà giáo, những người làm giáo dục có thể đọc được cuốn sách phi thường này…',
300, 45, 90000, 4, 4.5, '2019-12-20 16:46:04'),

('Buồn Làm Sao Buông', 26, 9, 1, 4, 'Mềm', '2014', '12x20',
'Cuộc đời vốn nhiều nỗi buồn, hẳn vậy. Có điều, tôi lại dành khá nhiều nỗi buồn của những ngày còn trẻ cho duy nhất một điều - là Tình yêu. Nghe qua có vẻ vị kỷ, bởi ngoài kia còn biết bao điều đáng để chùng chân, nặng lòng và nghe nước mắt lưng tròng rơi, tại sao cứ phải cố chấp vì tình yêu đã cũ mà tự làm mòn xói đi cảm xúc của mình? Chắc bởi vì có những ký ức dù đã hao gầy cách mấy nhưng giống như không khí vậy, cứ phải nhắc đi nhắc lại, tựa hơi thở một phút phải đủ chừng ấy lần. Chỉ cần thiếu mất sẽ không thở được, thậm chí phải ngừng nhịp tim đi.
Thế nên, chừng nào còn thở là chừng ấy còn nhớ và buồn. Đều đặn. Bình lặng. Kiên tâm. Ký ức sở dĩ không thể mất mát là bởi chúng ta còn quá trẻ trước trăm năm, những ngày đã qua xem ra ít ỏi lắm nếu so với con đường còn dài trước mắt. Vì lẽ đó mà những lần đầu tiên chạm ngõ ký ức luôn để lại trong lòng những xốn xang, bần thần và khắc sâu hơn cả.
Cái nắm tay đầu tiên, nụ hôn đầu tiên, người thương đầu tiên... nghiễm nhiên trở thành không khí tiếp thở cho ta mỗi ngày. Dẫu rằng chuyện hai đứa mình ngày xưa ấy, nhắc lại bây giờ chỉ thấy toàn những đổi thay. Có buồn đến thế, có thở dài nhiêu khê, thì chuyện cũ - người xưa của khoảng thanh xuân đầu tiên sẽ luôn được trí nhớ gọi về. Vậy thì liệu bạn có thể đọc những dòng viết dưới đây bằng tất cả sự vị tha của mình - như một người-chớm-già vị tha cho đôi sợi tóc bạc len lén mọc trên mái đầu xanh? Bởi trước khi kịp già, hẳn ai trong chúng ta cũng phải trải qua dăm ba ngày trẻ như thế, chỉ thấy bản thân một mình bầu bạn với nỗi buồn, nỗi cô đơn, nỗi cự tuyệt...
Tất cả đều bắt nguồn từ lúc người ấy bỏ đi, để lại riêng ta cùng với miên trường niềm thương thân vị kỷ. Xin hãy hiểu cho đỉnh điểm cao nhất của cô đơn không phải là một mình, mà là trong tim đã có sẵn một người nhưng bên cạnh thì trăm ngàn người không ai giống vậy. Chúng ta đều biết ơn đời sống đã thi ân quá nhiều cho phần số của mỗi người. Được sống, đã là một ơn may, nhưng đôi khi trong bản vẽ phước phận cũng chệch tay khiến đọng lại những vết lem tựa nước mắt rơi phải làm nhòe. Bởi thế, cuộc đời - về cơ bản - không hề buồn, nhưng từ khi người xuất hiện, nó mới buồn miên mải. Có điều thiên hạ cứ suốt ngày bảo “chán đời” xong vẫn phải sống tiếp đó thôi. Vậy thì mạnh miệng nói “chán người” cũng có buông bỏ được người đâu?',
211, 45, 78000, 25, 4, '2019-12-20 16:46:04'),

('Trời Vẫn Còn Xanh, Em Vẫn Còn Anh', 26, 5, 1, 4, 'Mềm', '2017', '12x20',
'Trong Trời Vẫn Còn Xanh, Em Vẫn Còn Anh – tập truyện ngắn thứ hai của Anh Khang, được ví như phần tiếp theo của tập truyện Đường hai ngả, người thương thành lạ - Anh Khang vẫn viết về tình yêu với những câu chữ dịu dàng, suy tư. Tuy nhiên, Anh Khang của 2017 có lẽ đã trưởng thành hơn trong ngòi bút lẫn tâm tình khi anh chọn đối diện với nỗi buồn bằng thái độ bình thản, lạc quan và hướng người đọc tin tưởng vào chính sức mạnh ý chí của bản thân. Những nhân vật của anh điềm đạm hơn khi nghĩ về mất mát quá khứ và họ cố gắng để sống tích cực hơn ở hiện tại, những câu chuyện dù kết thúc vui hay buồn đều ươm mầm trong đó một tia sáng hi vọng.
Tinh thần này toát ra ngay từ tiêu đề của tác phẩm với lối văn biền ngẫu và điệp từ “vẫn còn” được nhấn mạnh hai lần như muốn khẳng định rằng những điều tốt đẹp “vẫn còn” tồn tại và sẽ luôn còn tồn tại. Nếu ví những tác phẩm trước đây của Anh Khang như những cơn mưa trĩu nặng nỗi niềm thì Trời Vẫn Còn Xanh, Em Vẫn Còn Anh chính là bầu trời trong xanh hơn, an lành hơn sau những cơn mưa ấy. Bởi như chính tác giả tự nhận xét về bản thân: “Trong mắt người ngoài, tôi là một nhà văn quẩn quanh bên sách vở. Trong mắt bạn bè, tôi là một kẻ khờ lắm điều mộng mơ. Trong mắt bố mẹ, tôi là một đứa trẻ không bao giờ chịu lớn. Trong mắt người tôi thương, tôi là một tiếng thở dài cũ kỹ. Trong mắt chính mình, tôi chỉ là một bầu trời xanh, luôn mong mình trở lại màu trong vắt và thanh tân - dẫu sau bao lần mưa giăng mây xám”. Và “bầu trời xanh” mang tên Anh Khang này đang từng bước soi chiếu thứ ánh sáng của niềm tin, lan toả những ước nguyện trong lành và gieo vào lòng người đọc những dư vị cảm xúc dễ chịu - bên cạnh nỗi buồn.',
192, 45, 89000, 37, 4, '2019-12-20 16:46:04'),

('Người Tị Nạn', 26, 6, 1, 4, 'Mềm', '2017', '12x20',
'Cuốn sách được viết bởi Nguyễn Thanh Việt (bút danh Viet Thanh Nguyen) – nhà văn người Mỹ gốc Việt đầu tiên đoạt giải Pulitzer và nhiều giải thưởng khác của các Hiệp hội văn học Mỹ cho sự nghiệp sáng tác của mình. 
Ông sinh năm 1971 ở Việt Nam, cùng gia đình di tản sang Mỹ vào mùa hè năm 1975. Năm 2016, ông gây tiếng vang đặc biệt trên văn đàn Mỹ đương đại sau khi thắng giải Pulitzer cho hạng mục Fiction. Ông có những tác phẩm đáng chú ý như Nothing ever die, The Sympathyzer, Vietnam and the Memory of war, The refugees…
Tác phẩm Người tị nạn (The Refugees) là tác phẩm đầu tiên của ông được dịch và xuất bản tại Việt Nam và để “tăng những người tị nạn, ở bất cứ đâu”. Tập truyện ngắn này gây ấn tượng mạnh bởi sự hư cấu mà chân thực của nó như đánh giá của New York Times Book: “Những câu chuyện về người tị nan Việt Nam như ma thuật bất biến…Một tập truyện siêu phàm…Giọng văn khiêm tốn, chi tiết và phong cách tự sự thẳng thừng hoàn toàn thích hợp với những cuộc đời thường dân âm thầm được mô tả trong truyện…Vặn nhỏ âm lượng, chúng ta áp tai vào, lắng nghe những người tị nạn nói để thấu hiểu họ”. Mở đầu cuốn sách là những day dứt về một quá khứ đầy ám ảnh “Tôi viết sách này cho những hồn ma vốn là nhóm duy nhất ở với thời gian bởi vì họ ở ngoài thời gian” (Roberto Bolafio, Antwerp) “Những thứ ám ảnh bạn không phải là những ký ức của bạn Không phải những điều bạn đã viết ra Mà là những điều bạn đã quên, bạn phải quên Những điều bạn phải tiếp tục quên suốt cả đời mình” (James Fenton, A German Requiem)',
216, 45, 132000, 25, 4, '2019-12-20 16:46:04');

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
(15, 'TheLittlePrince.jpg'),
(16, 'HanhTrinhCuaMotChuCho.jpg'),
(17, 'DieuKhamPhaBatNgo_ChuyenNha.jpg'),
(18, 'DieuKhamPhaBatNgo_ThamTuMeoNhi.jpg'),
(19, 'DieuKhamPhaBatNgo_GaoNepGaoTe.jpg'),
(20, 'DieuKhamPhaBatNgo_TaiAiTaiAi.jpg'),
(21, 'DieuKhamPhaBatNgo_CunLucyVaDanVit.jpg'),
(22, 'NeuQuaiVatTienSuHoiSinh_NhungThoSanDuoiDayBien.jpg'),
(23, 'NeuQuaiVatTienSuHoiSinh_NhungSinhVatPhiThuong.jpg'),
(24, 'NeuQuaiVatTienSuHoiSinh_NhungKeSanMoiHungTon.jpg'),
(25, 'NhungDieuNhoBeViDai.jpg'),
(26, 'TaiChinhCoCuuVanDuocTheGioi.jpg'),
(27, 'SuThatVeTheGioi.jpg'),
(28, 'EndlessField.jpg'),
(29, 'VienDanVeTroi.jpg'),
(30, 'ChuyenTauTroVe.jpg'),
(31, 'NhaGiaKim.jpg'),
(32, 'TuoiTreDangGiaBaoNhieu.jpg'),
(33, 'DamBiGhet.jpg'),
(34, 'LongTotCuaBanCanThemDoiPhanSacSao.jpg'),
(35, 'YeuNhungDieuKhongHoanHao.jpg'),
(36, 'ChuyenConMeoDayHaiAuBay.jpg'),
(37, 'NhungGiacMoOHieuSachMorisaki.jpg'),
(38, 'VongSaiGon.jpg'),
(39, 'ChienBinhCauVong.jpg'),
(40, 'BuonLamSaoBuong.jpg'),
(41, 'TroiVanConXanhEmVanConAnh.jpg'),
(42, 'NguoiTiNan.jpg');

insert into author_book (author_id, book_id)
values
(1, 1), (2, 2), (2, 3), (2, 4), (2, 5), (3, 6), (3, 7), (3, 8), (3, 9), (4, 10),
(4, 11), (5, 12), (5, 13), (5, 14), (6, 15), (7, 16), (8, 17), (8, 18), (8, 19), (8, 20),
(8, 21), (9, 22), (9, 23), (9, 24), (10, 25), (11, 26), (12, 27), (13, 27), (14, 28), (15, 29),
(16, 30), (17, 31), (18, 32), (19, 33), (20, 33), (21, 34), (22, 35), (23, 36), (24, 37), (25, 38),
(24, 39), (23, 40), (22, 41), (21, 42);

insert into book_category values
(1, 17), (2, 6), (3, 7), (4, 6), (5, 7), (6, 17), (7, 17), (8, 17), (9, 17), (10, 15),
(11, 15), (12, 17), (13, 17), (14, 17), (15, 17), (16, 16), (17, 11), (18, 11), (19, 11), (20, 11),
(21, 11), (22, 11), (23, 11), (24, 11), (25, 7), (26, 7), (27, 7), (28, 16), (29, 16), (30, 16),
(31, 11), (32, 7), (33, 7), (34, 7), (35, 16), (36, 11), (37, 16), (38, 16), (39, 11), (40, 16),
(41, 16), (42, 16);

insert into book_topic values 
(1, 1), (2, 9), (3, 9), (4, 9), (5, 9), (6, 4), (7, 2), (8, 4), (9, 4), (10, 2),
(11, 2), (12, 5), (13, 5), (14, 5), (15, 5), (16, 11), (17, 12), (18, 12), (19, 12), (20, 12),
(21, 12), (22, 13), (23, 13), (24, 13), (25, 9), (26, 14), (27, 9), (28, 5), (29, 11), (30, 11),
(31, 12), (32, 9), (33, 9), (34, 9), (35, 5), (36, 1), (37, 5), (38, 5), (39, 15), (40, 5),
(41, 5), (42, 6);

insert into book_translator
values
(2, 1), (2, 2), (3, 1), (3, 2), (4, 1), (4, 2), (6, 3), (7, 4), (8, 5), (9, 3),
(10, 6), (11, 6), (12, 7), (13, 7), (14, 7), (15, 7), (16, 8), (22, 9), (23, 9), (24, 9),
(25, 10), (26, 11), (27, 12), (27, 13), (30, 10), (31, 14), (33, 15), (34, 16), (35, 17), (36, 18),
(39, 19), (42, 20);

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
(2, 1, 50000),
(3, 1, 50000),
(4, 1, 50000),
(5, 1, 50000),
(6, 1, 50000),
(7, 1, 50000),
(1, 2, 52000),
(2, 2, 52000),
(3, 3, 52000),
(4, 2, 52000);

insert into menu 
values
(1,'author','Tác giả'),
(2,'translator','Dịch giả'),
(3,'publisher','Nhà xuất bản'),
(4,'publishing-company','Nhà phát hành'),
(5,'language','Ngôn ngữ'),
(6,'age','Độ tuổi'),
(7,'topic','Chủ đề'),
(8,'category','Thể loại'),
(9,'supplier','Nhà cung cấp'),
(10,'goods-receipt-order','Phiếu đặt sách'),
(11,'orders','Đơn hàng'),
(12,'advertiserment','Quảng cáo'),
(13,'comments','Bình luận'),
(14,'questions','Trả lời câu hỏi'),
(15,'admin','Nhân viên'),
(16,'role','Phân quyền');

insert into role
values
(1,'Admin'),
(2,'Bộ phận bán hàng'),
(3,'Bộ phận quản lý kho');


insert into menu_role
values
(1,1,1,1,1,1,1),
(2,1,1,1,1,1,1),
(3,1,1,1,1,1,1),
(4,1,1,1,1,1,1),
(5,1,1,1,1,1,1),
(6,1,1,1,1,1,1),
(7,1,1,1,1,1,1),
(8,1,1,1,1,1,1),
(9,1,1,1,1,1,1),
(10,1,1,1,1,1,1),
(11,1,1,1,1,1,1),
(12,1,1,1,1,1,1),
(13,1,1,1,1,1,1),
(14,1,1,1,1,1,1),
(15,1,1,1,1,1,1),
(16,1,1,1,1,1,1);

insert into address
values
(1, 1, 'Bùi Trung Tín', 'KTX Khu A ĐHQG TPHCM', '0786481276', '0');
