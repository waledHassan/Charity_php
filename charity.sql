-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 07:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charity`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `information` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `about`, `information`, `image`) VALUES
(1, 'قسم الدعوة', 'قسم يهتم بتوضيح العقيدة أهل السنة والجماعة وتثبيتها لدى المجتمع ، وتوعية جميع شرائح المجتمع في جميع جوانب الحياة وخاصة الجانب السلوكي وتحذيرهم من الانحراف الفكري والمخاطر والفتن وتعزيز انتمائهم الوطني بالأساليب المناسبة.', 'إعداد مشاريع دعوية لفئات المجتمع المستهدفة . إيجاد وتنفيذ برامج نوعية للشباب. الاتصال بالدعاة المتطوعين وترشيحهم للمشاركة في البرامج الدعوية المختلفة. برامج تواصل ودورات تطويرية للأئمة والخطباء. التنسيق لإقامة المحاضرات والندوات والدورات التعليمية على مدار العام.', 'صورة-المبنى.png'),
(2, 'قسم الجاليات', 'تعنى بدعوة غير المسلمين ومتابعة المسلمين الجدد، وتوعية سائر الجاليات بلغاتهم للارتقاء بمستواهم الإيماني والتعليمي والتعبدي والسلوكي والمساهمة في إعداد الدعاة بأسلوب شامل ومتكامل من خلال دروس ودورات وزيارات ورحلات وملتقيات.', 'من أهداف قسم الجاليات: 1. دعوة غير المسلمين إلى الإسلام بالحكمة والموعظة الحسنة . 2. توعية الجاليات المسلمة الوافدة إلى البلاد المباركة . 3. نشر السنة ومحاربة البدعة بين الجاليات الوافدة .', '4023120_9515155_7653008_قسم-الجاليات.png'),
(3, 'القسم النسائي', 'قسم يهتم بارتقاء بالمرأة والفتاة المسلمة من خلال برامج وأنشطة دعوية فاعلة.', 'تأسس القسم النسائي لجمعية الدعوة والإرشاد وتوعية الجاليات بالبدئع عام 1432 وسطع نجمة من خلال فترة قياسية إستطاع تحقيق إنجازات عظيمة في شتى مجالات العمل الدعوي للجاليات والمجتمع .', 'القسم-النسائي.png'),
(4, 'القسم النسائي 2', 'قسم يهتم بارتقاء بالمرأة والفتاة المسلمة من خلال برامج وأنشطة دعوية فاعلة.', 'تأسس القسم النسائي لجمعية الدعوة والإرشاد وتوعية الجاليات بالبدئع عام 1432 وسطع نجمة من خلال فترة قياسية إستطاع تحقيق إنجازات عظيمة في شتى مجالات العمل الدعوي للجاليات والمجتمع .', 'القسم-النسائي.png'),
(5, 'قسم التوريدات', 'قسم يهتم بالتوريدات', 'ه', '17463377_63550625_39822187_logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `charity_goals`
--

CREATE TABLE `charity_goals` (
  `id` int(1) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `charity_goals`
--

INSERT INTO `charity_goals` (`id`, `name`) VALUES
(2, 'العمل على تحقيق الطاعة لله والطاعة لرسوله ﷺ ولأولي الأمر.\r\n'),
(3, 'العمل على مكافحة الانحراف الفكري وبيان آثاره وأضراره.\r\n'),
(4, 'حماية المجتمع من الغلو والتطرف والإفراط والتفريط.\r\n'),
(5, 'دعوة غير المسلمين للإسلام وتعريفهم به وبيان محاسنه لهم.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `charity_message`
--

CREATE TABLE `charity_message` (
  `id` int(1) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `charity_message`
--

INSERT INTO `charity_message` (`id`, `name`) VALUES
(1, 'الدعوة إلى الله وترسيخ العقيدة الصحيحة وتعريف الناس بربهم ببرامج دعوية مميزة تلبي حاجة المجتمع');

-- --------------------------------------------------------

--
-- Table structure for table `charity_numbers`
--

CREATE TABLE `charity_numbers` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `charity_numbers`
--

INSERT INTO `charity_numbers` (`id`, `name`, `number`) VALUES
(1, 'مسلما جديدا', 15),
(2, 'رسالة دعوية', 300),
(3, 'كلمة عن بعد', 50),
(4, 'كلمة بالمساجد', 10),
(5, 'درسا علميا', 109),
(6, 'درسا للجاليات', 130);

-- --------------------------------------------------------

--
-- Table structure for table `charity_values`
--

CREATE TABLE `charity_values` (
  `id` int(1) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `charity_values`
--

INSERT INTO `charity_values` (`id`, `name`) VALUES
(1, 'القدوة الحسنة'),
(2, 'المصداقية\r\n'),
(3, 'العمل بروح الفريق'),
(4, 'الجودة'),
(5, 'العناية بالمستفيدين والزوار'),
(6, 'الإبداع والتجديد');

-- --------------------------------------------------------

--
-- Table structure for table `charity_vision`
--

CREATE TABLE `charity_vision` (
  `id` int(1) NOT NULL,
  `vision` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `charity_vision`
--

INSERT INTO `charity_vision` (`id`, `vision`) VALUES
(1, 'صرح دعوي رائد، ذو أثر فاعل في المجتمع، قائم على عمل مؤسسي متين');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `jop` varchar(255) NOT NULL,
  `allow` tinyint(4) NOT NULL,
  `view` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `image`, `comment`, `email`, `phone`, `jop`, `allow`, `view`) VALUES
(1, 'فضيلة الشيخ: سالم بن سعد الحجي', '51912701_97718559_الحجي.png', 'أسأل الله لنا ولكم دوام التوفيقوأشير إلى التقرير الربع سنوي الأول لعام 1443هـ لمناشط جمعيات الدعوة والإرشاد في المنطقة خلال الفترة من 1-1-1443هـ إلى 1-4-1443هـ حيث بلغ مناشط جمعيتكم (215) منشطًاوإذ أننا نقدر لكم هذا الجهد المبارك ونشكركم على ذلك وهذا إن دلّ فإنما يدلُّ على حرصكم واهتمامكم في حملكم أمانة الدعوة إلى الله. أسأل الله أن يوفقنا وإياكم للعلم النافع والعمل الصالح وحسن الدعوة إليه. والله يحفظكم ويرعاكم،،، والسلام عليكم ورحمة الله وبركاته.', '', '012', 'مساعد المدير العام لفرع الوزارة لشؤون المساجد والدعوة والإرشاد', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `governate`
--

CREATE TABLE `governate` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `governate`
--

INSERT INTO `governate` (`id`, `name`) VALUES
(2, 'اعضاء الجمعية العمومية'),
(3, 'التقارير السنوية'),
(4, 'محاضر الجمعية العمومية'),
(5, 'التقارير المالية'),
(6, 'تقارير الفعاليات');

-- --------------------------------------------------------

--
-- Table structure for table `governate_content`
--

CREATE TABLE `governate_content` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `jop` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `governate_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `governate_content`
--

INSERT INTO `governate_content` (`id`, `name`, `file`, `jop`, `image`, `governate_id`) VALUES
(6, 'waled33', '3974073_71143707_73594583_فاذكروني أذكركم.pdf', 'Student', '21815646_', 2),
(8, 'waled', '37565166_9035533_causes-3.jpg', 'Student', '20609478_3974073_71143707_73594583_فاذكروني أذكركم.pdf', 3),
(9, 'Speaker', '53754502_3974073_71143707_73594583_فاذكروني أذكركم.pdf', 'Student', '82830386_9427462_20-2.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `index_slider`
--

CREATE TABLE `index_slider` (
  `id` int(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `index_slider`
--

INSERT INTO `index_slider` (`id`, `title`, `image`, `description`) VALUES
(1, 'جمعية الدعوة والإرشاد وتوعية الجاليات بيلملم', '9427462_20-2.jpg', 'الدعوة إلى الله وترسيخ العقيدة الصحيحة وتعريف الناس بربهم ببرامج دعوية مميزة تلبي حاجة المجتمع'),
(2, 'جمعية الدعوة والإرشاد', '81052414_20-2.jpg', 'انما الصدقات للفقراء والمساكين والعاملين عليها');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `name`) VALUES
(1, 'مكتبة الفيديو'),
(2, 'مكتبة الصور'),
(3, 'اذكار الصباح والمساء'),
(4, 'زيارة المرضي'),
(5, 'اسالة واجابات');

-- --------------------------------------------------------

--
-- Table structure for table `library_content`
--

CREATE TABLE `library_content` (
  `id` int(1) NOT NULL,
  `name` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `library_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `library_content`
--

INSERT INTO `library_content` (`id`, `name`, `image`, `video`, `text`, `library_id`) VALUES
(1, 'مشروع افطارصائم في محافظة البدائع', '', 'https://www.youtube.com/embed/8KvcK7dj-VU', '', 1),
(2, 'مكانة الصلاة', '', 'https://www.youtube.com/embed/J6xfTPCsRP4', '', 1),
(3, 'احكام الشتاء والبرد', '', 'https://www.youtube.com/embed/prKZrvj5hUk', '', 1),
(4, 'اشراط الساعة', '1962090_images.jpg', '', '', 2),
(5, 'الرحيق المختوم', 'درس-الرحيق-المختوم-150x150.jpg', '', '', 2),
(7, 'اذكار الصباح والمساء', '', '', '{الله لا إله إلا هو الحي القيوم لا تأخذه سِنة ولا نوم له ما في السماوات وما في الأرض من ذا الذي يشفع عنده إلا بإذنه يعلم ما بين أيديهم وما خلفهم ولا يحيطون بشيء من علمه إلا بما شاء وسع كرسيه السماوات والأرض ولا يَؤوده حفظهما وهو العلي العظيم}\r\n\r\nفضلها:\r\nجاء في الحديث عن أُبي بن كعب أن الجِّنَّي قال له: “إذا قرأتها -يعني آية الكُرسي- غدوةً أُجِرْتَ منا حتى تمسي، وإذا قرأتها حين تمسي أُجِرْتَ منا حتى تصبح”.\r\nقال أُبٌّي: فغدوت إلى رسول الله ﷺ فأخبرته بذلك، فقال: (صدق الخبيثُ).\r\nالحديث صححه الألباني في صحيح الترغيب (662)', 3),
(8, 'قراءة اخر ايتين من سورة البقرة', '', '', '﴿آمن الرسول بما أنزل إليه من ربه والمؤمنون كل آمن بالله وملائكته وكتبه ورسله لا نفرق بين أحد من رسله وقالوا سمعنا وأطعنا غفرانك ربنا وإليك المصير لا يكلف الله نفسا إلا وسعها لها ما كسبت وعليها ما اكتسبت ربنا لا تؤاخذنا إن نسينا أو أخطأنا ربنا ولا تَحمِل علينا إصرا كما حملته على الذين من قبلنا ربنا ولا تُحمِّلنا ما لا طاقة لنا به واعف عنا واغفر لنا وارحمنا أنت مولانا فانصرنا على القوم الكافرين﴾.\r\n\r\nفضلها:\r\nمن قرأهما في ليلة كفتاه.\r\nالحديث أخرجه البخاري (4008)، ومسلم (807)', 3),
(9, 'قراءة سورة الاخلاص والمعوذتين (ثلاث مرات)', '', '', 'فضلها: من قالها حين يصْبِحُ ويُمسي ثَلاَثَ مَرَّاتٍ، تَكْفِيه مِنْ كُلِّ شَيْءٍ، رواه الترمذي (3575) وصححه الألباني.', 3),
(10, 'اللهم بك امسينا وبك اصبحنا وبك نحيا وبك نموت واليك المصيرر.', '', '', 'رواه الترمذي (3391) وصححه الألباني', 3),
(11, 'فضل الصبر علي المرض وثوابه', '', '', 'للمرض فضل وثواب عظيم إذا صبر عليه المسلم وترك التسخط  والتشكي ، ومن ذلك:\r\n\r\n عن أبي هريرة وأبي سعيد الخدري رضي الله عنهما، عن النبي صلى الله عليه وسلم  قال: { ما يصيب المسلم من نصب، ولا وصب، ولا هم، ولا حزن، ولا أذى، ولا غم، حتى الشوكة يشاكها إلا كفر الله بها من خطاياه} [متفق عليه]\r\n\r\n', 4),
(12, 'ما حكم الاضحية مع الاستطاعة', '', '', 'قال ابن باز -رحمه الله-:\r\nتجزئ الشاة الواحدة عن الرجل وأهل بيته؛ لأن النبي صلى الله عليه وسلم كان يضحي كل سنة بكبشين أملحين أقرنين يذبح أحدهما عنه وعن أهل بيته، والثاني عمن وحد الله من أمته.\r\n\r\n المصدر؛ مجموع الفتاوى (18-38).', 5),
(14, 'تقرير', '12978797_', '', 'jfekgjvniweohfoinfweifh3ifhf', 2),
(18, 'waled', '14839553_', 'https://www.youtube.com/embed/8KvcK7dj-VU', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `view` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `about` text NOT NULL,
  `main_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `date`, `about`, `main_image`) VALUES
(1, 'عقد شراكة مجتمعية مع جمعية (واعظ)', '2023-03-02', 'في هذا اليوم الاثنين 1444-7-8 هـ\r\nوفي إطار تعزيز التعاون المشترك بين الجمعيات الخيرية تم توقيع عقد شراكة مجتمعية بين جمعية الدعوة والإرشاد وتوعية الجاليات في البدائع وجمعية واعظ لرعاية شؤون الموتى في البدائع.\r\nلتبادل الخبرات وتطوير وتنمية العمل الخيري .', 'واعظe1675098551324.jpg'),
(2, 'شراكة مجتمعية مع مؤسسة الغذاء والكيف', '2023-03-08', 'وقع اليوم الأربعاء ١٦-١١-١٤٤٣هـ مدير جمعية الدعوة بالبدائع اتفاقية شراكة مجتمعية مع مؤسسة الغذاء والكيف و تأتي هذه الشراكة ضمن تحقيق رؤية المملكة ٢٠٣٠ ، وتهدف لتحسين بيئة العمل وتغطية الضيافة.', '29507769_شراكة-1536x864.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `our_contact`
--

CREATE TABLE `our_contact` (
  `id` int(1) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `instgram` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `our_contact`
--

INSERT INTO `our_contact` (`id`, `phone`, `email`, `whatsapp`, `address`, `facebook`, `twitter`, `youtube`, `instgram`, `logo`) VALUES
(1, '05533213620', 'info@Dawabadaya.org', '012 345 67890', '', 'https://www.facebook.com/waled.wakel.1', '', '', '', '78599455_17463377_63550625_39822187_logo-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `jop` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `admin` int(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `name`, `jop`, `image`, `admin`, `password`, `email`, `phone`) VALUES
(1, 'محمد بن صالح', 'رئيس مجلس الادارة', '24945270_team-3.jpg', 1, '123', 'waledwakel105@gmail.com', '0127548966');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `image`, `about`) VALUES
(1, 'افطار ودعوة', '76796754_إفطار-ودعوة.png', 'استثمار تفطير الصائمين في موسم رمضان من الجاليات المختلفة في دعوتهم وتعليمهم ما يجب أن يتعلمه المسلم من أمور دينه .'),
(2, 'البطاقات الدعوية', 'البطاقات-الدعوية.png', 'منشورات دعوية بلغات متعددة تنشر عبر وسائل التواصل الاجتماعي.'),
(3, 'رحلات العمرة', 'رحلات-العمرة.jpg', 'رحلات عمرة شهرية للجاليات');

-- --------------------------------------------------------

--
-- Table structure for table `projects_properties`
--

CREATE TABLE `projects_properties` (
  `id` int(1) NOT NULL,
  `property` text NOT NULL,
  `project_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `projects_properties`
--

INSERT INTO `projects_properties` (`id`, `property`, `project_id`) VALUES
(2, ' توزيع كتب ومطويات الصيام على الحضور.', 1),
(3, 'إقامة المسابقة الرمضانية على السيرة العطرة لمحمد صلى الله عليه وسلم بأربع لغات .', 1),
(4, ' توزيع مطويات زكاة الفطر بمختلف لغات الجاليات .\r\n', 1),
(5, 'تنظيم رحلات العمرة الدعوية للجاليات المشاركة في التفطير .', 1),
(6, 'تم توزيع أكثر من ( 81 ألف) وجبة تفطير', 1),
(14, 'بطاقة آية وتفسير\r\nننشر فيها آية أو آيتين مع تفسيرها من كتاب التفسير الميسر، وتبدأ البطاقات من سورة الناس إلى البقرة.', 2),
(15, 'بطاقة وقفة مع حديث نبويننشر فيها الأحاديث المهمة للمسلم والتي فيها بعض المصطلحات الغريبة .تبين معنى هذه المصطلحات، ثم يصحب الحديث بشرح لأحد العلماء .', 2),
(16, 'بطاقة درر من أقوال العلماء\r\nننشر فيه حكمة لأحد العلماء من السلف أو الخلف .', 2),
(17, 'بطاقة أحكام تهم المرأة\r\nننشر فيها فتاوى على شكل سؤال وجواب أو تكون مقالا مختصراً فيه حكم فقهي يخص النساء.', 2),
(18, 'بطاقة أحكام تهم المسلم\r\n', 2),
(19, 'على شاكلة (بطاقة أحكام تهم المرأة) يهم المسلمين وليس خاصا بالرجال.', 2),
(20, 'بطاقة من فضائل الأعمال والأقوال\r\nننشر فيها أحاديث الترغيب وفضائل الأعمال.', 2),
(21, 'تسعى الجمعية إلى الاهتمام بشعيرة العمرة ومساعدة حديثي الإسلام من الجاليات وممن لم يسبق لهم العمرة لأداء فريضة العمرة حيث تنظم رحلات دورية لأداء العمرة وزيارة المدينة النبوية والأولوية لمن لم يسبق له أداء العمرة لكافة الجاليات المتواجدة في المحافظة ويتخلل الرحلة برامج دعوية ومسابقات ثقافية.\r\n', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charity_goals`
--
ALTER TABLE `charity_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charity_message`
--
ALTER TABLE `charity_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charity_numbers`
--
ALTER TABLE `charity_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charity_values`
--
ALTER TABLE `charity_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charity_vision`
--
ALTER TABLE `charity_vision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governate`
--
ALTER TABLE `governate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governate_content`
--
ALTER TABLE `governate_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `governate_content_ibfk_1` (`governate_id`);

--
-- Indexes for table `index_slider`
--
ALTER TABLE `index_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_content`
--
ALTER TABLE `library_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `library_content_ibfk_1` (`library_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_contact`
--
ALTER TABLE `our_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_properties`
--
ALTER TABLE `projects_properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_properties_ibfk_1` (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `charity_goals`
--
ALTER TABLE `charity_goals`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `charity_message`
--
ALTER TABLE `charity_message`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `charity_numbers`
--
ALTER TABLE `charity_numbers`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `charity_values`
--
ALTER TABLE `charity_values`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `charity_vision`
--
ALTER TABLE `charity_vision`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `governate`
--
ALTER TABLE `governate`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `governate_content`
--
ALTER TABLE `governate_content`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `index_slider`
--
ALTER TABLE `index_slider`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `library_content`
--
ALTER TABLE `library_content`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `our_contact`
--
ALTER TABLE `our_contact`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects_properties`
--
ALTER TABLE `projects_properties`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `governate_content`
--
ALTER TABLE `governate_content`
  ADD CONSTRAINT `governate_content_ibfk_1` FOREIGN KEY (`governate_id`) REFERENCES `governate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `library_content`
--
ALTER TABLE `library_content`
  ADD CONSTRAINT `library_content_ibfk_1` FOREIGN KEY (`library_id`) REFERENCES `library` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects_properties`
--
ALTER TABLE `projects_properties`
  ADD CONSTRAINT `projects_properties_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
