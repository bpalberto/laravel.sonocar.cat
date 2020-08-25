-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Temps de generació: 24-08-2020 a les 13:41:41
-- Versió del servidor: 5.7.26
-- Versió de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `sonocar`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `accident` tinyint(1) NOT NULL,
  `alloyWheelSize` tinyint(3) UNSIGNED DEFAULT NULL,
  `availability_type_id` bigint(20) UNSIGNED NOT NULL,
  `deliveryDate` date DEFAULT NULL,
  `deliveryDays` smallint(5) UNSIGNED DEFAULT NULL,
  `body_color_id` bigint(20) UNSIGNED NOT NULL,
  `cabOrRental` tinyint(1) NOT NULL,
  `countryVersion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ES',
  `cylinderCapacity` mediumint(8) UNSIGNED DEFAULT NULL,
  `cylinders` tinyint(3) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `doors` tinyint(3) UNSIGNED NOT NULL,
  `drive_type_id` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `co2` double(3,1) NOT NULL,
  `efficiencyClass` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `emission_sticker_id` bigint(20) UNSIGNED NOT NULL,
  `particleFilter` tinyint(1) NOT NULL,
  `pollution_class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fuel_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `electricConsumptionCombined` double(3,1) DEFAULT NULL,
  `fuelConsumptionUrban` double(3,1) DEFAULT NULL,
  `fuelConsumptionHighway` double(3,1) DEFAULT NULL,
  `fuelConsumptionCombined` double(3,1) DEFAULT NULL,
  `autonomy` smallint(5) UNSIGNED DEFAULT NULL,
  `emptyWeight` smallint(5) UNSIGNED DEFAULT NULL,
  `firstRegistration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel_category_id` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gears` tinyint(4) NOT NULL,
  `crossReference` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offerReference` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicleIdentifier` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interior_color_id` bigint(20) UNSIGNED NOT NULL,
  `licencePlateNumber` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullServiceHistory` tinyint(1) NOT NULL,
  `make_id` bigint(20) UNSIGNED NOT NULL,
  `metallic` tinyint(1) DEFAULT NULL,
  `mileage` mediumint(9) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `modelVersion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nonSmoking` tinyint(1) NOT NULL,
  `powerKw` smallint(5) UNSIGNED NOT NULL,
  `previousOwners` tinyint(4) DEFAULT NULL,
  `currency` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'EUR',
  `priceType` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Public',
  `price` decimal(8,2) NOT NULL,
  `seats` tinyint(4) NOT NULL,
  `transmission_id` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upholstery` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_body_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_offer_type_id` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicleType` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vin` char(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warrantyMonths` tinyint(4) NOT NULL,
  `nextInspection` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastTechnicalService` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastCamBeltService` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sold` tinyint(1) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehicles_crossReference_unique` (`crossReference`) USING BTREE,
  KEY `vehicles_availability_type_id_foreign` (`availability_type_id`),
  KEY `vehicles_drive_type_id_foreign` (`drive_type_id`),
  KEY `vehicles_make_id_foreign` (`make_id`),
  KEY `vehicles_model_id_foreign` (`model_id`),
  KEY `vehicles_body_color_id_foreign` (`body_color_id`),
  KEY `vehicles_emission_sticker_id_foreign` (`emission_sticker_id`),
  KEY `vehicles_efficiencyclass_foreign` (`efficiencyClass`),
  KEY `vehicles_pollution_class_id_foreign` (`pollution_class_id`),
  KEY `vehicles_fuel_type_id_foreign` (`fuel_type_id`),
  KEY `vehicles_fuel_category_id_foreign` (`fuel_category_id`),
  KEY `vehicles_interior_color_id_foreign` (`interior_color_id`),
  KEY `vehicles_transmission_id_foreign` (`transmission_id`),
  KEY `vehicles_upholstery_foreign` (`upholstery`),
  KEY `vehicles_vehicle_body_id_foreign` (`vehicle_body_id`),
  KEY `vehicles_vehicle_offer_type_id_foreign` (`vehicle_offer_type_id`),
  KEY `vehicles_licenceplatenumber_index` (`licencePlateNumber`),
  KEY `vehicles_crossReference_index` (`crossReference`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `vehicles`
--

INSERT INTO `vehicles` (`id`, `accident`, `alloyWheelSize`, `availability_type_id`, `deliveryDate`, `deliveryDays`, `body_color_id`, `cabOrRental`, `countryVersion`, `cylinderCapacity`, `cylinders`, `description`, `doors`, `drive_type_id`, `co2`, `efficiencyClass`, `emission_sticker_id`, `particleFilter`, `pollution_class_id`, `fuel_type_id`, `electricConsumptionCombined`, `fuelConsumptionUrban`, `fuelConsumptionHighway`, `fuelConsumptionCombined`, `autonomy`, `emptyWeight`, `firstRegistration`, `fuel_category_id`, `gears`, `crossReference`, `offerReference`, `vehicleIdentifier`, `interior_color_id`, `licencePlateNumber`, `fullServiceHistory`, `make_id`, `metallic`, `mileage`, `model_id`, `modelVersion`, `nonSmoking`, `powerKw`, `previousOwners`, `currency`, `priceType`, `price`, `seats`, `transmission_id`, `upholstery`, `vehicle_body_id`, `vehicle_offer_type_id`, `vehicleType`, `vin`, `warrantyMonths`, `nextInspection`, `lastTechnicalService`, `lastCamBeltService`, `sold`, `visible`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 18, 1, NULL, NULL, 5, 0, 'ES', 1800, 4, NULL, 4, 'R', 99.9, 1, 4, 0, 6, 2, NULL, 12.1, 6.5, 9.3, 620, 1485, '11/2018', 'B', 5, 'SNCR202361256587', NULL, NULL, 1, '7521JFK', 1, 9, 1, 40251, 19155, 'Black Line 35', 1, 170, 1, 'EUR', 'Public', '145100.00', 5, 'A', 'FL', 3, 'U', 'C', NULL, 12, NULL, NULL, NULL, 0, 1, '2020-08-05 08:52:29', '2020-08-05 08:52:29', NULL),
(2, 1, 16, 3, NULL, 2, 10, 0, 'ES', 1600, 3, NULL, 3, 'F', 99.9, 1, 4, 0, 6, 2, NULL, 10.3, 5.8, 7.4, 740, 1310, '09.2015', 'B', 6, 'SNCR202361321410', NULL, NULL, 8, '1257HJR', 1, 13, 0, 58320, 1665, 'Coupé - 3-puertas – 2000', 1, 320, 1, 'EUR', 'Public', '20608.00', 5, 'M', 'AL', 6, 'U', 'C', NULL, 12, NULL, NULL, NULL, 0, 1, '2020-08-05 08:52:30', '2020-08-05 08:52:30', NULL),
(3, 0, 17, 2, '2020-09-15', NULL, 11, 0, 'ES', 2200, 4, NULL, 4, '4', 99.9, 1, 2, 1, 2, 7, NULL, 7.4, 5.4, 6.1, 860, 2325, '02-2003', 'D', 5, 'SNCR202361322078', NULL, NULL, 5, 'B7748SH', 0, 47, 0, 110542, 1859, 'AVANTGARDE', 0, 100, 2, 'EUR', 'Public', '2300.00', 5, 'M', 'CL', 5, 'O', 'C', NULL, 12, NULL, NULL, NULL, 0, 1, '2020-08-05 08:52:31', '2020-08-05 08:52:31', NULL),
(4, 0, 16, 1, NULL, NULL, 14, 0, 'ES', 1900, 4, NULL, 5, 'F', 99.9, 1, 3, 1, 5, 7, NULL, 6.8, 4.1, 5.7, 935, 1815, '07/2011', 'D', 6, 'SNCR202361334001', NULL, NULL, 6, '0935HFS', 1, 54, 0, 86425, 1916, 'GS Line', 1, 70, 1, 'EUR', 'Public', '35728.00', 5, 'M', 'PL', 12, 'U', 'C', NULL, 12, NULL, NULL, NULL, 0, 1, '2020-08-05 08:52:32', '2020-08-05 08:52:32', NULL),
(5, 0, NULL, 1, NULL, NULL, 5, 0, 'ES', NULL, NULL, 'Descripción de prueba', 5, '4', 52.0, 9, 5, 0, NULL, NULL, 14.0, NULL, NULL, NULL, NULL, 2510, '03/2018', 'E', 1, 'SNCR202361322322', NULL, NULL, 6, '0935-HFS', 1, 9, NULL, 52154, 20493, 'Elegance', 1, 74, 2, 'EUR', 'Public', '2514.00', 5, 'A', 'AL', 2, 'U', 'C', '0123456789ASDFGHJ', 12, '02/2022', '01/2018', '04/2017', 0, 1, '2020-08-23 22:29:39', '2020-08-23 22:29:39', NULL);

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_availability_type_id_foreign` FOREIGN KEY (`availability_type_id`) REFERENCES `availability_types` (`id`),
  ADD CONSTRAINT `vehicles_body_color_id_foreign` FOREIGN KEY (`body_color_id`) REFERENCES `body_colors` (`id`),
  ADD CONSTRAINT `vehicles_drive_type_id_foreign` FOREIGN KEY (`drive_type_id`) REFERENCES `drive_types` (`id`),
  ADD CONSTRAINT `vehicles_efficiencyclass_foreign` FOREIGN KEY (`efficiencyClass`) REFERENCES `efficiency_classes` (`id`),
  ADD CONSTRAINT `vehicles_emission_sticker_id_foreign` FOREIGN KEY (`emission_sticker_id`) REFERENCES `emissions_stickers` (`id`),
  ADD CONSTRAINT `vehicles_fuel_category_id_foreign` FOREIGN KEY (`fuel_category_id`) REFERENCES `fuel_categories` (`id`),
  ADD CONSTRAINT `vehicles_fuel_type_id_foreign` FOREIGN KEY (`fuel_type_id`) REFERENCES `fuel_types` (`id`),
  ADD CONSTRAINT `vehicles_interior_color_id_foreign` FOREIGN KEY (`interior_color_id`) REFERENCES `interior_colors` (`id`),
  ADD CONSTRAINT `vehicles_make_id_foreign` FOREIGN KEY (`make_id`) REFERENCES `makes` (`id`),
  ADD CONSTRAINT `vehicles_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`),
  ADD CONSTRAINT `vehicles_pollution_class_id_foreign` FOREIGN KEY (`pollution_class_id`) REFERENCES `pollution_class` (`id`),
  ADD CONSTRAINT `vehicles_transmission_id_foreign` FOREIGN KEY (`transmission_id`) REFERENCES `transmissions` (`id`),
  ADD CONSTRAINT `vehicles_upholstery_foreign` FOREIGN KEY (`upholstery`) REFERENCES `upholsteries` (`id`),
  ADD CONSTRAINT `vehicles_vehicle_body_id_foreign` FOREIGN KEY (`vehicle_body_id`) REFERENCES `vehicle_bodies` (`id`),
  ADD CONSTRAINT `vehicles_vehicle_offer_type_id_foreign` FOREIGN KEY (`vehicle_offer_type_id`) REFERENCES `vehicle_offer_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
