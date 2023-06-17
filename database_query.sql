CREATE TABLE language_db.quiz (
  id INT AUTO_INCREMENT PRIMARY KEY,
  question VARCHAR(255) NOT NULL,
  language ENUM('Japanese', 'Chinese', 'Korean') NOT NULL,
  choice1 VARCHAR(255) NOT NULL,
  choice2 VARCHAR(255) NOT NULL,
  choice3 VARCHAR(255) NOT NULL,
  choice4 VARCHAR(255) NOT NULL,
  answer INT NOT NULL
);

INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (1, 'What is the pronunciation of "猫" (ねこ)?', 'Japanese', 'Neko', 'Miko', 'Reko', 'Tako', 1);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (2, 'What is the pronunciation of "こんにちは"?', 'Japanese', 'Konichiwa', 'Konnichiwa', 'Koinchiwa', 'Konyichiwa', 2);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (7, 'What is the pronunciation of "电影" in Mandarin Chinese?', 'Chinese', 'Diànyǐng', 'Diǎnyǐng', 'Diānyǐng', 'Diánǐng', 1);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (8, 'How is "好吃" pronounced in Mandarin Chinese?', 'Chinese', 'Hǎochǐ', 'Hàochī', 'Hǎochī', 'Hàochǐ', 3);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (9, 'What is the correct pronunciation of "工作" in Mandarin Chinese?', 'Chinese', 'Gōngzǒu', 'Gǒngzuò', 'Gòngzuò', 'Gōngzuò', 4);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (10, 'How is "家庭" pronounced in Mandarin Chinese?', 'Chinese', 'Jiàtǐng', 'Jiǎtíng', 'Jiātíng', 'Jiātǐng', 3);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (11, 'What is the correct pronunciation of "朋友" in Mandarin Chinese?', 'Chinese', 'Péngyóu', 'Péngyǒu', 'Péngyū', 'Péngyòu', 2);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (12, 'A: 那 ___ 叉子是谁的？\r\n(A: Nà ___ chāzi shì shéi de?)', 'Chinese', '把', '种', '口', '张', 1);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (13, '这篇短文一共有八 ___。(Zhè piān duǎnwén yígò ng yǒu bā ___ )', 'Chinese', '把', '行', '种', '束', 2);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (14, '刚刚飞过一 ___ 飞机。\r\n(Gānggāng fēi guò yí ___ fēijī.)', 'Chinese', '张', '架', '口', '只', 2);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (15, 'A: 这 ___ 袜子多少钱？\r\n(A: Zhè ___ wàzi duōshǎoqián?)', 'Chinese', '双', '张', '行', '只', 1);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (16, '那 ___ 人都是我的同学。\r\n(Nà ___ rén dōushì wǒde tóngxué.)', 'Chinese', '顿', '眼', '群', '张', 3);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (17, 'What is the pronunciation of "안녕하세요"?', 'Korean', 'Annyeonghaseyo', 'Anyeonghaseyo', 'Annyeongaseyo', 'Anyeongaseyo', 1);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (18, 'What is the pronunciation of "감사합니다"?', 'Korean', 'Gamsahamnida', 'Kamsahamnida', 'Gamsahamnida', 'Kamsahamida', 2);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (19, 'What is the pronunciation of "여기"?', 'Korean', 'Yeogi', 'Yogi', 'Yeoki', 'Yuki', 1);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (20, 'What is the pronunciation of "고마워요"?', 'Korean', 'Komawoyo', 'Gomawoyo', 'Gomawo', 'Komawo', 2);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (21, 'What is the pronunciation of "잘 가요"?', 'Korean', 'Jal gayo', 'Jal kayo', 'Jar gayo', 'Jar kayo', 1);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (22, 'What is the Korean word for "leg"?', 'Korean', '머리 [meo-ri]', '다리 [da-ri]', '허리 [heo-ri]', '레그 [re-geu]', 2);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (23, 'What is the Korean word that can mean both "head" and "hair"?', 'Korean', '헤어 [he-eo]', '손목 [son-mok]', '머리 [meo-ri]', '이마 [i-ma]', 3);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (24, '"Hand" is 손 [son] and "wrist" is 손목 [son-mok]. What does 목 [mok] mean?', 'Korean', 'Neck', 'Finger', 'Link', 'Below', 1);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (25, 'In the following sentence, which is the verb?수아가 삼겹살을 먹습니다.', 'Korean', '삼겹살', '먹습니다', '을', '수아', 2);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (26, 'In the following sentence, which is the (direct) object?수아가 소주를 마십니다.', 'Korean', '수아', '소주', '가', '마십니다', 2);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (27, 'What is the pronunciation of "ありがとう"?', 'Japanese', 'Arigato', 'Arigatou', 'Arigatoo', 'Arigatō', 2);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (28, 'What is the pronunciation of "だいじょうぶ"?', 'Japanese', 'Daijuobu', 'Taijoubu', 'Daijoubu', 'Taijyoubu', 3);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (29, 'What is the pronunciation of "おはよう"?', 'Japanese', 'Ohayo', 'Ohayoo', 'Ohayou', 'Ohaya', 3);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (30, 'おはよう', 'Japanese', 'See you', 'Good morning', 'Thank you', 'Good night', 2);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (31, 'おはようございます', 'Japanese', 'Good morning (informal)', 'Good night (informal)', 'Good morning(formal)', 'Good night (formal)', 3);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (32, 'こんにちは', 'Japanese', 'Good afternoon', 'Good morning', 'Good night', "Let\'s eat", 1);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (33, 'やま____ はあります。\r\nYama ____ arimasu. ', 'Japanese', 'ni に', 'ga が', 'o を', 'wa は', 2);
INSERT INTO `quiz` (`id`, `question`, `language`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES (34, 'がっこうにともだちが ____。\r\nGakko ni tomodachi ga ____. ', 'Japanese', 'imasu います', 'arimasu あります', 'wa は', 'no の', 1);
