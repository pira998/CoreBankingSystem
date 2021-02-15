-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2021 at 08:12 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_number` int(11) NOT NULL,
  `open_date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `balance` double NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_number`, `open_date`, `customer_id`, `balance`, `branch_id`) VALUES
(1, '2021-02-12', 1, 4559, 1),
(2, '2021-02-12', 1, 54353, 2),
(3, '2021-02-12', 2, 4559, 1);

-- --------------------------------------------------------

--
-- Table structure for table `atms`
--

CREATE TABLE `atms` (
  `atm_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `money` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atms`
--

INSERT INTO `atms` (`atm_id`, `branch_id`, `money`) VALUES
(1, 1, 45000),
(2, 2, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `atm_withdraws`
--

CREATE TABLE `atm_withdraws` (
  `atm_withdraw_id` int(11) NOT NULL,
  `account_number` int(11) NOT NULL,
  `atm_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `withdraw_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atm_withdraws`
--

INSERT INTO `atm_withdraws` (`atm_withdraw_id`, `account_number`, `atm_id`, `amount`, `withdraw_date`) VALUES
(1, 2, 1, 2000, '2021-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `total_money` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `name`, `address`, `total_money`) VALUES
(1, 'Jaffna', 'Jaffna', 40000),
(2, 'Colombo', 'colombo', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `business_loans`
--

CREATE TABLE `business_loans` (
  `business_loan_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_loans`
--

INSERT INTO `business_loans` (`business_loan_id`, `loan_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `checking_accounts`
--

CREATE TABLE `checking_accounts` (
  `checking_account_number` int(11) NOT NULL,
  `account_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checking_accounts`
--

INSERT INTO `checking_accounts` (`checking_account_number`, `account_number`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dob` char(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `dob`, `address`, `phone_number`) VALUES
(1, 'Vasanth', '12/12/1998', '730,K.K.S road, jaffna', 769618638),
(2, 'Sarangan', '12/12/1998', '730,K.K.S road,nallur', 769618638),
(3, 'piraveen', '12/12/1998', '730,K.K.S road', 769618638),
(5, 'thirumagal', '12/12/1998', '730,K.K.S road', 769618638),
(6, 'shanmugam', '12/12/1998', '730,K.K.S road', 769618638),
(7, 'sivakumar', '12/12/1998', '730,K.K.S road', 769618638),
(8, 'siva', '12/12/1998', '730,K.K.S road', 769618638),
(10, 'piraveen sivakumar', '11/11/1998', '730,K.K.S road', 769618638);

-- --------------------------------------------------------

--
-- Table structure for table `deposit_entries`
--

CREATE TABLE `deposit_entries` (
  `deposit_id` int(11) NOT NULL,
  `deposite_date` date NOT NULL,
  `account_number` int(11) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit_entries`
--

INSERT INTO `deposit_entries` (`deposit_id`, `deposite_date`, `account_number`, `amount`) VALUES
(1, '2021-02-12', 1, 2000),
(2, '2021-02-11', 3, 300);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `nic` int(12) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `joined_date` date NOT NULL,
  `branch_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `nic`, `name`, `address`, `phone_number`, `joined_date`, `branch_id`, `role_id`, `username`, `password`) VALUES
(1, 982002311, 'Shanmugabavan', 'Inuvil', '0773232332', '2021-02-12', 1, 1, 'Shanmu', '$2y$10$t21tBr.3v83gCmfBcNX9Q.MnmiJyd.UqYnm2Si/NoZvngP93F/nY.'),
(2, 984002311, 'Piraveen', 'Thadatheru', '0779832332', '2021-02-11', 2, 2, 'Pira', '$2y$10$t21tBr.3v83gCmfBcNX9Q.MnmiJyd.UqYnm2Si/NoZvngP93F/nY.'),
(3, 343434, 'Thirumagal', 'no 3 , jsfsf ,sfasdfas', '0775632332', '2021-02-02', 1, 1, 'Thiru', '$2y$10$t21tBr.3v83gCmfBcNX9Q.MnmiJyd.UqYnm2Si/NoZvngP93F/nY.');

-- --------------------------------------------------------

--
-- Table structure for table `fixed_deposits`
--

CREATE TABLE `fixed_deposits` (
  `fixed_deposit_id` int(11) NOT NULL,
  `saving_account_number` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `open_date` date NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fixed_deposits`
--

INSERT INTO `fixed_deposits` (`fixed_deposit_id`, `saving_account_number`, `plan_id`, `open_date`, `amount`) VALUES
(1, 1, 14, '2021-02-12', 2000),
(2, 2, 15, '2021-02-02', 2343);

-- --------------------------------------------------------

--
-- Table structure for table `fixed_deposit_plans`
--

CREATE TABLE `fixed_deposit_plans` (
  `plan_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fixed_deposit_plans`
--

INSERT INTO `fixed_deposit_plans` (`plan_id`, `duration`, `percentage`) VALUES
(14, 6, 13),
(15, 12, 14),
(16, 36, 15);

-- --------------------------------------------------------

--
-- Table structure for table `individual_customers`
--

CREATE TABLE `individual_customers` (
  `individual_customer_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `nic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `individual_customers`
--

INSERT INTO `individual_customers` (`individual_customer_id`, `customer_id`, `nic`) VALUES
(1, 1, 982002311),
(3, 6, 982831660),
(4, 8, 45555554),
(8, 3, 343434421),
(9, 5, 545451);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `loan_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `requested_type` varchar(20) NOT NULL,
  `balance` double NOT NULL,
  `duration` int(11) NOT NULL,
  `month_need_to_pay` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `saving_account_number` int(11) NOT NULL,
  `last_payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`loan_id`, `amount`, `requested_type`, `balance`, `duration`, `month_need_to_pay`, `payment_date`, `saving_account_number`, `last_payment_date`) VALUES
(1, 2000, 'RequestOnline', 4559, 6, 3, '2021-02-09', 2, '2021-02-02'),
(2, 432, 'LoanTakeAssistant', 4324, 3, 3, '2021-02-09', 2, '2021-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `loan_paid_entries`
--

CREATE TABLE `loan_paid_entries` (
  `loan_paid_entry_id` int(11) NOT NULL,
  `paid_amount` double NOT NULL,
  `loan_id` int(11) NOT NULL,
  `paid_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_paid_entries`
--

INSERT INTO `loan_paid_entries` (`loan_paid_entry_id`, `paid_amount`, `loan_id`, `paid_date`) VALUES
(1, 2000, 1, '2021-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `loan_requests_online`
--

CREATE TABLE `loan_requests_online` (
  `requested_type_id` varchar(20) NOT NULL,
  `online_account_id` int(11) NOT NULL,
  `fixed_deposit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_requests_online`
--

INSERT INTO `loan_requests_online` (`requested_type_id`, `online_account_id`, `fixed_deposit_id`) VALUES
('OR 1', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `loan_take_assistants`
--

CREATE TABLE `loan_take_assistants` (
  `requested_type_id` varchar(20) NOT NULL,
  `checked_by` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `approved_by` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_take_assistants`
--

INSERT INTO `loan_take_assistants` (`requested_type_id`, `checked_by`, `customer_id`, `approved_by`, `status`) VALUES
('LTA 1', 2, 1, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `online_accounts`
--

CREATE TABLE `online_accounts` (
  `online_account_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `open_date` varchar(10) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_accounts`
--

INSERT INTO `online_accounts` (`online_account_id`, `username`, `open_date`, `customer_id`, `password`) VALUES
(1, 'Alex', '01-02-2021', 1, '$2y$10$t21tBr.3v83gCmfBcNX9Q.MnmiJyd.UqYnm2Si/NoZvngP93F/nY.'),
(2, 'George', '10-02-2021', 2, '$2y$10$t21tBr.3v83gCmfBcNX9Q.MnmiJyd.UqYnm2Si/NoZvngP93F/nY.'),
(3, '180476L', '14-02-2021', 3, '$2y$10$t21tBr.3v83gCmfBcNX9Q.MnmiJyd.UqYnm2Si/NoZvngP93F/nY.');

-- --------------------------------------------------------

--
-- Table structure for table `online_fixed_deposits`
--

CREATE TABLE `online_fixed_deposits` (
  `id` int(11) NOT NULL,
  `fixed_deposit_id` int(11) NOT NULL,
  `online_account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_fixed_deposits`
--

INSERT INTO `online_fixed_deposits` (`id`, `fixed_deposit_id`, `online_account_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `online_transactions`
--

CREATE TABLE `online_transactions` (
  `online_trans_id` int(11) NOT NULL,
  `from_online_account_id` int(11) NOT NULL,
  `trans_type_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `transaction_date` date NOT NULL,
  `description` varchar(50) NOT NULL,
  `to_account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_transactions`
--

INSERT INTO `online_transactions` (`online_trans_id`, `from_online_account_id`, `trans_type_id`, `amount`, `transaction_date`, `description`, `to_account_id`) VALUES
(1, 1, 1, 2000, '2021-02-03', 'dafsdfsd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `organization_customers`
--

CREATE TABLE `organization_customers` (
  `organization_customer_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization_customers`
--

INSERT INTO `organization_customers` (`organization_customer_id`, `customer_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_loans`
--

CREATE TABLE `personal_loans` (
  `personal_loan_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_loans`
--

INSERT INTO `personal_loans` (`personal_loan_id`, `loan_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`) VALUES
(1, 'manager'),
(2, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `saving_accounts`
--

CREATE TABLE `saving_accounts` (
  `saving_account_number` int(11) NOT NULL,
  `account_number` int(11) NOT NULL,
  `saving_interest_id` int(11) NOT NULL,
  `withdraw_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saving_accounts`
--

INSERT INTO `saving_accounts` (`saving_account_number`, `account_number`, `saving_interest_id`, `withdraw_count`) VALUES
(1, 1, 3, 5),
(2, 2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `saving_interests`
--

CREATE TABLE `saving_interests` (
  `saving_interest_id` int(11) NOT NULL,
  `interest_type` varchar(20) NOT NULL,
  `percentage` int(11) NOT NULL,
  `minimum_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saving_interests`
--

INSERT INTO `saving_interests` (`saving_interest_id`, `interest_type`, `percentage`, `minimum_amount`) VALUES
(1, 'children', 12, 0),
(2, 'teen', 11, 500),
(3, 'adult', 10, 1000),
(4, 'senior', 13, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_types`
--

CREATE TABLE `transaction_types` (
  `trans_type_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_types`
--

INSERT INTO `transaction_types` (`trans_type_id`, `type`) VALUES
(1, 'BanktoBank');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_number`),
  ADD KEY `CustomerID` (`customer_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `atms`
--
ALTER TABLE `atms`
  ADD PRIMARY KEY (`atm_id`),
  ADD KEY `BranchID` (`branch_id`);

--
-- Indexes for table `atm_withdraws`
--
ALTER TABLE `atm_withdraws`
  ADD PRIMARY KEY (`atm_withdraw_id`),
  ADD KEY `AccountNumber` (`account_number`),
  ADD KEY `ATMID` (`atm_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `business_loans`
--
ALTER TABLE `business_loans`
  ADD PRIMARY KEY (`business_loan_id`),
  ADD KEY `LoanID` (`loan_id`);

--
-- Indexes for table `checking_accounts`
--
ALTER TABLE `checking_accounts`
  ADD PRIMARY KEY (`checking_account_number`),
  ADD KEY `AccountNumber` (`account_number`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `deposit_entries`
--
ALTER TABLE `deposit_entries`
  ADD PRIMARY KEY (`deposit_id`),
  ADD KEY `AccountNumber` (`account_number`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `NIC` (`nic`),
  ADD KEY `BranchID` (`branch_id`),
  ADD KEY `RoleID` (`role_id`);

--
-- Indexes for table `fixed_deposits`
--
ALTER TABLE `fixed_deposits`
  ADD PRIMARY KEY (`fixed_deposit_id`),
  ADD KEY `SavAccountNumber` (`saving_account_number`),
  ADD KEY `PlanID` (`plan_id`);

--
-- Indexes for table `fixed_deposit_plans`
--
ALTER TABLE `fixed_deposit_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `individual_customers`
--
ALTER TABLE `individual_customers`
  ADD PRIMARY KEY (`individual_customer_id`),
  ADD KEY `CustomerID` (`customer_id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loan_id`),
  ADD KEY `SavingAccountNumber` (`saving_account_number`);

--
-- Indexes for table `loan_paid_entries`
--
ALTER TABLE `loan_paid_entries`
  ADD PRIMARY KEY (`loan_paid_entry_id`),
  ADD KEY `LoanID` (`loan_id`);

--
-- Indexes for table `loan_requests_online`
--
ALTER TABLE `loan_requests_online`
  ADD PRIMARY KEY (`requested_type_id`),
  ADD KEY `OnlineAccountID` (`online_account_id`),
  ADD KEY `FixedDepositID` (`fixed_deposit_id`);

--
-- Indexes for table `loan_take_assistants`
--
ALTER TABLE `loan_take_assistants`
  ADD PRIMARY KEY (`requested_type_id`),
  ADD KEY `ApprovedBy` (`approved_by`),
  ADD KEY `CustomerID` (`customer_id`),
  ADD KEY `CheckedBy` (`checked_by`);

--
-- Indexes for table `online_accounts`
--
ALTER TABLE `online_accounts`
  ADD PRIMARY KEY (`online_account_id`),
  ADD KEY `CustomerID` (`customer_id`);

--
-- Indexes for table `online_fixed_deposits`
--
ALTER TABLE `online_fixed_deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fixed_deposit_id` (`fixed_deposit_id`),
  ADD KEY `online_account_id` (`online_account_id`);

--
-- Indexes for table `online_transactions`
--
ALTER TABLE `online_transactions`
  ADD PRIMARY KEY (`online_trans_id`),
  ADD KEY `FromOnlineAccountID` (`from_online_account_id`),
  ADD KEY `transTypeID` (`trans_type_id`),
  ADD KEY `ToAccountID` (`to_account_id`);

--
-- Indexes for table `organization_customers`
--
ALTER TABLE `organization_customers`
  ADD PRIMARY KEY (`organization_customer_id`),
  ADD KEY `CustomerID` (`customer_id`);

--
-- Indexes for table `personal_loans`
--
ALTER TABLE `personal_loans`
  ADD PRIMARY KEY (`personal_loan_id`),
  ADD KEY `LoanID` (`loan_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `saving_accounts`
--
ALTER TABLE `saving_accounts`
  ADD PRIMARY KEY (`saving_account_number`),
  ADD KEY `AccountNumber` (`account_number`),
  ADD KEY `SavingInterestID` (`saving_interest_id`);

--
-- Indexes for table `saving_interests`
--
ALTER TABLE `saving_interests`
  ADD PRIMARY KEY (`saving_interest_id`);

--
-- Indexes for table `transaction_types`
--
ALTER TABLE `transaction_types`
  ADD PRIMARY KEY (`trans_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `atms`
--
ALTER TABLE `atms`
  MODIFY `atm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `atm_withdraws`
--
ALTER TABLE `atm_withdraws`
  MODIFY `atm_withdraw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_loans`
--
ALTER TABLE `business_loans`
  MODIFY `business_loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checking_accounts`
--
ALTER TABLE `checking_accounts`
  MODIFY `checking_account_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `deposit_entries`
--
ALTER TABLE `deposit_entries`
  MODIFY `deposit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fixed_deposits`
--
ALTER TABLE `fixed_deposits`
  MODIFY `fixed_deposit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fixed_deposit_plans`
--
ALTER TABLE `fixed_deposit_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `individual_customers`
--
ALTER TABLE `individual_customers`
  MODIFY `individual_customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loan_paid_entries`
--
ALTER TABLE `loan_paid_entries`
  MODIFY `loan_paid_entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `online_accounts`
--
ALTER TABLE `online_accounts`
  MODIFY `online_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `online_fixed_deposits`
--
ALTER TABLE `online_fixed_deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `online_transactions`
--
ALTER TABLE `online_transactions`
  MODIFY `online_trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization_customers`
--
ALTER TABLE `organization_customers`
  MODIFY `organization_customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_loans`
--
ALTER TABLE `personal_loans`
  MODIFY `personal_loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saving_accounts`
--
ALTER TABLE `saving_accounts`
  MODIFY `saving_account_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saving_interests`
--
ALTER TABLE `saving_interests`
  MODIFY `saving_interest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction_types`
--
ALTER TABLE `transaction_types`
  MODIFY `trans_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`);

--
-- Constraints for table `atms`
--
ALTER TABLE `atms`
  ADD CONSTRAINT `atms_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`);

--
-- Constraints for table `atm_withdraws`
--
ALTER TABLE `atm_withdraws`
  ADD CONSTRAINT `atm_withdraws_ibfk_1` FOREIGN KEY (`account_number`) REFERENCES `accounts` (`account_number`),
  ADD CONSTRAINT `atm_withdraws_ibfk_2` FOREIGN KEY (`atm_id`) REFERENCES `atms` (`atm_id`);

--
-- Constraints for table `business_loans`
--
ALTER TABLE `business_loans`
  ADD CONSTRAINT `business_loans_ibfk_1` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`loan_id`);

--
-- Constraints for table `checking_accounts`
--
ALTER TABLE `checking_accounts`
  ADD CONSTRAINT `checking_accounts_ibfk_1` FOREIGN KEY (`account_number`) REFERENCES `accounts` (`account_number`);

--
-- Constraints for table `deposit_entries`
--
ALTER TABLE `deposit_entries`
  ADD CONSTRAINT `deposit_entries_ibfk_1` FOREIGN KEY (`account_number`) REFERENCES `accounts` (`account_number`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`),
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `fixed_deposits`
--
ALTER TABLE `fixed_deposits`
  ADD CONSTRAINT `fixed_deposits_ibfk_1` FOREIGN KEY (`saving_account_number`) REFERENCES `saving_accounts` (`saving_account_number`),
  ADD CONSTRAINT `fixed_deposits_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `fixed_deposit_plans` (`plan_id`);

--
-- Constraints for table `individual_customers`
--
ALTER TABLE `individual_customers`
  ADD CONSTRAINT `individual_customers_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`saving_account_number`) REFERENCES `saving_accounts` (`saving_account_number`);

--
-- Constraints for table `loan_paid_entries`
--
ALTER TABLE `loan_paid_entries`
  ADD CONSTRAINT `loan_paid_entries_ibfk_1` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`loan_id`);

--
-- Constraints for table `loan_requests_online`
--
ALTER TABLE `loan_requests_online`
  ADD CONSTRAINT `loan_requests_online_ibfk_1` FOREIGN KEY (`online_account_id`) REFERENCES `online_accounts` (`online_account_id`),
  ADD CONSTRAINT `loan_requests_online_ibfk_2` FOREIGN KEY (`fixed_deposit_id`) REFERENCES `fixed_deposits` (`fixed_deposit_id`);

--
-- Constraints for table `loan_take_assistants`
--
ALTER TABLE `loan_take_assistants`
  ADD CONSTRAINT `loan_take_assistants_ibfk_1` FOREIGN KEY (`approved_by`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `loan_take_assistants_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `loan_take_assistants_ibfk_3` FOREIGN KEY (`checked_by`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `online_accounts`
--
ALTER TABLE `online_accounts`
  ADD CONSTRAINT `online_accounts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `online_fixed_deposits`
--
ALTER TABLE `online_fixed_deposits`
  ADD CONSTRAINT `online_fixed_deposits_ibfk_1` FOREIGN KEY (`fixed_deposit_id`) REFERENCES `fixed_deposits` (`fixed_deposit_id`),
  ADD CONSTRAINT `online_fixed_deposits_ibfk_2` FOREIGN KEY (`online_account_id`) REFERENCES `online_accounts` (`online_account_id`);

--
-- Constraints for table `online_transactions`
--
ALTER TABLE `online_transactions`
  ADD CONSTRAINT `online_transactions_ibfk_1` FOREIGN KEY (`from_online_account_id`) REFERENCES `online_accounts` (`online_account_id`),
  ADD CONSTRAINT `online_transactions_ibfk_2` FOREIGN KEY (`trans_type_id`) REFERENCES `transaction_types` (`trans_type_id`),
  ADD CONSTRAINT `online_transactions_ibfk_3` FOREIGN KEY (`to_account_id`) REFERENCES `accounts` (`account_number`);

--
-- Constraints for table `organization_customers`
--
ALTER TABLE `organization_customers`
  ADD CONSTRAINT `organization_customers_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `personal_loans`
--
ALTER TABLE `personal_loans`
  ADD CONSTRAINT `personal_loans_ibfk_1` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`loan_id`);

--
-- Constraints for table `saving_accounts`
--
ALTER TABLE `saving_accounts`
  ADD CONSTRAINT `saving_accounts_ibfk_1` FOREIGN KEY (`account_number`) REFERENCES `accounts` (`account_number`),
  ADD CONSTRAINT `saving_accounts_ibfk_2` FOREIGN KEY (`saving_interest_id`) REFERENCES `saving_interests` (`saving_interest_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
