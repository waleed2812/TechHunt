-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 06:54 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech_hunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `email` varchar(128) NOT NULL,
  `ID` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`email`, `ID`) VALUES
('waleed3072@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `item_info`
--

CREATE TABLE `item_info` (
  `ID` int(16) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(512) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` int(9) NOT NULL,
  `available` int(9) NOT NULL,
  `image` varchar(30) NOT NULL,
  `company` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_info`
--

INSERT INTO `item_info` (`ID`, `title`, `description`, `category`, `price`, `available`, `image`, `company`) VALUES
(1, 'MSI H110M PRO-VH PLUS INTEL H1', 'The PRO Series motherboards fit in any PC. Quality you can trust with top performance and clever business solutions are key aspects of these motherboards. Make your life easier and boost your business with the super stable, reliable and long-lasting PRO Series motherboards.<ul style=\"margin-left: 10px;\"><li>Supports 6th Gen Intel® Core™ / Pentium® / Celeron® processors</li><li>Supports DDR4-2133 Memory</li><li>DDR4 Boost: Give your DDR4 memory a performance boost</li><li>USB 3.1 Gen1 + SATA 6Gb/s</li></ul>', 'Motherboard', 599, 10, 'img/motherboard/product1.jpg', 'GIGABYTE'),
(3, 'NVIDIA RTX 2080', 'Speed: 2.4Ghx<br>\r\nDDR4<br>\r\nStorage: 6GB<br>', 'GPU', 500, 92, 'img/latest-item-1.jpg', 'NVIDIA'),
(4, 'MSI 2080ti', 'Customized MSI 2080ti 8GB RAM RGB', 'GPU', 500, 12, 'img/latest-item-2.jpg', 'NVIDIA'),
(5, 'RAM 16GB', 'Crucial 4 GB (1 x 4 GB) CT51264BD160BJ.8FED', 'RAM', 550, 9, 'img/latest-item-3.jpg', 'Crucial'),
(6, 'RAM 8GB', 'Corsair Dominator Platinum RGB 32GB DDR4-3200MHz', 'RAM', 400, 13, 'img/latest-item-4.jpg', 'Corsair'),
(7, 'RAM 16GB', 'G.Skill TridentZ RGB 16GB DDR4-2400MHz', 'RAM', 500, 11, 'img/latest-item-5.jpg', 'TridentZ'),
(8, 'SSD 500GB', 'FireCuda 510. Some solid read/write speeds.', 'STORAGE', 550, 11, 'img/latest-item-6.jpg', 'FireCuba'),
(9, 'PC Case', 'White, Elequoent and Transpaernt PC Case.', 'Case', 300, 100, 'img/latest-item-7.jpg', 'PC CAse'),
(10, 'ASUS Monitor', 'ASUS ROG Monitor For Gaming', 'Monitor', 200, 10, 'img/latest-item-8.jpg', 'ASUS'),
(11, 'Intel Core i Series', 'Strong processor', 'Processor', 5000, 12, 'img/pp/1.png', 'INTEL'),
(12, 'RGB Keyboard', 'Colourfull keyboard', 'Other', 2000, 9, 'img/pp/2.png', 'ASUS'),
(13, 'Noise Cancellation Headphones', 'Good song quality', 'Other', 1000, 13, 'img/pp/3.png', 'Corsair'),
(14, 'Mouse Pad', 'Smooth and soft', 'Other', 500, 12, 'img/pp/4.png', 'TridentZ'),
(15, 'HDMI Cable', 'Strong Cable', 'Other', 1000, 11, 'img/pp/5.png', 'Samsung'),
(16, 'Pre-Built PC', 'Full PC', 'Other', 50000, 10, 'img/pp/6.gif', 'HP'),
(17, 'Corsair Fans', 'Colourfull fans', 'Other', 1000, 5, 'img/pp/7.png', 'Corsair'),
(18, 'RGB Corsair Fans', 'Colourfull fans', 'Other', 1500, 10, 'img/pp/8.png', 'Corsair'),
(19, 'ARGB Fans', 'Colourfull fans', 'Other', 200, 15, 'img/pp/9.png', 'Corsair'),
(20, 'Snowblind White LEDs', 'Colourfull LEDs', 'Other', 200, 15, 'img/pp/10.png', 'ASUS'),
(21, 'No Sound Mouse Pad', 'Smooth and soft', 'Other', 200, 15, 'img/pp/11.png', 'GIGABYTE'),
(33, 'iBUYPOWER USB Extension', 'Strong and fast', 'Other', 200, 15, 'img/pp/12.png', 'HP'),
(36, 'Gigabyte H310M S2H 2.0 Intel H', 'Intel H310 Ultra Durable motherboard with GIGABYTE 8118 Gaming LAN, PCIe Gen2 x2 M.2, HDMI 1.4, DVI-D, D-Sub Ports for Multiple Display, Anti-Sulfur Resistor, Smart Fan 5, CEC 2019 ready\r\n<ul>\r\n        <li>Supports 9th and 8th Gen Intel® Core™ Processors</li>\r\n        <li>Dual Channel Non-ECC Unbuffered DDR4</li>\r\n        <li>8-Channel HD Audio with High Quality Audio Capacitors</li>\r\n        <li>Ultra-Fast M.2 with PCIe Gen2 X2 & SATA interface</li>\r\n    </ul>', 'Motherboard', 10900, 10, 'img/motherboard/H310M.jpg', 'Gigabyte'),
(37, 'Asus EX-B365M-V5 Intel B365 LGA 1151 mATX Motherboard', 'EX-B365M-V5. Intel B365 LGA 1151 mATX motherboard feature with luminous anti-moisture coating, SafeSlot Core+, USBGuard, LANGuard, DDR4 2666MHz, HDMI, D-Sub, SATA 6Gbps and USB 3.2 Gen 1, and 8-pin power connector\r\n<ul>\r\n        <li>Built for non stop action</li>\r\n        <li>Exceptional stability and protection</li>\r\n        <li>Protects against moisture and corrosion</li>\r\n        <li>Surge-Protected Networking</li>\r\n    </ul>', 'Motherboard', 13900, 5, 'img/motherboard/asus.jpg', 'Asus'),
(38, 'MSI B365M PRO-VDH Intel LGA-1151 Micro-ATX Motherboard', 'Intel LGA-1151 Micro-ATX motherboard with DDR4 2666MHz, Core Boost, DDR4 Boost, Audio Boost and EZ Debug LED\r\n<ul>\r\n        <li>Supports 9th / 8th Gen Intel® Core™ / Pentium® Gold / Celeron® processors</li>\r\n        <li>Supports DDR4 Memory, up to 2666 MHz</li>\r\n        <li>Turbo M.2: Running at PCI-E Gen3 x4</li>\r\n        <li>Audio Boost: Reward your ears with studio grade sound quality</li>\r\n    </ul>', 'Motherboard', 15300, 15, 'img/motherboard/product.jpg', 'MSI'),
(39, 'Asus PRIME H310M-A R2.0 Intel LGA-1151 mATX Motherboard', 'Asus PRIME H310M-A R2.0 Intel LGA-1151 mATX Motherboard\r\n Be the first to write a review.\r\nProduct Code: PRIME H310M-A R2.0\r\nPrice Updated On: 11 Aug, 2020\r\nDDR4 2666MHz, SATA 6Gbps and USB 3.1 Gen 1. ASUS OptiMem: Careful routing of traces and vias to preserve signal integrity for improved memory stability.\r\n<ul>\r\n        <li>Support 8th Gen Intel®core™ Processor Intel®LGA 1151 Socket</li>\r\n        <li>4x SATA 6Gb/s</li>\r\n        <li>DIGI+ VRM & EPU</li>\r\n        <li>2 x Front USB 3.1 Gen 1</li>\r\n    </ul>', 'Motherboard', 14000, 5, 'img/motherboard/matx.jpg', 'Asus'),
(40, 'Thermaltake Litepower Series GEN2 450W Power Supply (LTP-0450P-2)', 'The Thermaltake Litepower GEN2 series is ideal for basic desktop systems with lower power level consumption - where efficiency, reliability and low noise is of utmost importance.\r\n<ul>\r\n        <li>Haswell ready</li>\r\n        <li>Ultra quiet 120mm fan</li>\r\n        <li>Elongated Sleeved Cables</li>\r\n        <li>Utmost Reliability and Compatibility</li>\r\n    </ul>', 'PSU', 6300, 15, 'img/psu/product1.jpg', 'Thermaltake'),
(41, 'Corsair CV450 450 Watt 80 Plus Bronze Certified PSU', 'CORSAIR CV power supplies are ideal for powering your new home or office PC, with 80 PLUS Bronze efficiency guaranteed to continuously deliver full wattage to your system.\r\n<ul>\r\n        <li>Ultra efficient</li>\r\n        <li>Continuous, reliable output</li>\r\n        <li>Low-Noise Operation</li>\r\n        <li>Compact Design</li>\r\n    </ul>', 'PSU', 6700, 20, 'img/psu/product2.jpg', 'Corsair'),
(42, 'Thermaltake Smart RGB 600W PSU SPR-0600NHSAW', 'Smart Series SPR-0600NHFAW – 600W 80 PLUS® Standard Certified APFC PSU. Thermaltake, as the pioneer who incorporates RGB lights into PSU, has launched the Thermaltake Smart RGB Series, coming with a pre-installed RGB fan hub with 15 lighting modes to choose from and built-in memory.\r\n<ul>\r\n        <li>One Button to Your Desired Color</li>\r\n        <li>10 LED Light Bulbs</li>\r\n        <li>Ultra Quiet 120mm Fan</li>\r\n        <li>High Amperage Single +12V Rail</li>\r\n    </ul>', 'PSU', 9700, 20, 'img/psu/product3.jpg', 'Thermaltake'),
(43, 'Intel Core i3-9100F Desktop Processor Without Processor Graphics LGA1151 9th Generation', '9th Gen Intel Core i3-9100f desktop processor without processor graphics. Features Intel Turbo Boost Technology 2.0 and offers mainstream performance for exceptional overall productivity. Thermal solution included in the box. Only compatible with Intel 300 Series chipset based motherboards. 65W.\r\n<ul>\r\n        <li># of Cores 4 # of Threads 4</li>\r\n        <li>Processor Base Frequency 3.60 GHz | Max Turbo Frequency 4.20 GHz</li>\r\n        <li>6 MB SmartCache</li>\r\n        <li>TDP 65 W</li>\r\n    </ul>', 'Processor', 16800, 5, 'img/processor/product1.jpg', 'Intel'),
(44, 'AMD Ryzen™ 3 3200G With Radeon™ Vega 8 Graphics AM4 Processor', 'The AMD Ryzen 3 3200G 3.6 GHz Quad-Core AM4 Processor is a quad-core processor with four threads, designed for socket AM4 motherboards. The third-generation 12nm Ryzen G processor offers increased performance compared to its predecessor, with this model having a base clock speed of 3.6 GHz and a max boost clock speed of 4.0 GHz. Moreover, it features 4MB of L3 cache, support for dual-channel 2933 MHz DDR4 RAM, and integrated Radeon Vega 8 graphics.\r\n<ul>\r\n        <li>4 Cores & 4 Threads</li>\r\n        <li>3.', 'Processor', 19500, 10, 'img/processor/product2.jpg', 'AMD'),
(45, 'Intel Core i3-9100 Processor (Boxed) BX80684I39100 LGA1151 9th Generation', 'Packing in four cores and four threads, the Core i3-9100 Processor from Intel has a 3.6 GHz base clock speed and a 4.2 GHz maximum boost speed. Compatible with LGA 1151 motherboard sockets, this 9th-generation Core i3 CPU comes with a 6MB Intel Smart Cache.\r\n<ul>\r\n        <li>4 Cores & 4 Threads</li>\r\n        <li>4.2 GHz Maximum Boost Speed</li>\r\n        <li>LGA 1151 Socket</li>\r\n        <li>6 MB SmartCache</li>\r\n    </ul>', 'Processor', 24000, 3, 'img/processor/product3.jpg', 'Intel'),
(46, 'Intel Core i5-9400F Desktop Processor - LGA1151', '9th Gen Intel Core i5-9400f desktop processor without processor graphics. Features Intel Turbo Boost Technology 2.0 and offers powerful performance for mainstream gaming and creating. Discrete graphics required. Thermal solution included in the box. Only compatible with 300 Series chipset based motherboard.\r\n<ul>\r\n        <li>9M Cache, up to 4.10 GHz</li>\r\n        <li>Processor Base Frequency 2.90 GHz</li>\r\n        <li>6 Cores/ 6 Threads</li>\r\n        <li>Discrete GPU required - No integrated graphics</li>\r', 'Processor', 29900, 9, 'img/processor/product4.jpg', 'Intel'),
(47, 'AMD Ryzen 5 3600 Desktop Processor With Wraith Stealth Cooler', 'AMD 3600: Serious Gaming. Fully Unlocked*. The world\'s most advanced processor in the desktop PC gaming segment. Can deliver ultra-fast 100+ FPS performance in the world\'s most popular games. For the advanced socket AM4 platform, can support PCIe 4.0 on x570 motherboards.\r\n<ul>\r\n        <li># of CPU Cores 6 | # of Threads 12</li>\r\n        <li>Base Clock 3.6GHz | Max Boost Clock 4.2GHz</li>\r\n        <li>35MB L1 + L2 + L3 Cache</li>\r\n        <li>PCI Express® Version PCIe 4.0 x16</li>\r\n    </ul>', 'Processor', 38500, 5, 'img/processor/product5.jpg', 'AMD'),
(48, 'ADATA Ultimate SU650 120GB 3D-NAND 2.5\" SATA III Solid State Drive - ASU650SS-120GT-R', 'Read/Write Speed Up to 520/450 MB/s *Vary by SSD capacity\r\n<ul>\r\n        <li>3D NAND Technology</li>\r\n        <li>Dynamic SLC Caching for optimized performance</li>\r\n        <li>Budget-Friendly entry level everyday SSD</li>\r\n        <li>SU650SS 120GB BLACK COLOR BOX</li>\r\n    </ul>', 'Storage', 4300, 12, 'img/storage/product1.jpg', 'ADATA'),
(49, 'Gigabyte SSD 120GB 2.5-inch Internal SATA 6.0Gb/s GP-GSTFS31120GNTD', 'GIGABYTE SSDs possess both high data transferring speed and enhanced endurance, providing durable MTBF* of 2.0 million hours.\r\n<ul>\r\n        <li>Total Capacity: 120GB*</li>\r\n        <li>Sequential Read speed : up to 500 MB/s**</li>\r\n        <li>Sequential Write speed : up to 380 MB/s**\r\n</li>\r\n        <li>TRIM & S.M.A.R.T supported</li>\r\n    </ul>', 'Storage', 4400, 15, 'img/storage/product2.jpg', 'Gigabyte'),
(50, 'Western Digital (WD) Green 240GB PC Solid State Drive (SSD) - WDS240G2G0A', 'For use in laptops and desktop computers, WD Green SSDs offer high performance and reliability to boost your daily computing activities. WD Green solid state drives are compatible with most PCs.\r\n<ul>\r\n        <li>Serial ATA-600</li>\r\n        <li>Internal Data Rate: 545 MBps</li>\r\n        <li>Data Transfer Rate: 600 MBps</li>\r\n        <li>Compliant Standards: S.M.A.R.T.</li>\r\n    </ul>', 'Storage', 6300, 22, 'img/storage/product3.jpg', 'Western Digital(WD)'),
(51, 'Sapphire PULSE RX 550 4GB GDDR5 Video Graphics Card 11268-01-20G', 'The 4th generation of Graphics Core Next architecture is the modern, future-proof foundation of Polaris GPUs. It brings energy-saving solutions of Radeon Chill, native support for crucial next-generation API features and latest display technologies, like HDR and Radeon FreeSync 2.\r\n<ul>\r\n        <li>512 Stream Processors</li>\r\n        <li>Engine Clock: Up to 1206 MHz (Boost)</li>\r\n        <li>4GB GDDR5, 128-bit, 7000 MHz Effective</li>\r\n        <li>Intelligent Fan Control III</li>\r\n    </ul>', 'GPU', 22500, 8, 'img/gpu/product1.jpg', 'Sapphire'),
(52, 'Asus PH-GTX1650-O4G Phoenix GeForce GTX 1650 OC Edition 4GB GDDR5 Graphics Card', 'The ASUS Phoenix GeForce® GTX 1650 is built with the breakthrough graphics performance of the award-winning NVIDIA Turing™ architecture to supercharge your favourite games.\r\n<ul>\r\n        <li>CUDA Core 896</li>\r\n        <li>OC Mode - GPU Boost Clock : 1710 MHz</li>\r\n        <li>GDDR5 4GB 128-bit</li>\r\n        <li>Digital Max Resolution:7680x4320</li>\r\n    </ul>', 'GPU', 32500, 5, 'img/gpu/product2.jpg', 'Asus'),
(53, 'MSI GeForce RTX 2070 TRI FROZR Video Graphics Card', 'Triple-Fan Thermal Design. Afterburner Overclocking Utility. Real-Time Ray Tracing In Games.\r\n<ul>\r\n        <li>2304 Units Cores</li>\r\n        <li>Boost: 1620 MHz</li>\r\n        <li>8GB GDDR6 256-bit</li>\r\n        <li>DisplayPort x 3 (v1.4) / HDMI 2.0b x 1</li>\r\n    </ul>', 'GPU', 104900, 4, 'img/gpu/product3.jpg', 'MSI'),
(54, 'ZOTAC Gaming GeForce RTX 2070 Super Mini ZT-T20710E-10M, Twin Fan', 'ZT-T20710E-10M. ZOTAC GAMING GeForce RTX 2070. Everything is super with the all-new ZOTAC GAMING GeForce RTX 20 Series SUPER graphics cards.\r\n<ul>\r\n        <li>CUDA cores 2560</li>\r\n        <li>Boost: 1770 MHz</li>\r\n        <li>8GB GDDR6 256-bit</li>\r\n        <li>Memory Clock: 14.0 Gbps</li>\r\n    </ul>', 'GPU', 105000, 2, 'img/gpu/product4.jpg', 'ZOTAC'),
(55, 'ZOTAC GAMING GeForce RTX 2080 Ti Twin Fan ZT-T20810G-10P', 'The all-new generation of ZOTAC GAMING GeForce graphics cards is here. Based on the new NVIDIA Turing architecture, it’s packed with more cores and all-new GDDR6 ultra-fast memory. Integrated with more smart and optimized technologies, get ready to get fast and game strong like never before.\r\n<ul>\r\n        <li>CUDA Cores: 4352</li>\r\n        <li>Boost: 1545 MHz</li>\r\n        <li>11GB GDDR6 352-bit</li>\r\n        <li>Memory Clock: 14.0 Gbps</li>\r\n    </ul>', 'GPU', 237000, 1, 'img/gpu/product5.jpg', 'ZOTAC'),
(56, 'Compare\r\nSeagate BarraCuda ST1000DM010 1TB Hard Drive Bare Drive', '<ul>\r\n        <li>Versatile, Fast and Dependable</li>\r\n        <li>64MB Cache</li>\r\n        <li>SATA 6.0Gb/s 3.5\"</li>\r\n        <li>Multi-Tier Caching Technology</li>\r\n    </ul>', 'Storage', 7200, 12, 'img/storage/product4.jpg', 'Seagate'),
(57, 'ADATA HD650 1TB Red External Hard Drive AHD650-1TU31-CRD', 'The ADATA HD650 1TB/2TB/4TB External Hard Drive is back stronger and bigger than before. Its impact-absorbing rubber coating and three-layer construction make it extremely durable to protect your contents, all while looking cool. We now offer it in three colors: blue, black, and red. Capacity goes up to 4TB, a milestone for unpowered external hard drives! With USB 3.2 Gen 1 speeds and ADATA-backed quality, the HD650 delivers spacious and secure storage.\r\n<ul>\r\n        <li>Designed to Absorb the Hardest Knoc', 'Storage', 8400, 14, 'img/storage/product5.jpg', 'ADATA'),
(58, 'ADATA HD650 1TB Red External Hard Drive AHD650-1TU31-CRD', 'The ADATA HD650 1TB/2TB/4TB External Hard Drive is back stronger and bigger than before. Capacity goes up to 4TB, a milestone for unpowered external hard drives! With USB 3.2 Gen 1 speeds and ADATA-backed quality, the HD650 delivers spacious and secure storage.\r\n<ul>\r\n        <li>Designed to Absorb the Hardest Knocks</li>\r\n        <li>Bigger capacity handles more storage needs</li>\r\n        <li>Dazzling Blue LED Indicator</li>\r\n        <li>Surface Protected</li>\r\n    </ul>', 'Storage', 8400, 14, 'img/storage/product5.jpg', 'ADATA'),
(59, 'Transcend 4GB DDR4-2666 U-DIMM (JetRam) JM2666HLD-4G Memory Module', 'Transcend\'s JetRam memory modules are manufactured with true ETT grade, brand-name DRAM chips that have passed Transcend\'s strict screening process and rigorous environmental testing.\r\n<ul>\r\n        <li>4GB Capacity</li>\r\n        <li>PC4-21300</li>\r\n        <li>2666 MHz Clock Speed</li>\r\n        <li>288-Pin UDIMM</li>\r\n    </ul>', 'RAM', 3800, 11, 'img/ram/product1.jpg', 'Transcend'),
(60, 'ADATA 4GB DDR3L 1600 Premier SO-DIMM ADDS1600W4G11-S', 'DDR3L-1600 4GB 1.35V. Every Stage of Production Strictly Controlled.\r\n<ul>\r\n        <li>1600 MHz</li>\r\n        <li>512MX8</li>\r\n        <li>DDR3L SO-DIMM 4GB 1600 (11)</li>\r\n        <li>ADDS1600W4G11-S</li>\r\n    </ul>', 'RAM', 4900, 13, 'img/ram/product2.jpg', 'ADATA'),
(61, 'ADATA 8GB DDR3L 1600 SO-DIMM Memory Module ADDS1600W8G11-S', 'ADATA 8GB DDR3L 1600 SO-DIMM Memory Module ADDS1600W8G11-S\r\n Be the first to write a review.\r\nCategory: Memory Module / RAM > Laptop (SOD) - DDR3 Memory\r\nProduct Code:  ADDS1600W8G11-S\r\nADATA continues to lead the industry in DRAM timing and density with these 8GB Premier Series DDR3L 1600 single piece memory modules.\r\n<ul>\r\n        <li>Meets Rigorous Standards and Specifications</li>\r\n        <li>512MX8</li>\r\n        <li>DDR3L SO-DIMM 8GB 1600 (11)</li>\r\n        <li>1.35V</li>\r\n    </ul>', 'RAM', 7500, 16, 'img/ram/product3.jpg', 'ADATA'),
(62, 'ADATA XPG GAMMIX D30 DDR4 Memory Module 8GB 3000MHz PC4-24000 Black AX4U300038G16-SB30', 'The GAMMIX D30 features an edgy wing-shaped design that exudes a sense of power and stealth. It’s encased in a grey, glossy heat spreader that contrasts beautifully with your choice of a translucent red or black top cover.\r\n<ul>\r\n        <li>The Performance to Win</li>\r\n        <li>Overclocking with Intel® XMP 2.0</li>\r\n        <li>Top-Quality Chips for Enhanced Durability</li>\r\n        <li>Edgy wing-shaped design</li>\r\n    </ul>', 'RAM', 7500, 17, 'img/ram/product5.jpg', 'ADATA'),
(63, 'G.Skill Aegis 8GB DDR4 SDRAM 3000MHz Desktop Memory F4-3000C16S-8GISB', 'Named after the powerful shield of Greek gods, Aegis symbolizes strength and power. This new addition of DDR4 memory to the AEGIS family of gaming memory is designed for upgraded performance and high stability on the latest PC gaming systems.\r\n<ul>\r\n        <li>Designed for Gamers</li>\r\n        <li>Built for Quality</li>\r\n        <li>Power Efficient</li>\r\n        <li>XMP 2.0 Support</li>\r\n    </ul>', 'RAM', 5900, 18, 'img/ram/product4.jpg', 'G.Skill'),
(64, 'Apple Magic Keyboard MC184', 'With an improved scissor mechanism and a lower profile, the Apple Magic Keyboard provides a comfortable typing experience.\r\n<ul>\r\n        <li>Wireless Bluetooth Connectivity</li>\r\n        <li>Built-In Rechargeable Battery</li>\r\n        <li>Improved Scissor Mechanism for Keys</li>\r\n        <li>Low Profile, Compact Design</li>\r\n    </ul>', 'Other', 4800, 22, 'img/pp/product5.jpg', 'APPLE');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `email` varchar(128) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `password` varchar(16) NOT NULL,
  `address` varchar(512) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` varchar(8) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`email`, `first_name`, `last_name`, `phone`, `gender`, `password`, `address`, `city`, `zip`, `country`) VALUES
('waleed3072@gmail.com', 'Waleed', 'Butt', '923485157334', 'F', 'Dw1r6eCcFDAH7G', 'sdklf;ksjdhfkdshfkjshdkjfhskdjhf', 'Islamabad', '44000', 'Afghanistan'),
('waleed30@gmail.com', 'Waleed', 'Butt', '923485157334', 'M', 'Dw1r6eCcFDAH7G', 'sdklf;ksjdhfkdshfkjshdkjfhskdjhf', 'Islamabad', '44000', 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `email` varchar(128) DEFAULT NULL,
  `ID` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`email`, `ID`) VALUES
('waleed30@gmail.com', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `fk_cart_email` (`email`),
  ADD KEY `fk_cart_id` (`ID`);

--
-- Indexes for table `item_info`
--
ALTER TABLE `item_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD KEY `fk_wl_email` (`email`),
  ADD KEY `fk_wl_id` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_info`
--
ALTER TABLE `item_info`
  MODIFY `ID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_email` FOREIGN KEY (`email`) REFERENCES `user_info` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cart_id` FOREIGN KEY (`ID`) REFERENCES `item_info` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `fk_wl_email` FOREIGN KEY (`email`) REFERENCES `user_info` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_wl_id` FOREIGN KEY (`ID`) REFERENCES `item_info` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
