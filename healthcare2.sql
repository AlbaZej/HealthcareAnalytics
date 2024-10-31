-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2024 at 07:43 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare2`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `sex` enum('Male','Female','Other') DEFAULT NULL,
  `age` int DEFAULT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `blood_pressure` varchar(20) DEFAULT NULL,
  `heart_rate` int DEFAULT NULL,
  `symptoms` text,
  `diagnosis` varchar(255) DEFAULT NULL,
  `prescription` text,
  `blood_type` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `medical_history` text,
  `allergies` text,
  `surgeries` text,
  `medications` text,
  `family_history` text,
  `insurance_provider` varchar(100) DEFAULT NULL,
  `insurance_policy_number` varchar(50) DEFAULT NULL,
  `emergency_contact_name` varchar(100) DEFAULT NULL,
  `emergency_contact_number` varchar(20) DEFAULT NULL,
  `glucose_levels` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `sex`, `age`, `height`, `weight`, `blood_pressure`, `heart_rate`, `symptoms`, `diagnosis`, `prescription`, `blood_type`, `contact_number`, `address`, `medical_history`, `allergies`, `surgeries`, `medications`, `family_history`, `insurance_provider`, `insurance_policy_number`, `emergency_contact_name`, `emergency_contact_number`, `glucose_levels`) VALUES
(5, 1, 'Female', 35, '120.00', '64.00', '120', 82, 'Headache, nausea', 'Flu', 'Tylenol', 'A+', '123-456-7890', '123 Main St, City, Country', 'Diabetes, Hypothyroidsm', 'None', 'None', 'Insulin, Letrox', 'None', 'Health Insurance Inc.', 'ABC123456', 'Jane Doe', '555-555-5555', '6.7'),
(6, 3, 'Female', 45, '160.00', '65.00', '110/70', 65, 'Headache, Dizziness', 'Migraine', 'Pain relievers', 'O+', '555-123-4567', '789 Oak St, City, Country', 'Previous concussion', 'Penicillin', 'None', 'Aspirin', 'Breast cancer', 'Medical Insurance Co.', 'XYZ789012', 'John Smith', '666-666-6666', '10');

-- --------------------------------------------------------

--
-- Table structure for table `patient_data`
--

CREATE TABLE `patient_data` (
  `id` int NOT NULL,
  `age` int DEFAULT NULL,
  `sex` enum('Male','Female','Other') DEFAULT NULL,
  `blood_type` varchar(5) DEFAULT NULL,
  `heart_rate` int DEFAULT NULL,
  `systolic_pressure` int DEFAULT NULL,
  `diastolic_pressure` int DEFAULT NULL,
  `fasting_glucose` decimal(5,2) DEFAULT NULL,
  `postprandial_glucose` decimal(5,2) DEFAULT NULL,
  `symptoms` text,
  `medical_history` text,
  `prescriptions` text,
  `activity_level` enum('Low','Moderate','High') DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `symptoms_sicknesses`
--

CREATE TABLE `symptoms_sicknesses` (
  `id` int NOT NULL,
  `symptom` varchar(255) NOT NULL,
  `sickness` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `symptoms_sicknesses`
--

INSERT INTO `symptoms_sicknesses` (`id`, `symptom`, `sickness`, `description`) VALUES
(1, 'Headache', 'Migraine', 'A headache usually on one side of the head accompanied by nausea and sensitivity to light and sound.'),
(2, 'Headache', 'Tension headache', 'A headache that feels like a tight band around the head, often caused by stress or muscle tension.'),
(3, 'Headache', 'Cluster headache', 'A severe headache that typically occurs on one side of the head, often around the eye, and can last for days.'),
(4, 'Fever', 'Influenza (Flu)', 'A contagious respiratory illness caused by influenza viruses, characterized by fever, cough, sore throat, body aches, and fatigue.'),
(5, 'Fever', 'Common cold', 'A viral infection of the upper respiratory tract, causing symptoms like runny or stuffy nose, sore throat, cough, and mild fever.'),
(6, 'Fever', 'COVID-19', 'A respiratory illness caused by the SARS-CoV-2 virus, characterized by symptoms like fever, cough, shortness of breath, fatigue, and loss of taste or smell.'),
(7, 'Cough', 'Bronchitis', 'An inflammation of the bronchial tubes, typically causing coughing, chest discomfort, and mucus production.'),
(8, 'Cough', 'Pneumonia', 'An infection that inflames air sacs in one or both lungs, causing cough, fever, chills, difficulty breathing, and chest pain.'),
(9, 'Cough', 'Asthma', 'A chronic condition characterized by inflammation and narrowing of the airways, leading to wheezing, coughing, chest tightness, and shortness of breath.'),
(10, 'Sore throat', 'Pharyngitis', 'Inflammation of the pharynx, causing sore throat, difficulty swallowing, and swollen glands.'),
(11, 'Sore throat', 'Strep throat', 'A bacterial infection of the throat, causing sore throat, fever, swollen tonsils, and sometimes white patches or pus.'),
(12, 'Sore throat', 'Common cold', 'A viral infection of the upper respiratory tract, causing symptoms like runny or stuffy nose, sore throat, cough, and mild fever.'),
(13, 'Fatigue', 'Chronic fatigue syndrome', 'A disorder characterized by extreme fatigue that doesn\'t improve with rest and is worsened by physical or mental activity.'),
(14, 'Fatigue', 'Anemia', 'A condition in which you lack enough healthy red blood cells to carry adequate oxygen to your body\'s tissues, leading to fatigue, weakness, and shortness of breath.'),
(15, 'Fatigue', 'Depression', 'A mood disorder causing persistent feelings of sadness, loss of interest, and low energy.'),
(16, 'Nausea', 'Gastroenteritis', 'Inflammation of the stomach and intestines, usually caused by a viral or bacterial infection, leading to nausea, vomiting, diarrhea, and abdominal pain.'),
(17, 'Nausea', 'Food poisoning', 'Illness caused by consuming contaminated food or drink, leading to nausea, vomiting, diarrhea, abdominal pain, and fever.'),
(18, 'Nausea', 'Migraine', 'A severe headache usually accompanied by nausea, vomiting, and sensitivity to light and sound.'),
(19, 'Vomiting', 'Gastroenteritis', 'Inflammation of the stomach and intestines, usually caused by a viral or bacterial infection, leading to nausea, vomiting, diarrhea, and abdominal pain.'),
(20, 'Vomiting', 'Food poisoning', 'Illness caused by consuming contaminated food or drink, leading to nausea, vomiting, diarrhea, abdominal pain, and fever.'),
(21, 'Vomiting', 'Appendicitis', 'Inflammation of the appendix, causing abdominal pain that typically starts near the belly button and moves to the lower right side, along with nausea, vomiting, and fever.'),
(22, 'Diarrhea', 'Gastroenteritis', 'Inflammation of the stomach and intestines, usually caused by a viral or bacterial infection, leading to nausea, vomiting, diarrhea, and abdominal pain.'),
(23, 'Diarrhea', 'Food poisoning', 'Illness caused by consuming contaminated food or drink, leading to nausea, vomiting, diarrhea, abdominal pain, and fever.'),
(24, 'Diarrhea', 'Irritable bowel syndrome', 'A common disorder affecting the large intestine, characterized by abdominal pain, bloating, and changes in bowel habits, including diarrhea or constipation.'),
(25, 'Dizziness', 'Vertigo', 'A sensation of spinning or dizziness, often caused by inner ear problems.'),
(26, 'Dizziness', 'Orthostatic hypotension', 'A sudden drop in blood pressure when standing up from a sitting or lying position, leading to dizziness or lightheadedness.'),
(27, 'Dizziness', 'Inner ear infection', 'Infection of the inner ear, causing dizziness, vertigo, nausea, and balance problems.'),
(28, 'Shortness of breath', 'Asthma', 'A chronic condition characterized by inflammation and narrowing of the airways, leading to wheezing, coughing, chest tightness, and shortness of breath.'),
(29, 'Shortness of breath', 'Chronic obstructive pulmonary disease (COPD)', 'A group of lung diseases that block airflow and make it difficult to breathe, including emphysema and chronic bronchitis.'),
(30, 'Shortness of breath', 'Pneumonia', 'An infection that inflames air sacs in one or both lungs, causing cough, fever, chills, difficulty breathing, and chest pain.'),
(31, 'Rash', 'Contact dermatitis', 'A red, itchy rash caused by direct contact with a substance or allergen, such as poison ivy, cosmetics, or nickel.'),
(32, 'Rash', 'Eczema', 'A chronic skin condition characterized by dry, itchy, inflamed skin, often occurring in patches.'),
(33, 'Rash', 'Psoriasis', 'A chronic autoimmune condition causing red, scaly patches on the skin, often on the elbows, knees, scalp, and lower back.'),
(34, 'Abdominal pain', 'Gastritis', 'Inflammation of the lining of the stomach, causing abdominal pain, nausea, vomiting, and indigestion.'),
(35, 'Abdominal pain', 'Appendicitis', 'Inflammation of the appendix, causing abdominal pain that typically starts near the belly button and moves to the lower right side, along with nausea, vomiting, and fever.'),
(36, 'Abdominal pain', 'Gallstones', 'Hardened deposits in the gallbladder, causing abdominal pain, nausea, vomiting, and jaundice.'),
(37, 'Muscle pain', 'Muscle strain', 'Overstretching or tearing of muscle fibers, causing pain, swelling, and limited range of motion.'),
(38, 'Muscle pain', 'Fibromyalgia', 'A disorder characterized by widespread musculoskeletal pain, fatigue, and tenderness in localized areas.'),
(39, 'Muscle pain', 'Influenza (Flu)', 'A contagious respiratory illness caused by influenza viruses, characterized by fever, cough, sore throat, body aches, and fatigue.'),
(40, 'Joint pain', 'Osteoarthritis', 'A degenerative joint disease causing pain, stiffness, and swelling in the joints, especially with movement.'),
(41, 'Joint pain', 'Rheumatoid arthritis', 'An autoimmune disorder causing inflammation and pain in the joints, often affecting the hands and feet symmetrically.'),
(42, 'Joint pain', 'Gout', 'A type of arthritis characterized by sudden, severe attacks of pain, redness, and swelling in the joints, often the big toe.'),
(43, 'Back pain', 'Muscle strain', 'Overstretching or tearing of muscle fibers in the back, causing pain, stiffness, and limited range of motion.'),
(44, 'Back pain', 'Herniated disc', 'A condition in which the gel-like center of a spinal disc protrudes through a tear in the outer layer, pressing on nearby nerves and causing pain, numbness, or weakness.'),
(45, 'Back pain', 'Sciatica', 'A condition characterized by pain that radiates along the path of the sciatic nerve, typically down the back of the leg.'),
(46, 'Chest pain', 'Angina', 'Chest pain or discomfort caused by reduced blood flow to the heart muscle, often due to coronary artery disease.'),
(47, 'Chest pain', 'Heart attack', 'A sudden blockage of blood flow to the heart muscle, causing chest pain, shortness of breath, nausea, and sweating.'),
(48, 'Chest pain', 'Pleurisy', 'Inflammation of the lining of the lungs and chest cavity, causing sharp chest pain that worsens with breathing or coughing.'),
(49, 'Headache', 'Brain tumor', 'A tumor or abnormal growth in the brain, causing persistent headaches, nausea, vomiting, vision problems, and seizures.'),
(50, 'Headache', 'Meningitis', 'Inflammation of the membranes surrounding the brain and spinal cord, causing severe headaches, fever, stiff neck, and sensitivity to light.'),
(51, 'Headache', 'Brain aneurysm', 'A weak, bulging area in the wall of an artery in the brain, which can rupture and cause a sudden, severe headache, nausea, vomiting, and loss of consciousness.'),
(52, 'Fatigue', 'Sleep apnea', 'A sleep disorder characterized by pauses in breathing or shallow breaths during sleep, leading to poor sleep quality and daytime fatigue.'),
(53, 'Fatigue', 'Hypothyroidism', 'A condition in which the thyroid gland doesn\'t produce enough thyroid hormone, leading to fatigue, weight gain, cold intolerance, and depression.'),
(54, 'Fatigue', 'Anemia', 'A condition in which you lack enough healthy red blood cells to carry adequate oxygen to your body\'s tissues, leading to fatigue, weakness, and shortness of breath.'),
(55, 'Nausea', 'Pregnancy', 'Nausea and vomiting commonly experienced during early pregnancy, often referred to as morning sickness.'),
(56, 'Nausea', 'Migraine', 'A severe headache usually accompanied by nausea, vomiting, and sensitivity to light and sound.'),
(57, 'Nausea', 'Motion sickness', 'Nausea and vomiting triggered by motion, such as traveling by car, boat, or plane.'),
(58, 'Vomiting', 'Morning sickness', 'Nausea and vomiting commonly experienced during early pregnancy, often referred to as morning sickness.'),
(59, 'Vomiting', 'Gastroenteritis', 'Inflammation of the stomach and intestines, usually caused by a viral or bacterial infection, leading to nausea, vomiting, diarrhea, and abdominal pain.'),
(60, 'Vomiting', 'Appendicitis', 'Inflammation of the appendix, causing abdominal pain that typically starts near the belly button and moves to the lower right side, along with nausea, vomiting, and fever.'),
(61, 'Diarrhea', 'Gastroenteritis', 'Inflammation of the stomach and intestines, usually caused by a viral or bacterial infection, leading to nausea, vomiting, diarrhea, and abdominal pain.'),
(62, 'Diarrhea', 'Food poisoning', 'Illness caused by consuming contaminated food or drink, leading to nausea, vomiting, diarrhea, abdominal pain, and fever.'),
(63, 'Diarrhea', 'Irritable bowel syndrome', 'A common disorder affecting the large intestine, characterized by abdominal pain, bloating, and changes in bowel habits, including diarrhea or constipation.'),
(64, 'Dizziness', 'Orthostatic hypotension', 'A sudden drop in blood pressure when standing up from a sitting or lying position, leading to dizziness or lightheadedness.'),
(65, 'Dizziness', 'Inner ear infection', 'Infection of the inner ear, causing dizziness, vertigo, nausea, and balance problems.'),
(66, 'Dizziness', 'Meniere\'s disease', 'A disorder of the inner ear that causes episodes of vertigo, hearing loss, tinnitus, and a feeling of fullness or pressure in the ear.'),
(67, 'Shortness of breath', 'Asthma', 'A chronic condition characterized by inflammation and narrowing of the airways, leading to wheezing, coughing, chest tightness, and shortness of breath.'),
(68, 'Shortness of breath', 'Chronic obstructive pulmonary disease (COPD)', 'A group of lung diseases that block airflow and make it difficult to breathe, including emphysema and chronic bronchitis.'),
(69, 'Shortness of breath', 'Pneumonia', 'An infection that inflames air sacs in one or both lungs, causing cough, fever, chills, difficulty breathing, and chest pain.'),
(70, 'Rash', 'Contact dermatitis', 'A red, itchy rash caused by direct contact with a substance or allergen, such as poison ivy, cosmetics, or nickel.'),
(71, 'Rash', 'Eczema', 'A chronic skin condition characterized by dry, itchy, inflamed skin, often occurring in patches.'),
(72, 'Rash', 'Psoriasis', 'A chronic autoimmune condition causing red, scaly patches on the skin, often on the elbows, knees, scalp, and lower back.'),
(73, 'Abdominal pain', 'Gastritis', 'Inflammation of the lining of the stomach, causing abdominal pain, nausea, vomiting, and indigestion.'),
(74, 'Abdominal pain', 'Appendicitis', 'Inflammation of the appendix, causing abdominal pain that typically starts near the belly button and moves to the lower right side, along with nausea, vomiting, and fever.'),
(75, 'Abdominal pain', 'Gallstones', 'Hardened deposits in the gallbladder, causing abdominal pain, nausea, vomiting, and jaundice.'),
(76, 'Muscle pain', 'Muscle strain', 'Overstretching or tearing of muscle fibers, causing pain, swelling, and limited range of motion.'),
(77, 'Muscle pain', 'Fibromyalgia', 'A disorder characterized by widespread musculoskeletal pain, fatigue, and tenderness in localized areas.'),
(78, 'Muscle pain', 'Influenza (Flu)', 'A contagious respiratory illness caused by influenza viruses, characterized by fever, cough, sore throat, body aches, and fatigue.'),
(79, 'Joint pain', 'Osteoarthritis', 'A degenerative joint disease causing pain, stiffness, and swelling in the joints, especially with movement.'),
(80, 'Joint pain', 'Rheumatoid arthritis', 'An autoimmune disorder causing inflammation and pain in the joints, often affecting the hands and feet symmetrically.'),
(81, 'Joint pain', 'Gout', 'A type of arthritis characterized by sudden, severe attacks of pain, redness, and swelling in the joints, often the big toe.'),
(82, 'Back pain', 'Muscle strain', 'Overstretching or tearing of muscle fibers in the back, causing pain, stiffness, and limited range of motion.'),
(83, 'Back pain', 'Herniated disc', 'A condition in which the gel-like center of a spinal disc protrudes through a tear in the outer layer, pressing on nearby nerves and causing pain, numbness, or weakness.'),
(84, 'Back pain', 'Sciatica', 'A condition characterized by pain that radiates along the path of the sciatic nerve, typically down the back of the leg.'),
(85, 'Chest pain', 'Angina', 'Chest pain or discomfort caused by reduced blood flow to the heart muscle, often due to coronary artery disease.'),
(86, 'Chest pain', 'Heart attack', 'A sudden blockage of blood flow to the heart muscle, causing chest pain, shortness of breath, nausea, and sweating.'),
(87, 'Chest pain', 'Pleurisy', 'Inflammation of the lining of the lungs and chest cavity, causing sharp chest pain that worsens with breathing or coughing.'),
(88, 'Headache', 'Brain tumor', 'A tumor or abnormal growth in the brain, causing persistent headaches, nausea, vomiting, vision problems, and seizures.'),
(89, 'Headache', 'Meningitis', 'Inflammation of the membranes surrounding the brain and spinal cord, causing severe headaches, fever, stiff neck, and sensitivity to light.'),
(90, 'Headache', 'Brain aneurysm', 'A weak, bulging area in the wall of an artery in the brain, which can rupture and cause a sudden, severe headache, nausea, vomiting, and loss of consciousness.'),
(91, 'Fatigue', 'Sleep apnea', 'A sleep disorder characterized by pauses in breathing or shallow breaths during sleep, leading to poor sleep quality and daytime fatigue.'),
(92, 'Fatigue', 'Hypothyroidism', 'A condition in which the thyroid gland doesn\'t produce enough thyroid hormone, leading to fatigue, weight gain, cold intolerance, and depression.'),
(93, 'Fatigue', 'Anemia', 'A condition in which you lack enough healthy red blood cells to carry adequate oxygen to your body\'s tissues, leading to fatigue, weakness, and shortness of breath.'),
(94, 'Nausea', 'Pregnancy', 'Nausea and vomiting commonly experienced during early pregnancy, often referred to as morning sickness.'),
(95, 'Nausea', 'Migraine', 'A severe headache usually accompanied by nausea, vomiting, and sensitivity to light and sound.'),
(96, 'Nausea', 'Motion sickness', 'Nausea and vomiting triggered by motion, such as traveling by car, boat, or plane.'),
(97, 'Vomiting', 'Morning sickness', 'Nausea and vomiting commonly experienced during early pregnancy, often referred to as morning sickness.'),
(98, 'Vomiting', 'Gastroenteritis', 'Inflammation of the stomach and intestines, usually caused by a viral or bacterial infection, leading to nausea, vomiting, diarrhea, and abdominal pain.'),
(99, 'Vomiting', 'Appendicitis', 'Inflammation of the appendix, causing abdominal pain that typically starts near the belly button and moves to the lower right side, along with nausea, vomiting, and fever.'),
(100, 'Diarrhea', 'Gastroenteritis', 'Inflammation of the stomach and intestines, usually caused by a viral or bacterial infection, leading to nausea, vomiting, diarrhea, and abdominal pain.'),
(101, 'Diarrhea', 'Food poisoning', 'Illness caused by consuming contaminated food or drink, leading to nausea, vomiting, diarrhea, abdominal pain, and fever.'),
(102, 'Diarrhea', 'Irritable bowel syndrome', 'A common disorder affecting the large intestine, characterized by abdominal pain, bloating, and changes in bowel habits, including diarrhea or constipation.'),
(103, 'Dizziness', 'Orthostatic hypotension', 'A sudden drop in blood pressure when standing up from a sitting or lying position, leading to dizziness or lightheadedness.'),
(104, 'Dizziness', 'Inner ear infection', 'Infection of the inner ear, causing dizziness, vertigo, nausea, and balance problems.'),
(105, 'Dizziness', 'Meniere\'s disease', 'A disorder of the inner ear that causes episodes of vertigo, hearing loss, tinnitus, and a feeling of fullness or pressure in the ear.'),
(106, 'Shortness of breath', 'Asthma', 'A chronic condition characterized by inflammation and narrowing of the airways, leading to wheezing, coughing, chest tightness, and shortness of breath.'),
(107, 'Shortness of breath', 'Chronic obstructive pulmonary disease (COPD)', 'A group of lung diseases that block airflow and make it difficult to breathe, including emphysema and chronic bronchitis.'),
(108, 'Shortness of breath', 'Pneumonia', 'An infection that inflames air sacs in one or both lungs, causing cough, fever, chills, difficulty breathing, and chest pain.'),
(109, 'Rash', 'Contact dermatitis', 'A red, itchy rash caused by direct contact with a substance or allergen, such as poison ivy, cosmetics, or nickel.'),
(110, 'Rash', 'Eczema', 'A chronic skin condition characterized by dry, itchy, inflamed skin, often occurring in patches.'),
(111, 'Rash', 'Psoriasis', 'A chronic autoimmune condition causing red, scaly patches on the skin, often on the elbows, knees, scalp, and lower back.'),
(112, 'Abdominal pain', 'Gastritis', 'Inflammation of the lining of the stomach, causing abdominal pain, nausea, vomiting, and indigestion.'),
(113, 'Abdominal pain', 'Appendicitis', 'Inflammation of the appendix, causing abdominal pain that typically starts near the belly button and moves to the lower right side, along with nausea, vomiting, and fever.'),
(114, 'Abdominal pain', 'Gallstones', 'Hardened deposits in the gallbladder, causing abdominal pain, nausea, vomiting, and jaundice.'),
(115, 'Muscle pain', 'Muscle strain', 'Overstretching or tearing of muscle fibers, causing pain, swelling, and limited range of motion.'),
(116, 'Muscle pain', 'Fibromyalgia', 'A disorder characterized by widespread musculoskeletal pain, fatigue, and tenderness in localized areas.'),
(117, 'Muscle pain', 'Influenza (Flu)', 'A contagious respiratory illness caused by influenza viruses, characterized by fever, cough, sore throat, body aches, and fatigue.'),
(118, 'Joint pain', 'Osteoarthritis', 'A degenerative joint disease causing pain, stiffness, and swelling in the joints, especially with movement.'),
(119, 'Joint pain', 'Rheumatoid arthritis', 'An autoimmune disorder causing inflammation and pain in the joints, often affecting the hands and feet symmetrically.'),
(120, 'Joint pain', 'Gout', 'A type of arthritis characterized by sudden, severe attacks of pain, redness, and swelling in the joints, often the big toe.'),
(121, 'Back pain', 'Muscle strain', 'Overstretching or tearing of muscle fibers in the back, causing pain, stiffness, and limited range of motion.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `birthdate`, `email`, `password`) VALUES
(1, 'Albana Zejnullahi', '2000-02-03', 'albana@hotmail.com', '$2y$10$.NJwHEeOcf58lcA5zztjgOiRR5zyACbzWWsvz1T6Eo4DdVi2UWgq6'),
(3, 'jfjfjffj', '2000-01-02', 'test123@hotmail.com', '$2y$10$KzaV9VQ6tY.1M8nza.GL4OwypaFwxKi0elksFAtUkOIVnwr1TUwoO'),
(4, 'test2', '2000-02-02', 'test2@hotmail.com', '$2y$10$ItotO/GQEWJWFhzw8cKnkeoKsqd93zCM/TfdISG14KuBwecOlVGQe'),
(5, 'test2', '2000-02-02', 'test2@hotmail.com', '$2y$10$YjSpwU5dfiHccdyXAH.MIe.6Zt3buGi/fX62IyT/P/FUUW.mGPExm'),
(6, 'djdjdj', '2000-02-02', 'ajajajaj@hotmail.com', '$2y$10$4gfqho1eLC.IeFC8fEVaXuFAlfZY1Qb7kqGoeZmuIaUNXUZ44alc.'),
(7, 'jfjfjfjffj', '2000-02-02', 'kssksks@hotmail.com', '$2y$10$Su54AInpksR6wlkBFZig/eRzITPXfgoJM3OkvxbZHfO4WoT9PIrq6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `patient_data`
--
ALTER TABLE `patient_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `symptoms_sicknesses`
--
ALTER TABLE `symptoms_sicknesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient_data`
--
ALTER TABLE `patient_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `symptoms_sicknesses`
--
ALTER TABLE `symptoms_sicknesses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `patient_data`
--
ALTER TABLE `patient_data`
  ADD CONSTRAINT `patient_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
