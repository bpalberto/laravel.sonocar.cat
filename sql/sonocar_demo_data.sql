-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-08-2020 a las 11:06:24
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DELETE FROM `image_vehicle`;
DELETE FROM `images`;
DELETE FROM `equipment_vehicle`;
DELETE FROM `vehicles`;

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `vehicles`
--

INSERT INTO `vehicles` (`id`, `accident`, `alloyWheelSize`, `availability_type_id`, `deliveryDate`, `deliveryDays`, `body_color_id`, `cabOrRental`, `countryVersion`,
    `cylinderCapacity`, `cylinders`, `description`, `doors`, `drive_type_id`, `co2`, `efficiencyClass`, `emission_sticker_id`, `particleFilter`, `pollution_class_id`,
    `fuel_type_id`, `electricConsumptionCombined`, `fuelConsumptionUrban`, `fuelConsumptionHighway`, `fuelConsumptionCombined`, `autonomy`, `emptyWeight`,
    `firstRegistration`, `fuel_category_id`, `gears`, `crossReference`, `offerReference`, `vehicleIdentifier`, `interior_color_id`, `licencePlateNumber`, `fullServiceHistory`,
    `make_id`, `metallic`, `mileage`, `model_id`, `modelVersion`, `nonSmoking`, `powerKw`, `previousOwners`, `currency`, `priceType`, `price`, `seats`, `transmission_id`,
    `upholstery`, `vehicle_body_id`, `vehicle_offer_type_id`, `vehicleType`, `vin`, `warrantyMonths`, `sold`, `visible`, `created_at`, `updated_at`, `deleted_at`) VALUES

(1, 0, 18, 1, NULL, NULL, 5, 0, 'ES', 1800, 4, NULL, 4, 'R', 160, 1, 4, 0, 6, 2, NULL, 12.1, 6.5, 9.3, 620, 1485, '11/2018', 'B', 5, NULL, NULL, NULL, 1, '7521JFK', 1, 9, 1, 40251, 19155, 'Black Line 35', 1, 170, 1, 'EUR', 'Public', '145100.00', 5, 'A', 'FL', 3, 'U', 'C', NULL, 12, 0, 1, '2020-08-05 08:52:29', '2020-08-05 08:52:29', NULL),
(2, 1, 16, 3, NULL, 2, 10, 0, 'ES', 1600, 3, NULL, 3, 'F', 112, 1, 4, 0, 6, 2, NULL, 10.3, 5.8, 7.4, 740, 1310, '09.2015', 'B', 6, NULL, NULL, NULL, 8, '1257HJR', 1, 13, 0, 58320, 1665, 'Coupé - 3-puertas – 2000', 1, 320, 1, 'EUR', 'Public', '20608.00', 5, 'M', 'AL', 6, 'U', 'C', NULL, 12, 0, 1, '2020-08-05 08:52:30', '2020-08-05 08:52:30', NULL),
(3, 0, 17, 2, '2020-09-15', NULL, 11, 0, 'ES', 2200, 4, NULL, 4, '4', 212, 1, 2, 1, 2, 7, NULL, 7.4, 5.4, 6.1, 860, 2325, '02-2003', 'D', 5, NULL, NULL, NULL, 5, 'B7748SH', 0, 47, 0, 110542, 1859, 'AVANTGARDE', 0, 100, 2, 'EUR', 'Public', '2300.00', 5, 'M', 'CL', 5, 'O', 'C', NULL, 12, 0, 1, '2020-08-05 08:52:31', '2020-08-05 08:52:31', NULL),
(4, 0, 16, 1, NULL, NULL, 14, 0, 'ES', 1900, 4, NULL, 5, 'F', 175, 1, 3, 1, 5, 7, NULL, 6.8, 4.1, 5.7, 935, 1815, '07/2011', 'D', 6, NULL, NULL, NULL, 6, '0935HFS', 1, 54, 0, 86425, 1916, 'GS Line', 1, 70, 1, 'EUR', 'Public', '35728.00', 5, 'M', 'PL', 12, 'U', 'C', NULL, 12, 0, 1, '2020-08-05 08:52:32', '2020-08-05 08:52:32', NULL);

--
-- Volcado de datos para la tabla `equipment_vehicle`
--

INSERT INTO `equipment_vehicle` (`vehicle_id`, `equipment_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 10),
(1, 15),
(1, 17),
(1, 19),
(1, 26),
(1, 38),
(1, 39);


--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `fileName`) VALUES
(1, 'https://tesla-cdn.thron.com/delivery/public/image/tesla/35d15221-0a5f-4dce-b484-a4db67b81dd2/bvlatuR/std/0x0/model-s@2x'),
(2, 'https://tesla-cdn.thron.com/delivery/public/image/tesla/c566e836-ea95-462a-99c0-cb8af3553a30/bvlatuR/std/0x0/model-s-performance'),
(3, 'https://tesla-cdn.thron.com/delivery/public/image/tesla/2558f32f-6c76-40b7-a66b-5d6d3c21ae99/bvlatuR/std/0x0/hero@2_1'),
(4, 'https://tesla-cdn.thron.com/delivery/public/image/tesla/e550df70-fc11-43f8-ac60-a84415738f91/bvlatuR/std/0x0/hepa_0'),
(5, 'https://tesla-cdn.thron.com/delivery/public/image/tesla/860ec2d8-9cf4-4763-9005-497acf721590/bvlatuR/std/0x0/ap-models-poster'),
(6, '/images/vehicles/bmw-z3-id2-0.jpg'),
(7, '/images/vehicles/bmw-z3-id2-1.jpg'),
(8, '/images/vehicles/bmw-z3-id2-2.jpg'),
(9, '/images/vehicles/bmw-z3-id2-3.jpg'),
(10, '/images/vehicles/bmw-z3-id2-4.jpg'),
(11, '/images/vehicles/bmw-z3-id2-5.jpg'),
(12, '/images/vehicles/bmw-z3-id2-6.jpg'),
(13, '/images/vehicles/bmw-z3-id2-7.jpg');


--
-- Volcado de datos para la tabla `image_vehicle`
--
INSERT INTO `image_vehicle` (`vehicle_id`, `image_id`) VALUES
(1,1),
(1,2),
(1,3),
(1,4),
(1,5),
(2,6),
(2,7),
(2,8),
(2,9),
(2,10),
(2,11),
(2,12);




COMMIT;
