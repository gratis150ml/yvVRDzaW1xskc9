-- Adminer 4.8.1 MySQL 5.5.5-10.6.5-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_locked` tinyint(1) NOT NULL DEFAULT 0,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `posts` (`id`, `owner`, `title`, `views`, `password`, `is_locked`, `message`, `created_at`, `updated_at`) VALUES
(53629,	'admin',	'1234',	0,	'$2y$10$ntv1/aZqRXI6ioeY26Pun.cuQcy.38OpMub9kwHDT4eXvp0.rhswW',	1,	'123',	'2022-02-12 04:50:48',	'2022-02-12 04:50:48'),
(53630,	'admin',	'supersecret',	0,	'',	0,	'$2y$10$ntv1/aZqRXI6ioeY26Pun.cuQcy.38OpMub9kwHDT4eXvp0.rhswW',	'2022-02-12 04:55:51',	'2022-02-12 04:55:51');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) DEFAULT 0,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_expiry` datetime NOT NULL,
  `activated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_banned` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`, `active`, `code`, `activation_expiry`, `activated_at`, `created_at`, `updated_at`, `is_banned`) VALUES
(1,	'admin',	'mBbfEbG6G4OzOv@protonmail.com',	'$2y$10$PY2F/n9pTQXYZhujfG1AkOEA07SA9lfYvSb0fFz6knLfMTHFKTaWS',	1,	1,	'$2y$10$aNrqcoBTwIEPSl2kyJYvhueGI/llUwTc2.WkB83E2EVdfE9tIE3GK',	'2022-02-12 00:42:31',	NULL,	'2022-02-12 00:27:31',	'2022-02-12 00:31:05',	0),
(73622,	'5pSMoDsrMt3KYZ4diYNg',	'retarded@retarded.io',	'$2y$10$8yxIp8HVOmc06N0AiPc16uzReedMhj3LTZtVjA.nJVsFcK4nPzF/e',	0,	0,	'$2y$10$benOtvyhWUEnzCwcrUsSyOt7zLW9.iqUpUdquQI.j6XtDMze8ZKM2',	'2022-02-12 00:36:23',	NULL,	'2022-02-12 00:21:23',	'2022-02-12 00:21:23',	0),
(73623,	'LUVaaK5XgveqyfWIshdK',	'retarded1@retarded.io',	'$2y$10$Q37o7JEVSPe88JlBPUxGAedl/tLjWOgJ2/O8qLpqRCsWqVd0PtM0S',	0,	0,	'$2y$10$KaB8x6vi1fLfvmYnHbK78O6VMxlAqXXNwgOiLx7Mbd6NsB5uW.HAe',	'2022-02-12 00:36:29',	NULL,	'2022-02-12 00:21:29',	'2022-02-12 00:21:29',	0),
(73624,	'WELk1NAOLMAkKyQOeYu4',	'retarded2@retarded.io',	'$2y$10$3.wX.TMZyLIRz2qV6PlwL.P9J2wNgFcJN/MDiGciQBA5HC/vOLRSG',	0,	0,	'$2y$10$bFGv4p9G.RjSdbUWLafsO.Ffzr/joMmT5CM1eVBjS8hIotdhC03K.',	'2022-02-12 00:36:33',	NULL,	'2022-02-12 00:21:33',	'2022-02-12 00:21:33',	0),
(73625,	'DMpeVTX2ebcIlIsRnzhM',	'retarded3@retarded.io',	'$2y$10$G2vPn1fZXJslKQMurQSSneuNKdhbvL2IYvqKhmtEpUnCoAe3rdEA2',	0,	0,	'$2y$10$3aZUCeyz9a27dFoLRMsuN.FAP0Y2FzYDlZCDv8ztCL5JIVaL4r0ju',	'2022-02-12 00:36:38',	NULL,	'2022-02-12 00:21:38',	'2022-02-12 00:21:38',	0),
(73626,	'4xp3Wr1W5MlxGk7UC5cH',	'retarded4@retarded.io',	'$2y$10$2QvjB7tuH.WUSTnNA3L7E.s3yjDl//qrYArLvmjLX5Gn960Va4stO',	0,	0,	'$2y$10$XHFbTyCObA6sVLL5KP5HsOkApCkMLKDtFgBSDgHGcXtUCUzCoolzi',	'2022-02-12 00:36:41',	NULL,	'2022-02-12 00:21:41',	'2022-02-12 00:21:41',	0),
(73627,	'xpt9OXrLh4QCrQ2QO6Tg',	'retarded5@retarded.io',	'$2y$10$MVB0vSCkujlhi/sWF5HriOFbE1m/EAWg0cYeahEzgelwMB4oM.UVS',	0,	0,	'$2y$10$hxzVTm50rtUdFi75Xd0iPeV7FS3.kEICklgJJbfWwjQGsfX/O.9KW',	'2022-02-12 00:36:45',	NULL,	'2022-02-12 00:21:45',	'2022-02-12 00:21:45',	0),
(73628,	'5St1m4OQyqwqrY97B52c',	'retarded6@retarded.io',	'$2y$10$0k400PEm.F41iOcAolA30.oj9Fx7ErDVdtLC/tNnj..B8avMDx8H2',	0,	0,	'$2y$10$mJCrElgTCZq8b6p5vYZmCOJT2ad01eaQLkZVT/D7m51EYS3iDEUtG',	'2022-02-12 00:36:49',	NULL,	'2022-02-12 00:21:49',	'2022-02-12 00:21:49',	0),
(73629,	'OUYaRhhsN426bSnK6nNW',	'retarded7@retarded.io',	'$2y$10$w/a1phLI4xZrCKD7QThfHulMYmKTT7TzKprLdFYbKKJfGz/rsvg0e',	0,	0,	'$2y$10$xLiGKvlVRQZEJ7AYJPA0f.XntbpcR5.wlrwO13k7XveHCAPtRMY.e',	'2022-02-12 00:36:52',	NULL,	'2022-02-12 00:21:52',	'2022-02-12 00:21:52',	0),
(73630,	'Qr9v9vtJL3p0spiM8Zdg',	'retarded8@retarded.io',	'$2y$10$cJDOYJ7UFB3eS.Ga3PkX.e39JfE/M0PeQnf5TxHL/EmZRyR3o917.',	0,	0,	'$2y$10$4Z8Zls8S8BepTFk2BsjiW.C7b.FVFA843qHP7S71FvXdxHzEMfrLW',	'2022-02-12 00:36:59',	NULL,	'2022-02-12 00:21:59',	'2022-02-12 00:21:59',	0),
(73631,	'LTeMWalNrppVIcEkwkiC',	'retarded9@retarded.io',	'$2y$10$FCgrPb31Lvt.HEPuj4ShoOtRLmUrwggn2YgbRHnkiJxCrxRTBso/.',	0,	0,	'$2y$10$rMuao8sb8JkRQg7h0q.zRuueNfG2nN7q8/gXTXrvSKGOMgOlBq6aO',	'2022-02-12 00:37:04',	NULL,	'2022-02-12 00:22:04',	'2022-02-12 00:22:04',	0),
(73632,	'aJ7wpXKbnxABFtr3HTBi',	'retarded10@retarded.io',	'$2y$10$4IhYvVsCxLtQgx.xA/wIbecfmnZSmwR/I.Nr1dM5z1E.0.0IEyRQa',	0,	0,	'$2y$10$3wMGbiIQ/TB.mKzjoymgpu6h03Sel5Q/1aJGCYPV3MSuhDUkwMYAS',	'2022-02-12 00:37:08',	NULL,	'2022-02-12 00:22:08',	'2022-02-12 00:22:08',	0),
(73633,	'M1F3qqWgM1iFLaGa5eSU',	'retarded11@retarded.io',	'$2y$10$RCyv9vkVRcmL7AaCwLwjD.Uf.5INXhIllxoNwzfbmgr46CX/S4iuK',	0,	0,	'$2y$10$k2EGVFb2MWFbic0G/hj4kefUtpZgMcgUONYFr8VUNjEcMiIpGkNwi',	'2022-02-12 00:37:12',	NULL,	'2022-02-12 00:22:12',	'2022-02-12 00:22:12',	0),
(73634,	't3uQ35OcDziJRn1pggsc',	'retarded12@retarded.io',	'$2y$10$8wrjAiyyfkSKWemKr.u/xu/14uhUHfDBv1hHWG5kTzfzRM3ddZf2.',	0,	0,	'$2y$10$47YqXi.DUBo/GxL3KVT6buVgJAP/zs5QDc.RNlg/twx5r/z.1Eh7W',	'2022-02-12 00:37:16',	NULL,	'2022-02-12 00:22:16',	'2022-02-12 00:22:16',	0),
(73635,	'9ZbxUaaqsG6C4aQoB0Bw',	'retarded13@retarded.io',	'$2y$10$E5lI6vxqRs0SRdKbHupuP.FFhcwtT2UhM6IRf5efS2Fcmrx3D0mCO',	0,	0,	'$2y$10$nT58MU8muvb5D0u10M61BeroEoQ6VuVHzOkQmELH7KYgqsltMHtfa',	'2022-02-12 00:37:20',	NULL,	'2022-02-12 00:22:20',	'2022-02-12 00:22:20',	0),
(73636,	'JfGvmJ8NR3lO5r92FqP6',	'retarded14@retarded.io',	'$2y$10$kSIhna2v.Rttl.p.nCxBM.Jat8exoN7qvUIfB0Ph4tMUt9tYmhU9m',	0,	0,	'$2y$10$bDmPC2RPdN9o6cRswYFIT.va30qQzqc/iFmVJpd0IMCUyH1mKZNuG',	'2022-02-12 00:37:24',	NULL,	'2022-02-12 00:22:24',	'2022-02-12 00:22:24',	0),
(73637,	'wamXu5PD2Teal0gFIjuO',	'retarded15@retarded.io',	'$2y$10$rRxcXWUdfSS1p4gEk4mFNOJ9wYSX3jIMwqQCr5lrk.S8mzbJr099S',	0,	0,	'$2y$10$s.ddab3SLQTRMI.Zjkb6V.D1moloawJbdDPqdrE6e1VDSiP.B9PNq',	'2022-02-12 00:37:28',	NULL,	'2022-02-12 00:22:28',	'2022-02-12 00:22:28',	0),
(73638,	'gG0jhuLNbo6o9gNfI8Nb',	'retarded16@retarded.io',	'$2y$10$jeud1A.gHluMavG8YWUEKuN2llBA9NqDpIcnaoqKy0t3OsmjYV24G',	0,	0,	'$2y$10$4Hj28wR7iNB8cYJw10Hv5e3.rcr.nOAMSfo.5Ajo4zaaLe47MLT6y',	'2022-02-12 00:38:46',	NULL,	'2022-02-12 00:23:46',	'2022-02-12 00:23:46',	0),
(73639,	'Gh5uZ3HIIZv2FWuUw9di',	'retarded17@retarded.io',	'$2y$10$oeK6osASN3DovvYCahJRce.LcrWW/06Uho3oE/V6l8DiOpaJ6o8sm',	0,	0,	'$2y$10$o5tyoCw20AP8M.wLJ6TYcuU/ArZECIQdamzznpvAJCVTX7eUfZ78.',	'2022-02-12 00:38:50',	NULL,	'2022-02-12 00:23:50',	'2022-02-12 00:23:50',	0),
(73640,	'cqE92PHGn0Rk2nnTzLrU',	'retarded18@retarded.io',	'$2y$10$LwcXZTGSWKKOvY9b6QNtQejcj3Gjv.nwKGNp0m9hw.HYyg0oBTc0W',	0,	0,	'$2y$10$W7PiG2PvX0C27xKk/lMMMe02xlLDNExJhlKfNu5DLpMOFREKTXG0C',	'2022-02-12 00:38:56',	NULL,	'2022-02-12 00:23:56',	'2022-02-12 00:23:56',	0),
(73641,	'Rc8NCgjloyK7Etv9M2FK',	'retarded19@retarded.io',	'$2y$10$6q2GS7IqIMP3fnLsJzxup..2mVzGj08qu1TovJCCsTYHTV/vuzr32',	0,	0,	'$2y$10$vLvqL9FfezO/x958phCB6.vyjs6.FTTtc/p2FOhIAH./MTJwc2PXy',	'2022-02-12 00:39:01',	NULL,	'2022-02-12 00:24:01',	'2022-02-12 00:24:01',	0),
(73642,	'aXd6tUutECAXSdfaYkzB',	'retarded20@retarded.io',	'$2y$10$yKMC3830ujjV5GERLdHYmumARmwE.HTfOs.2X4P8V/86pijOvWnY2',	0,	0,	'$2y$10$fD86ax9DFDR7ExGdKpha8uxinFbbO7.PVc1U97DtwGN.rIbqix0Wq',	'2022-02-12 00:39:06',	NULL,	'2022-02-12 00:24:06',	'2022-02-12 00:24:06',	0),
(73643,	'Hu6QffnMAtPywJlaIRfU',	'retarded21@retarded.io',	'$2y$10$eooff4Cax4L8vrMcUuTphOLX5eqCI8TqyItHNjTW78qxLWoVU8jLi',	0,	0,	'$2y$10$YmdQnmeZTFEJU/64vbPRKenCdTn/g7hzUlI2lZQPzKwRpbpC8Q8vu',	'2022-02-12 00:39:13',	NULL,	'2022-02-12 00:24:13',	'2022-02-12 00:24:13',	0),
(73644,	'cI5AHCfTxY3QjXKvzaJT',	'retarded22@retarded.io',	'$2y$10$OGyZ.2LSgILtAAfpGiEeYuKRdQbl/QV7KEJTogd.fBHSEuK4Lshny',	0,	0,	'$2y$10$pX/i4EWN0bgvcftau9JW1OOWHLAROcpDyVywjNKNmhjs468Jn3DDO',	'2022-02-12 00:39:17',	NULL,	'2022-02-12 00:24:17',	'2022-02-12 00:24:17',	0);

-- 2022-02-12 05:05:24
