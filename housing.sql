-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 02:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `housing`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocategrave`
--

CREATE TABLE `allocategrave` (
  `id` int(11) NOT NULL,
  `grave_id` int(11) NOT NULL,
  `graveowner_id` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) DEFAULT NULL,
  `receipt` varchar(100) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_id` int(11) NOT NULL,
  `waiting_no` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `id_no` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `date` date DEFAULT NULL,
  `period` varchar(200) DEFAULT NULL,
  `renewal` date DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contact` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `marital` varchar(200) DEFAULT NULL,
  `dependants` int(11) DEFAULT NULL,
  `s_name` varchar(200) DEFAULT NULL,
  `s_surname` varchar(200) DEFAULT NULL,
  `s_id_no` varchar(200) DEFAULT NULL,
  `s_gender` varchar(200) DEFAULT NULL,
  `s_dob` date DEFAULT NULL,
  `cert_no` varchar(200) DEFAULT NULL,
  `s_employment` varchar(200) DEFAULT NULL,
  `s_income` decimal(19,4) DEFAULT NULL,
  `employment_status` varchar(200) DEFAULT NULL,
  `c_name` varchar(200) DEFAULT NULL,
  `c_address` varchar(200) DEFAULT NULL,
  `c_contact` varchar(200) DEFAULT NULL,
  `c_contact_person` varchar(200) DEFAULT NULL,
  `salary` decimal(19,4) DEFAULT NULL,
  `bank` varchar(200) DEFAULT NULL,
  `deposit` decimal(19,4) DEFAULT NULL,
  `n_name` varchar(200) DEFAULT NULL,
  `n_surname` varchar(200) DEFAULT NULL,
  `n_address` varchar(200) DEFAULT NULL,
  `n_contact` varchar(200) DEFAULT NULL,
  `n_id_no` varchar(200) DEFAULT NULL,
  `allo_batch_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `other_property1` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL,
  `other_property2` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL,
  `other_property3` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL,
  `receipt_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `app_id` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `stand_type` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `reff` varchar(50) DEFAULT NULL,
  `add_comment` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `to_burials` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `burials`
--

CREATE TABLE `burials` (
  `id` int(11) NOT NULL,
  `d_name` varchar(50) DEFAULT NULL,
  `d_surname` varchar(50) DEFAULT NULL,
  `d_gender` varchar(100) DEFAULT NULL,
  `d_dob` date DEFAULT NULL,
  `d_dod` date DEFAULT NULL,
  `d_internment_date` date DEFAULT NULL,
  `d_fpolicy` varchar(50) DEFAULT NULL,
  `burial_order` varchar(100) DEFAULT NULL,
  `grave_id` int(11) DEFAULT NULL,
  `r_name` varchar(100) DEFAULT NULL,
  `r_contact` varchar(100) DEFAULT NULL,
  `attachments_id` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cemeterysections`
--

CREATE TABLE `cemeterysections` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `council_property`
--

CREATE TABLE `council_property` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `property_address` varchar(255) DEFAULT NULL,
  `property_use` varchar(255) DEFAULT NULL,
  `validity_status` varchar(255) DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grave`
--

CREATE TABLE `grave` (
  `id` int(11) NOT NULL,
  `g_site` varchar(50) DEFAULT NULL,
  `g_lot` varchar(50) DEFAULT NULL,
  `g_no` int(11) DEFAULT NULL,
  `g_batch` varchar(50) DEFAULT NULL,
  `g_status` varchar(50) DEFAULT NULL,
  `g_date` date DEFAULT NULL,
  `g_section` varchar(100) DEFAULT NULL,
  `address_lat` float DEFAULT NULL,
  `address_lon` float DEFAULT NULL,
  `grave_lat` float DEFAULT -20.1485,
  `grave_lon` float DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `graveowner`
--

CREATE TABLE `graveowner` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `Identity_no` varchar(100) NOT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `housing_debtors`
--

CREATE TABLE `housing_debtors` (
  `id` int(6) NOT NULL,
  `Account` varchar(100) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Title` varchar(5) DEFAULT NULL,
  `Init` varchar(4) DEFAULT NULL,
  `Contact_Person` varchar(30) DEFAULT NULL,
  `Physical1` varchar(37) DEFAULT NULL,
  `Physical2` varchar(25) DEFAULT NULL,
  `Physical3` varchar(3) DEFAULT NULL,
  `Physical4` varchar(10) DEFAULT NULL,
  `Physical5` varchar(10) DEFAULT NULL,
  `PhysicalPC` varchar(10) DEFAULT NULL,
  `Addressee` varchar(10) DEFAULT NULL,
  `Post1` varchar(35) DEFAULT NULL,
  `Post2` varchar(27) DEFAULT NULL,
  `Post3` varchar(10) DEFAULT NULL,
  `Post4` varchar(10) DEFAULT NULL,
  `Post5` varchar(10) DEFAULT NULL,
  `PostPC` varchar(10) DEFAULT NULL,
  `Delivered_To` varchar(13) DEFAULT NULL,
  `Telephone` varchar(13) DEFAULT NULL,
  `Telephone2` varchar(13) DEFAULT NULL,
  `Fax1` varchar(10) DEFAULT NULL,
  `Fax2` varchar(10) DEFAULT NULL,
  `AccountTerms` int(1) NOT NULL DEFAULT 0,
  `CT` int(2) NOT NULL DEFAULT -1,
  `Tax_Number` varchar(8) DEFAULT NULL,
  `Registration` varchar(9) DEFAULT NULL,
  `Credit_Limit` int(1) NOT NULL DEFAULT 0,
  `RepID` int(1) NOT NULL DEFAULT 0,
  `Interest_Rate` int(1) NOT NULL DEFAULT 0,
  `Discount` int(1) NOT NULL DEFAULT 0,
  `On_Hold` int(1) NOT NULL DEFAULT 0,
  `BFOpenType` int(1) NOT NULL DEFAULT 0,
  `EMail` varchar(10) DEFAULT NULL,
  `BankLink` varchar(1) NOT NULL DEFAULT '0',
  `BranchCode` varchar(10) DEFAULT NULL,
  `BankAccNum` varchar(10) DEFAULT NULL,
  `BankAccType` varchar(10) DEFAULT NULL,
  `AutoDisc` int(1) NOT NULL DEFAULT 0,
  `DiscMtrxRow` int(1) NOT NULL DEFAULT 0,
  `MainAccLink` varchar(10) DEFAULT NULL,
  `CashDebtor` int(1) NOT NULL DEFAULT 0,
  `DCBalance` varchar(10) DEFAULT NULL,
  `CheckTerms` int(1) NOT NULL DEFAULT 0,
  `UseEmail` int(1) NOT NULL DEFAULT 0,
  `iIncidentTypeID` varchar(10) DEFAULT NULL,
  `iBusTypeID` varchar(10) DEFAULT NULL,
  `iBusClassID` varchar(10) DEFAULT NULL,
  `iCountryID` varchar(10) DEFAULT NULL,
  `iAgentID` varchar(10) DEFAULT NULL,
  `dTimeStamp` datetime DEFAULT current_timestamp(),
  `cAccDescription` varchar(40) DEFAULT NULL,
  `cWebPage` varchar(10) DEFAULT NULL,
  `iClassID` int(3) DEFAULT NULL,
  `iAreasID` varchar(1) DEFAULT NULL,
  `cBankRefNr` varchar(10) DEFAULT NULL,
  `iCurrencyID` int(1) DEFAULT NULL,
  `bStatPrint` int(2) NOT NULL DEFAULT -1,
  `bStatEmail` int(1) NOT NULL DEFAULT 0,
  `cStatEmailPass` varchar(10) DEFAULT NULL,
  `bForCurAcc` int(2) DEFAULT NULL,
  `fForeignBalance` varchar(10) DEFAULT NULL,
  `bTaxPrompt` int(1) NOT NULL DEFAULT 0,
  `iARPriceListNameID` int(1) NOT NULL DEFAULT 1,
  `iSettlementTermsID` int(1) NOT NULL DEFAULT 0,
  `bSourceDocPrint` int(2) NOT NULL DEFAULT -1,
  `bSourceDocEmail` int(1) NOT NULL DEFAULT 0,
  `iEUCountryID` int(1) NOT NULL DEFAULT 0,
  `iDefTaxTypeID` int(1) NOT NULL DEFAULT 0,
  `bCODAccount` int(1) NOT NULL DEFAULT 0,
  `iAgeingTermID` int(1) DEFAULT 1,
  `bElecDocAcceptance` int(1) NOT NULL DEFAULT 0,
  `iBankDetailType` varchar(10) DEFAULT NULL,
  `cBankAccHolder` varchar(10) DEFAULT NULL,
  `cIDNumber` varchar(17) DEFAULT NULL,
  `cPassportNumber` varchar(13) DEFAULT NULL,
  `bInsuranceCustomer` int(1) NOT NULL DEFAULT 0,
  `cBankCode` varchar(10) DEFAULT NULL,
  `cSwiftCode` varchar(10) DEFAULT NULL,
  `Client_iBranchID` int(1) NOT NULL DEFAULT 0,
  `Client_dCreatedDate` varchar(10) DEFAULT NULL,
  `Client_dModifiedDate` varchar(10) DEFAULT NULL,
  `Client_iCreatedBranchID` varchar(10) DEFAULT NULL,
  `Client_iModifiedBranchID` varchar(10) DEFAULT NULL,
  `Client_iCreatedAgentID` varchar(10) DEFAULT NULL,
  `Client_iModifiedAgentID` varchar(10) DEFAULT NULL,
  `Client_iChangeSetID` varchar(10) DEFAULT NULL,
  `Client_Checksum` varchar(10) DEFAULT NULL,
  `iSPQueueID` varchar(10) DEFAULT NULL,
  `bCustomerZoneEnabled` int(1) NOT NULL DEFAULT 0,
  `bOnlineToolsEnabled` int(1) NOT NULL DEFAULT 0,
  `bTaxVerified` int(1) NOT NULL DEFAULT 0,
  `dDateTaxVerified` varchar(10) DEFAULT NULL,
  `bBadDebtRelief` int(1) NOT NULL DEFAULT 0,
  `iTaxState` int(1) NOT NULL DEFAULT 0,
  `bObjectToProcess` int(1) NOT NULL DEFAULT 0,
  `bStatEmailPeople` int(1) NOT NULL DEFAULT 0,
  `bSourceDocEmailPeople` int(1) NOT NULL DEFAULT 0,
  `iTaxCountryID` int(1) NOT NULL DEFAULT 0,
  `ubARIsOrderNumRequired` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `receipt_no` int(11) NOT NULL,
  `amount` float NOT NULL,
  `invoiced` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property_category`
--

CREATE TABLE `property_category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE `property_type` (
  `id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sage_debtors`
--

CREATE TABLE `sage_debtors` (
  `id` int(6) NOT NULL,
  `Account` varchar(20) DEFAULT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `Title` varchar(5) DEFAULT NULL,
  `Init` varchar(4) DEFAULT NULL,
  `Contact_Person` varchar(30) DEFAULT NULL,
  `Physical1` varchar(37) DEFAULT NULL,
  `Physical2` varchar(25) DEFAULT NULL,
  `Physical3` varchar(3) DEFAULT NULL,
  `Physical4` varchar(10) DEFAULT NULL,
  `Physical5` varchar(10) DEFAULT NULL,
  `PhysicalPC` varchar(10) DEFAULT NULL,
  `Addressee` varchar(10) DEFAULT NULL,
  `Post1` varchar(35) DEFAULT NULL,
  `Post2` varchar(27) DEFAULT NULL,
  `Post3` varchar(10) DEFAULT NULL,
  `Post4` varchar(10) DEFAULT NULL,
  `Post5` varchar(10) DEFAULT NULL,
  `PostPC` varchar(10) DEFAULT NULL,
  `Delivered_To` varchar(13) DEFAULT NULL,
  `Telephone` varchar(13) DEFAULT NULL,
  `Telephone2` varchar(13) DEFAULT NULL,
  `Fax1` varchar(10) DEFAULT NULL,
  `Fax2` varchar(10) DEFAULT NULL,
  `AccountTerms` int(1) DEFAULT NULL,
  `CT` int(2) DEFAULT NULL,
  `Tax_Number` varchar(8) DEFAULT NULL,
  `Registration` varchar(9) DEFAULT NULL,
  `Credit_Limit` int(1) DEFAULT NULL,
  `RepID` int(1) DEFAULT NULL,
  `Interest_Rate` int(1) DEFAULT NULL,
  `Discount` int(1) DEFAULT NULL,
  `On_Hold` int(1) DEFAULT NULL,
  `BFOpenType` int(1) DEFAULT NULL,
  `EMail` varchar(10) DEFAULT NULL,
  `BankLink` varchar(1) DEFAULT NULL,
  `BranchCode` varchar(10) DEFAULT NULL,
  `BankAccNum` varchar(10) DEFAULT NULL,
  `BankAccType` varchar(10) DEFAULT NULL,
  `AutoDisc` int(1) DEFAULT NULL,
  `DiscMtrxRow` int(1) DEFAULT NULL,
  `MainAccLink` varchar(10) DEFAULT NULL,
  `CashDebtor` int(1) DEFAULT NULL,
  `DCBalance` varchar(10) DEFAULT NULL,
  `CheckTerms` int(1) DEFAULT NULL,
  `UseEmail` int(1) DEFAULT NULL,
  `iIncidentTypeID` varchar(10) DEFAULT NULL,
  `iBusTypeID` varchar(10) DEFAULT NULL,
  `iBusClassID` varchar(10) DEFAULT NULL,
  `iCountryID` varchar(10) DEFAULT NULL,
  `iAgentID` varchar(10) DEFAULT NULL,
  `dTimeStamp` varchar(19) DEFAULT NULL,
  `cAccDescription` varchar(40) DEFAULT NULL,
  `cWebPage` varchar(10) DEFAULT NULL,
  `iClassID` int(3) DEFAULT NULL,
  `iAreasID` varchar(1) DEFAULT NULL,
  `cBankRefNr` varchar(10) DEFAULT NULL,
  `iCurrencyID` int(1) DEFAULT NULL,
  `bStatPrint` int(2) DEFAULT NULL,
  `bStatEmail` int(1) DEFAULT NULL,
  `cStatEmailPass` varchar(10) DEFAULT NULL,
  `bForCurAcc` int(2) DEFAULT NULL,
  `fForeignBalance` varchar(10) DEFAULT NULL,
  `bTaxPrompt` int(1) DEFAULT NULL,
  `iARPriceListNameID` int(1) DEFAULT NULL,
  `iSettlementTermsID` int(1) DEFAULT NULL,
  `bSourceDocPrint` int(2) DEFAULT NULL,
  `bSourceDocEmail` int(1) DEFAULT NULL,
  `iEUCountryID` int(1) DEFAULT NULL,
  `iDefTaxTypeID` int(1) DEFAULT NULL,
  `bCODAccount` int(1) DEFAULT NULL,
  `iAgeingTermID` int(1) DEFAULT NULL,
  `bElecDocAcceptance` int(1) DEFAULT NULL,
  `iBankDetailType` varchar(10) DEFAULT NULL,
  `cBankAccHolder` varchar(10) DEFAULT NULL,
  `cIDNumber` varchar(17) DEFAULT NULL,
  `cPassportNumber` varchar(13) DEFAULT NULL,
  `bInsuranceCustomer` int(1) DEFAULT NULL,
  `cBankCode` varchar(10) DEFAULT NULL,
  `cSwiftCode` varchar(10) DEFAULT NULL,
  `Client_iBranchID` int(1) DEFAULT NULL,
  `Client_dCreatedDate` varchar(10) DEFAULT NULL,
  `Client_dModifiedDate` varchar(10) DEFAULT NULL,
  `Client_iCreatedBranchID` varchar(10) DEFAULT NULL,
  `Client_iModifiedBranchID` varchar(10) DEFAULT NULL,
  `Client_iCreatedAgentID` varchar(10) DEFAULT NULL,
  `Client_iModifiedAgentID` varchar(10) DEFAULT NULL,
  `Client_iChangeSetID` varchar(10) DEFAULT NULL,
  `Client_Checksum` varchar(10) DEFAULT NULL,
  `iSPQueueID` varchar(10) DEFAULT NULL,
  `bCustomerZoneEnabled` int(1) DEFAULT NULL,
  `bOnlineToolsEnabled` int(1) DEFAULT NULL,
  `bTaxVerified` int(1) DEFAULT NULL,
  `dDateTaxVerified` varchar(10) DEFAULT NULL,
  `bBadDebtRelief` int(1) DEFAULT NULL,
  `iTaxState` int(1) DEFAULT NULL,
  `bObjectToProcess` int(1) DEFAULT NULL,
  `bStatEmailPeople` int(1) DEFAULT NULL,
  `bSourceDocEmailPeople` int(1) DEFAULT NULL,
  `iTaxCountryID` int(1) DEFAULT NULL,
  `ubARIsOrderNumRequired` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sage_debtors_everyone`
--

CREATE TABLE `sage_debtors_everyone` (
  `id` int(6) NOT NULL,
  `Account` varchar(20) DEFAULT NULL,
  `Name` varchar(43) DEFAULT NULL,
  `Title` varchar(5) DEFAULT NULL,
  `Init` varchar(4) DEFAULT NULL,
  `Contact_Person` varchar(30) DEFAULT NULL,
  `Physical1` varchar(37) DEFAULT NULL,
  `Physical2` varchar(25) DEFAULT NULL,
  `Physical3` varchar(3) DEFAULT NULL,
  `Physical4` varchar(10) DEFAULT NULL,
  `Physical5` varchar(10) DEFAULT NULL,
  `PhysicalPC` varchar(10) DEFAULT NULL,
  `Addressee` varchar(10) DEFAULT NULL,
  `Post1` varchar(34) DEFAULT NULL,
  `Delivered_To` varchar(13) DEFAULT NULL,
  `Telephone` varchar(13) DEFAULT NULL,
  `Telephone2` varchar(13) DEFAULT NULL,
  `Fax1` varchar(10) DEFAULT NULL,
  `Fax2` varchar(10) DEFAULT NULL,
  `DCBalance` varchar(21) DEFAULT NULL,
  `dTimeStamp` varchar(19) DEFAULT NULL,
  `cAccDescription` varchar(43) DEFAULT NULL,
  `cWebPage` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sage_debtors_vungu`
--

CREATE TABLE `sage_debtors_vungu` (
  `id` int(5) NOT NULL,
  `Account` varchar(20) DEFAULT NULL,
  `Name` varchar(82) DEFAULT NULL,
  `Title` varchar(2) DEFAULT NULL,
  `Init` varchar(1) DEFAULT NULL,
  `Contact_Person` varchar(20) DEFAULT NULL,
  `Physical1` varchar(14) DEFAULT NULL,
  `Physical2` varchar(10) DEFAULT NULL,
  `Physical3` varchar(10) DEFAULT NULL,
  `Physical4` varchar(10) DEFAULT NULL,
  `Physical5` varchar(32) DEFAULT NULL,
  `PhysicalPC` varchar(10) DEFAULT NULL,
  `Addressee` varchar(10) DEFAULT NULL,
  `Delivered_To` varchar(12) DEFAULT NULL,
  `Telephone` varchar(12) DEFAULT NULL,
  `Telephone2` varchar(12) DEFAULT NULL,
  `DCBalance` varchar(10) DEFAULT NULL,
  `dTimeStamp` varchar(16) DEFAULT NULL,
  `cAccDescription` varchar(80) DEFAULT NULL,
  `cWebPage` varchar(10) DEFAULT NULL,
  `fForeignBalance` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sage_trans`
--

CREATE TABLE `sage_trans` (
  `id` int(6) NOT NULL,
  `TxDate` varchar(10) DEFAULT NULL,
  `AccountLink` int(5) DEFAULT NULL,
  `TrCodeID` int(4) DEFAULT NULL,
  `Debit` decimal(13,6) DEFAULT NULL,
  `Credit` decimal(9,2) DEFAULT NULL,
  `iCurrencyID` int(1) DEFAULT NULL,
  `fExchangeRate` decimal(11,9) DEFAULT NULL,
  `fForeignDebit` decimal(13,6) DEFAULT NULL,
  `fForeignCredit` decimal(9,2) DEFAULT NULL,
  `Description` varchar(60) DEFAULT NULL,
  `TaxTypeID` int(1) DEFAULT NULL,
  `Reference` varchar(17) DEFAULT NULL,
  `Order_No` varchar(17) DEFAULT NULL,
  `ExtOrderNum` varchar(10) DEFAULT NULL,
  `cAuditNumber` decimal(9,5) DEFAULT NULL,
  `Tax_Amount` decimal(11,8) DEFAULT NULL,
  `fForeignTax` decimal(10,8) DEFAULT NULL,
  `Project` int(3) DEFAULT NULL,
  `Outstanding` decimal(14,6) DEFAULT NULL,
  `fForeignOutstanding` decimal(14,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sage_trans_old`
--

CREATE TABLE `sage_trans_old` (
  `id` int(6) NOT NULL,
  `TxDate` varchar(16) DEFAULT NULL,
  `AccountLink` int(5) DEFAULT NULL,
  `TrCodeID` int(4) DEFAULT NULL,
  `Debit` decimal(13,6) DEFAULT NULL,
  `Credit` decimal(9,2) DEFAULT NULL,
  `iCurrencyID` int(1) DEFAULT NULL,
  `fExchangeRate` decimal(11,9) DEFAULT NULL,
  `fForeignDebit` decimal(13,6) DEFAULT NULL,
  `fForeignCredit` decimal(9,2) DEFAULT NULL,
  `Description` varchar(60) DEFAULT NULL,
  `TaxTypeID` int(1) DEFAULT NULL,
  `Reference` varchar(17) DEFAULT NULL,
  `cAuditNumber` decimal(9,5) DEFAULT NULL,
  `Tax_Amount` decimal(11,8) DEFAULT NULL,
  `Outstanding` decimal(14,6) DEFAULT NULL,
  `fForeignOutstanding` decimal(14,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `softdeletes`
--

CREATE TABLE `softdeletes` (
  `title` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stand`
--

CREATE TABLE `stand` (
  `stand_id` int(11) NOT NULL,
  `stand_no` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `dvp_status` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `town_city` varchar(200) DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `owner` varchar(200) DEFAULT NULL,
  `developer` varchar(200) DEFAULT NULL,
  `application_id` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `stand_batch_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `allo_batch_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `phase` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `serviced_status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `repossessed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblacccustomerledger`
--

CREATE TABLE `tblacccustomerledger` (
  `receipt_invoice` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `app_id` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `reff` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `stand_id` int(11) DEFAULT NULL,
  `details` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `debit` decimal(19,4) DEFAULT NULL,
  `credit` decimal(19,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblaccgeneralledger`
--

CREATE TABLE `tblaccgeneralledger` (
  `date` date DEFAULT NULL,
  `ledger_type` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `receipt_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `surname` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `national_id` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `debit` decimal(19,4) DEFAULT NULL,
  `credit` decimal(19,4) DEFAULT NULL,
  `party_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblaccinvoice`
--

CREATE TABLE `tblaccinvoice` (
  `inv_id` int(11) DEFAULT NULL,
  `inv_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `app_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(19,4) DEFAULT NULL,
  `details` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblaccparticular`
--

CREATE TABLE `tblaccparticular` (
  `particular_name` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblaccreceipt`
--

CREATE TABLE `tblaccreceipt` (
  `r_id` int(11) NOT NULL,
  `r_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date` date DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `surname` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `n_id` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `grandtotal` decimal(19,4) DEFAULT NULL,
  `payment_method` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblaccreceiptparticulars`
--

CREATE TABLE `tblaccreceiptparticulars` (
  `receipt_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `particulars` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `amount` decimal(19,4) DEFAULT NULL,
  `notes` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblallocation`
--

CREATE TABLE `tblallocation` (
  `id` int(11) NOT NULL,
  `stand_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `reason_resolution` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `authorised_by` int(11) DEFAULT NULL,
  `application_type` varchar(100) NOT NULL DEFAULT 'App\\Application',
  `current_status` varchar(100) NOT NULL DEFAULT 'CURRENT'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblallocationscommunal`
--

CREATE TABLE `tblallocationscommunal` (
  `allocation_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `stand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblappbeneficiary`
--

CREATE TABLE `tblappbeneficiary` (
  `name` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `relation` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `age` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `sex` varchar(6) CHARACTER SET utf8mb4 DEFAULT NULL,
  `occupation` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `income` decimal(19,4) DEFAULT NULL,
  `app_id` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblapplicationcommunal`
--

CREATE TABLE `tblapplicationcommunal` (
  `application_id` int(11) NOT NULL,
  `site_type` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `district_site` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `communal_land` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `surname_company` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `other_names` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `postal_address` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id_no` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `district_applicant` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `contact` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date` date DEFAULT NULL,
  `m_surname` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `m_other_names` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `m_id` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `m_district` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `capital` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `financed_by` varchar(5) CHARACTER SET utf8mb4 DEFAULT NULL,
  `f_amount` decimal(19,4) DEFAULT NULL,
  `f_name` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `locality` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `distance` int(11) DEFAULT NULL,
  `reason_outside_centre` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL,
  `business_nature` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `any_lease` varchar(5) CHARACTER SET utf8mb4 DEFAULT NULL,
  `alease_no` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `alease_receipt_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `alease_amount` decimal(19,4) DEFAULT NULL,
  `cancelled_lease` varchar(5) CHARACTER SET utf8mb4 DEFAULT NULL,
  `clease_no` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `cancellation_reason` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL,
  `offense` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL,
  `app_id` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `receipt_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `amount` decimal(19,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblapplicationrenewal`
--

CREATE TABLE `tblapplicationrenewal` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `receipt_no` varchar(255) NOT NULL,
  `expires_on` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblapplications`
--

CREATE TABLE `tblapplications` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `partner_id` int(11) DEFAULT NULL,
  `batch_id` int(11) NOT NULL,
  `stand_id` int(11) DEFAULT NULL,
  `stand_type_id` int(11) NOT NULL,
  `application_stage_id` int(11) NOT NULL,
  `receipt` varchar(100) DEFAULT NULL,
  `no_of_dependants` varchar(255) DEFAULT NULL,
  `num_of_years_in_council` int(8) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `nature_of_dev` varchar(255) DEFAULT NULL,
  `place_of_intent` varchar(255) DEFAULT NULL,
  `details_of_owned` varchar(255) DEFAULT NULL,
  `capital_amount` varchar(255) DEFAULT NULL,
  `other_info` varchar(255) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblapplicationstages`
--

CREATE TABLE `tblapplicationstages` (
  `id` int(11) NOT NULL,
  `stage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbatch`
--

CREATE TABLE `tblbatch` (
  `bid` int(11) NOT NULL,
  `btype` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `bno` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `captured_by` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbatches`
--

CREATE TABLE `tblbatches` (
  `id` int(11) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `batch_type_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbatchtypes`
--

CREATE TABLE `tblbatchtypes` (
  `id` int(11) NOT NULL,
  `batchtype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbc`
--

CREATE TABLE `tblbc` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `ward_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblbeneficiaries`
--

CREATE TABLE `tblbeneficiaries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `relation` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `income` bigint(20) DEFAULT NULL,
  `person_id` int(10) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblcemeteryburials`
--

CREATE TABLE `tblcemeteryburials` (
  `d_name` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `d_surname` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `d_dob` date DEFAULT NULL,
  `d_dod` date DEFAULT NULL,
  `d_internment_date` date DEFAULT NULL,
  `d_fpolicy` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `grave_id` int(11) DEFAULT NULL,
  `r_name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `r_contact` int(11) DEFAULT NULL,
  `b_id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcemeterygrave`
--

CREATE TABLE `tblcemeterygrave` (
  `grave_id` int(11) NOT NULL,
  `g_site` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `g_lot` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `g_no` int(11) DEFAULT NULL,
  `g_batch` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `g_status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `g_date` date DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcemeteryowner`
--

CREATE TABLE `tblcemeteryowner` (
  `owner_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `surname` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `grave_id` int(11) DEFAULT NULL,
  `receipt_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `amount` decimal(19,4) DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcession`
--

CREATE TABLE `tblcession` (
  `id` int(11) NOT NULL,
  `from_person` int(11) NOT NULL,
  `to_person` int(11) NOT NULL,
  `stand_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(100) DEFAULT 'PENDING',
  `cedent_witness` varchar(255) DEFAULT NULL,
  `cessionary_witness` varchar(100) DEFAULT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblcessionold`
--

CREATE TABLE `tblcessionold` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `surname` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `stand_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `stand_location` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `witness1` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `witness2` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `application_id` int(11) NOT NULL,
  `waitinglist_no` int(11) NOT NULL,
  `cession_reason` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount_paid` decimal(19,4) DEFAULT NULL,
  `authorisation_status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcessions`
--

CREATE TABLE `tblcessions` (
  `cession_id` int(11) NOT NULL,
  `application_id_ceding` int(11) NOT NULL,
  `application_id_taking_over` int(11) NOT NULL,
  `stand_id` int(11) NOT NULL,
  `witness1_ceding` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `witness2_ceding` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `witness1_taking_over` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `witness2_taking_over` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `cession_reason` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL,
  `batch_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `authorised_by` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `cession_date` date NOT NULL,
  `amount_paid` decimal(19,4) DEFAULT NULL,
  `authorisation_status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `reason_resolution` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcharges`
--

CREATE TABLE `tblcharges` (
  `app_id` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `charge` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `amount` decimal(19,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcompanies`
--

CREATE TABLE `tblcompanies` (
  `id` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `c_name` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `c_address` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `c_logo` longblob DEFAULT NULL,
  `town_city` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcopcouncilproperty`
--

CREATE TABLE `tblcopcouncilproperty` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `p_type` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `p_category` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `p_address` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `p_use` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `validity_status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `p_status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcoppropertytypes`
--

CREATE TABLE `tblcoppropertytypes` (
  `p_type` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `p_id` char(10) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcost`
--

CREATE TABLE `tblcost` (
  `cost_id` int(11) DEFAULT NULL,
  `record_no` int(11) DEFAULT NULL,
  `proj_stage` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `project_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `cost_description` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL,
  `value` decimal(19,4) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcosting_projects`
--

CREATE TABLE `tblcosting_projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_description` blob NOT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_manager` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcosting_project_markups`
--

CREATE TABLE `tblcosting_project_markups` (
  `id` int(10) UNSIGNED NOT NULL,
  `cost_for_project_id` int(11) NOT NULL,
  `mark_up` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcosting_project_stands`
--

CREATE TABLE `tblcosting_project_stands` (
  `id` int(10) UNSIGNED NOT NULL,
  `stand_type_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `area_available` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_units` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcosting_stages`
--

CREATE TABLE `tblcosting_stages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcost_for_projects`
--

CREATE TABLE `tblcost_for_projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `costing_project_stand_id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbldeveloper`
--

CREATE TABLE `tbldeveloper` (
  `dev_name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `dev_address` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `dev_id` int(11) DEFAULT NULL,
  `ope_status` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date_captured` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `captured_by` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `amount` decimal(19,4) DEFAULT NULL,
  `receipt_no` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldevelopers`
--

CREATE TABLE `tbldevelopers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `telephone` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldevelopmentstages`
--

CREATE TABLE `tbldevelopmentstages` (
  `stage` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldevstructnames`
--

CREATE TABLE `tbldevstructnames` (
  `dev_struct_name` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `dev_struct_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldocuments`
--

CREATE TABLE `tbldocuments` (
  `id` int(10) UNSIGNED NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` int(11) NOT NULL,
  `document_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblgenders`
--

CREATE TABLE `tblgenders` (
  `id` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblger`
--

CREATE TABLE `tblger` (
  `CompanyID` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `CompanyName` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Town` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `ProductType` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `SerialNo` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Version` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `DateRegistered` date DEFAULT NULL,
  `ExpiryDate` date DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblinspection_stages`
--

CREATE TABLE `tblinspection_stages` (
  `stage` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id` int(11) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbllayoutdesign`
--

CREATE TABLE `tbllayoutdesign` (
  `record_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `project_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `description` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date` char(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `plan_report` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `approval` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `reportdoc_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `approvaldoc_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblleases`
--

CREATE TABLE `tblleases` (
  `id` int(11) NOT NULL,
  `lease_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date_applied` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `entered_by` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `lease_status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `stand_id` int(11) DEFAULT NULL,
  `approval_status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `batch_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `reason_resolution` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblleases#`
--

CREATE TABLE `tblleases#` (
  `lease_id` int(11) NOT NULL,
  `lease_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date_applied` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `entered_by` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `lease_status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `stand_id` int(11) DEFAULT NULL,
  `approval_status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `batch_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `reason_resolution` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbllease_decisions`
--

CREATE TABLE `tbllease_decisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `lease_id` int(11) NOT NULL,
  `receipt_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation_type` enum('APPROVAL','REJECTION','RENEWAL','TERMINATION') COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbllease_renewals`
--

CREATE TABLE `tbllease_renewals` (
  `id` int(10) UNSIGNED NOT NULL,
  `lease_id` int(11) NOT NULL,
  `narration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('declined','pending','approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE `tbllogs` (
  `user_name` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `operation` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmaritals`
--

CREATE TABLE `tblmaritals` (
  `id` int(11) NOT NULL,
  `maritalstatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblnextofkin`
--

CREATE TABLE `tblnextofkin` (
  `id` int(10) NOT NULL,
  `person_id` int(11) NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relationship` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblnotification`
--

CREATE TABLE `tblnotification` (
  `id` int(11) NOT NULL,
  `stand_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblotherdevstructures`
--

CREATE TABLE `tblotherdevstructures` (
  `ods_id` int(11) DEFAULT NULL,
  `ods_type` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `ods_date` date DEFAULT NULL,
  `ods_comment` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `stand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblotherlayoutdetails`
--

CREATE TABLE `tblotherlayoutdetails` (
  `record_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `stakeholder` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `comment` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `doc_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblotherproperties`
--

CREATE TABLE `tblotherproperties` (
  `PropertyID` int(11) DEFAULT NULL,
  `Firstname` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Surname` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `IDNo` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Address` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL,
  `TelNo` int(11) DEFAULT NULL,
  `PropertyHouseNo` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Density` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Location` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `StandType` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `AllocationYear` date DEFAULT NULL,
  `CompletionYear` date DEFAULT NULL,
  `DelInd` varchar(5) CHARACTER SET utf8mb4 DEFAULT NULL,
  `CapturedBy` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpegging`
--

CREATE TABLE `tblpegging` (
  `record_no` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `total_stands` int(11) DEFAULT NULL,
  `residential` int(11) DEFAULT NULL,
  `communal` int(11) DEFAULT NULL,
  `high_density` int(11) DEFAULT NULL,
  `medium_density` int(11) DEFAULT NULL,
  `low_density` int(11) DEFAULT NULL,
  `done_by` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `doc_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `remarks` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL,
  `total_area` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpersons`
--

CREATE TABLE `tblpersons` (
  `id` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender_id` int(11) NOT NULL,
  `marital_id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postaladdress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_income` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `businessaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthplace` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblreceipts`
--

CREATE TABLE `tblreceipts` (
  `id` int(11) NOT NULL,
  `receipt` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblreinstatements`
--

CREATE TABLE `tblreinstatements` (
  `id` int(11) NOT NULL,
  `reinstatement_date` date DEFAULT NULL,
  `repossession_id` int(11) DEFAULT NULL,
  `captured_by` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `reason` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `approval_status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `batch_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblrepossessions`
--

CREATE TABLE `tblrepossessions` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `stand_id` int(11) NOT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `repossession_date` date NOT NULL,
  `captured_by` int(11) NOT NULL,
  `allocation_id` int(11) DEFAULT NULL,
  `stand_batch_id` int(11) DEFAULT NULL,
  `decision` varchar(100) DEFAULT 'PENDING',
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `repayment_amount` decimal(10,2) NOT NULL,
  `repayment_percentage` int(11) DEFAULT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `processed` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblroles`
--

CREATE TABLE `tblroles` (
  `id` bigint(20) NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblruraldocuments`
--

CREATE TABLE `tblruraldocuments` (
  `id` int(10) UNSIGNED NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` int(11) NOT NULL,
  `document_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblrurallease_decisions`
--

CREATE TABLE `tblrurallease_decisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `lease_id` int(11) NOT NULL,
  `receipt_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation_type` enum('APPROVAL','REJECTION','RENEWAL','TERMINATION') COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblrurallease_renewals`
--

CREATE TABLE `tblrurallease_renewals` (
  `id` int(10) UNSIGNED NOT NULL,
  `lease_id` int(11) NOT NULL,
  `narration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('declined','pending','approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblrural_lease`
--

CREATE TABLE `tblrural_lease` (
  `id` int(11) NOT NULL,
  `lease_no` varchar(100) DEFAULT NULL,
  `date_applied` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `stand_purpose` varchar(150) DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `approval_status` varchar(100) DEFAULT NULL,
  `lease_status` varchar(100) DEFAULT NULL,
  `ward` varchar(100) DEFAULT NULL,
  `centre` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblsitting`
--

CREATE TABLE `tblsitting` (
  `record_no` int(11) NOT NULL,
  `prject_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `proposed_sites` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `site_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `location` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date` date DEFAULT NULL,
  `soil_types` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL,
  `main_soils` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `approved` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `cultural_reservations` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL,
  `pro_manager` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsmsapi`
--

CREATE TABLE `tblsmsapi` (
  `url` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `token` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblspouse`
--

CREATE TABLE `tblspouse` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `nationalid` varchar(255) DEFAULT NULL,
  `gender_id` int(1) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `marriage_cert` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `date_marriage` date DEFAULT NULL,
  `income` varchar(100) DEFAULT NULL,
  `person_id` int(200) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblstageinspection`
--

CREATE TABLE `tblstageinspection` (
  `stage` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `inspector_name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `inspector_address` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `ins_id` int(11) DEFAULT NULL,
  `ins_status` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `ins_date` date DEFAULT NULL,
  `receipt_no` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `amount` decimal(19,4) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `witness` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `stand_id` int(11) DEFAULT NULL,
  `stand_no` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `contractors` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstandclasses`
--

CREATE TABLE `tblstandclasses` (
  `id` int(11) NOT NULL,
  `class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblstandcommunal`
--

CREATE TABLE `tblstandcommunal` (
  `stand_id` int(11) NOT NULL,
  `stand_no` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `dvp_status` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `town_city` varchar(200) DEFAULT NULL,
  `size` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(200) NOT NULL,
  `owner` varchar(200) DEFAULT NULL,
  `developer` varchar(200) DEFAULT NULL,
  `application_id` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `stand_batch_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `allo_batch_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstandconfigs`
--

CREATE TABLE `tblstandconfigs` (
  `id` int(11) NOT NULL,
  `stand_type_id` int(11) NOT NULL,
  `number_of_stands` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `stand_class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstands`
--

CREATE TABLE `tblstands` (
  `id` int(11) NOT NULL,
  `stand_no` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `stand_class` varchar(100) DEFAULT NULL,
  `acc_suffix` varchar(100) NOT NULL DEFAULT 'HSE-HD000',
  `dvp_status` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `town_city` varchar(200) DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `sage_group` int(11) NOT NULL DEFAULT 232,
  `status` varchar(200) DEFAULT NULL,
  `owner` varchar(200) DEFAULT NULL,
  `developer` varchar(200) DEFAULT NULL,
  `application_id` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `allo_batch_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `phase` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `serviced_status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(1) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `repossessed` tinyint(1) NOT NULL DEFAULT 0,
  `leased` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstandsfromplanning`
--

CREATE TABLE `tblstandsfromplanning` (
  `id` int(11) DEFAULT NULL,
  `record_no` int(11) DEFAULT NULL,
  `project_no` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `communal_stands` int(11) DEFAULT NULL,
  `communal_price` decimal(19,4) DEFAULT NULL,
  `low_stands` int(11) DEFAULT NULL,
  `low_price` decimal(19,4) DEFAULT NULL,
  `med_stands` int(11) DEFAULT NULL,
  `med_price` decimal(19,4) DEFAULT NULL,
  `high_stands` int(11) DEFAULT NULL,
  `high_price` decimal(19,4) DEFAULT NULL,
  `site` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstandtypes`
--

CREATE TABLE `tblstandtypes` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstand_type`
--

CREATE TABLE `tblstand_type` (
  `stand_type` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `address` char(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `ec_number` char(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `photo` longblob DEFAULT NULL,
  `status` varchar(4) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblvalid`
--

CREATE TABLE `tblvalid` (
  `id` int(11) NOT NULL,
  `due` date NOT NULL DEFAULT current_timestamp(),
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblward`
--

CREATE TABLE `tblward` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(10) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocategrave`
--
ALTER TABLE `allocategrave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_attachments_burilas` (`to_burials`) USING BTREE;

--
-- Indexes for table `burials`
--
ALTER TABLE `burials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_burial_grave` (`grave_id`);

--
-- Indexes for table `cemeterysections`
--
ALTER TABLE `cemeterysections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `council_property`
--
ALTER TABLE `council_property`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cop_users` (`person_id`);

--
-- Indexes for table `grave`
--
ALTER TABLE `grave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_grave_graveowner` (`owner_id`) USING BTREE;

--
-- Indexes for table `graveowner`
--
ALTER TABLE `graveowner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `housing_debtors`
--
ALTER TABLE `housing_debtors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Account` (`Account`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_category`
--
ALTER TABLE `property_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sage_debtors`
--
ALTER TABLE `sage_debtors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sage_debtors_everyone`
--
ALTER TABLE `sage_debtors_everyone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sage_debtors_vungu`
--
ALTER TABLE `sage_debtors_vungu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sage_trans`
--
ALTER TABLE `sage_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sage_trans_old`
--
ALTER TABLE `sage_trans_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stand`
--
ALTER TABLE `stand`
  ADD PRIMARY KEY (`stand_id`);

--
-- Indexes for table `tblaccreceipt`
--
ALTER TABLE `tblaccreceipt`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tblallocation`
--
ALTER TABLE `tblallocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblallocationscommunal`
--
ALTER TABLE `tblallocationscommunal`
  ADD PRIMARY KEY (`allocation_id`);

--
-- Indexes for table `tblapplicationcommunal`
--
ALTER TABLE `tblapplicationcommunal`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `tblapplicationrenewal`
--
ALTER TABLE `tblapplicationrenewal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblapplications`
--
ALTER TABLE `tblapplications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblapplicationstages`
--
ALTER TABLE `tblapplicationstages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbatch`
--
ALTER TABLE `tblbatch`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `tblbatches`
--
ALTER TABLE `tblbatches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbatchtypes`
--
ALTER TABLE `tblbatchtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbc`
--
ALTER TABLE `tblbc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbeneficiaries`
--
ALTER TABLE `tblbeneficiaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcemeteryburials`
--
ALTER TABLE `tblcemeteryburials`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tblcemeterygrave`
--
ALTER TABLE `tblcemeterygrave`
  ADD PRIMARY KEY (`grave_id`);

--
-- Indexes for table `tblcemeteryowner`
--
ALTER TABLE `tblcemeteryowner`
  ADD PRIMARY KEY (`owner_id`),
  ADD KEY `FK_tblCemeteryOwner_tblCemeteryGrave` (`grave_id`);

--
-- Indexes for table `tblcession`
--
ALTER TABLE `tblcession`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcessions`
--
ALTER TABLE `tblcessions`
  ADD PRIMARY KEY (`cession_id`),
  ADD KEY `FK_tblCessions_application` (`application_id_ceding`),
  ADD KEY `FK_tblCessions_application1` (`application_id_taking_over`);

--
-- Indexes for table `tblcompanies`
--
ALTER TABLE `tblcompanies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcopcouncilproperty`
--
ALTER TABLE `tblcopcouncilproperty`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `FK_tblCOPcouncilProperty_tblCOPusers` (`u_id`);

--
-- Indexes for table `tblcoppropertytypes`
--
ALTER TABLE `tblcoppropertytypes`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tblcosting_projects`
--
ALTER TABLE `tblcosting_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcosting_project_markups`
--
ALTER TABLE `tblcosting_project_markups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcosting_project_stands`
--
ALTER TABLE `tblcosting_project_stands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcosting_stages`
--
ALTER TABLE `tblcosting_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcost_for_projects`
--
ALTER TABLE `tblcost_for_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldevelopers`
--
ALTER TABLE `tbldevelopers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldevelopmentstages`
--
ALTER TABLE `tbldevelopmentstages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldocuments`
--
ALTER TABLE `tbldocuments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgenders`
--
ALTER TABLE `tblgenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblinspection_stages`
--
ALTER TABLE `tblinspection_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblleases`
--
ALTER TABLE `tblleases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tblLeases_stand` (`stand_id`);

--
-- Indexes for table `tblleases#`
--
ALTER TABLE `tblleases#`
  ADD PRIMARY KEY (`lease_id`),
  ADD KEY `FK_tblLeases_stand` (`stand_id`);

--
-- Indexes for table `tbllease_decisions`
--
ALTER TABLE `tbllease_decisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllease_renewals`
--
ALTER TABLE `tbllease_renewals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmaritals`
--
ALTER TABLE `tblmaritals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblnextofkin`
--
ALTER TABLE `tblnextofkin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblnotification`
--
ALTER TABLE `tblnotification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblotherdevstructures`
--
ALTER TABLE `tblotherdevstructures`
  ADD KEY `FK_tblOtherDevStructures_stand` (`stand_id`);

--
-- Indexes for table `tblpersons`
--
ALTER TABLE `tblpersons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persons_nationalid_unique` (`nationalid`);

--
-- Indexes for table `tblreceipts`
--
ALTER TABLE `tblreceipts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `receipt` (`receipt`);

--
-- Indexes for table `tblreinstatements`
--
ALTER TABLE `tblreinstatements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tblReinstatements_tblRepossessions` (`repossession_id`);

--
-- Indexes for table `tblrepossessions`
--
ALTER TABLE `tblrepossessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblroles`
--
ALTER TABLE `tblroles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblruraldocuments`
--
ALTER TABLE `tblruraldocuments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrurallease_decisions`
--
ALTER TABLE `tblrurallease_decisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrurallease_renewals`
--
ALTER TABLE `tblrurallease_renewals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrural_lease`
--
ALTER TABLE `tblrural_lease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsitting`
--
ALTER TABLE `tblsitting`
  ADD PRIMARY KEY (`record_no`);

--
-- Indexes for table `tblspouse`
--
ALTER TABLE `tblspouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstageinspection`
--
ALTER TABLE `tblstageinspection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstandclasses`
--
ALTER TABLE `tblstandclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstandcommunal`
--
ALTER TABLE `tblstandcommunal`
  ADD PRIMARY KEY (`stand_id`);

--
-- Indexes for table `tblstandconfigs`
--
ALTER TABLE `tblstandconfigs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstands`
--
ALTER TABLE `tblstands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stand_no` (`stand_no`);

--
-- Indexes for table `tblstandtypes`
--
ALTER TABLE `tblstandtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tblvalid`
--
ALTER TABLE `tblvalid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblward`
--
ALTER TABLE `tblward`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nationalid_unique` (`nationalid`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocategrave`
--
ALTER TABLE `allocategrave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `burials`
--
ALTER TABLE `burials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cemeterysections`
--
ALTER TABLE `cemeterysections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `council_property`
--
ALTER TABLE `council_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grave`
--
ALTER TABLE `grave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `graveowner`
--
ALTER TABLE `graveowner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `housing_debtors`
--
ALTER TABLE `housing_debtors`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_category`
--
ALTER TABLE `property_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_type`
--
ALTER TABLE `property_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblallocation`
--
ALTER TABLE `tblallocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblapplicationrenewal`
--
ALTER TABLE `tblapplicationrenewal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblapplications`
--
ALTER TABLE `tblapplications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblapplicationstages`
--
ALTER TABLE `tblapplicationstages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbatches`
--
ALTER TABLE `tblbatches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbatchtypes`
--
ALTER TABLE `tblbatchtypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbc`
--
ALTER TABLE `tblbc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbeneficiaries`
--
ALTER TABLE `tblbeneficiaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcession`
--
ALTER TABLE `tblcession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcosting_projects`
--
ALTER TABLE `tblcosting_projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcosting_project_markups`
--
ALTER TABLE `tblcosting_project_markups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcosting_project_stands`
--
ALTER TABLE `tblcosting_project_stands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcosting_stages`
--
ALTER TABLE `tblcosting_stages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcost_for_projects`
--
ALTER TABLE `tblcost_for_projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbldevelopers`
--
ALTER TABLE `tbldevelopers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbldevelopmentstages`
--
ALTER TABLE `tbldevelopmentstages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbldocuments`
--
ALTER TABLE `tbldocuments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblgenders`
--
ALTER TABLE `tblgenders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblinspection_stages`
--
ALTER TABLE `tblinspection_stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblleases`
--
ALTER TABLE `tblleases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbllease_decisions`
--
ALTER TABLE `tbllease_decisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbllease_renewals`
--
ALTER TABLE `tbllease_renewals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblmaritals`
--
ALTER TABLE `tblmaritals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblnextofkin`
--
ALTER TABLE `tblnextofkin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblnotification`
--
ALTER TABLE `tblnotification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpersons`
--
ALTER TABLE `tblpersons`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblreceipts`
--
ALTER TABLE `tblreceipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblreinstatements`
--
ALTER TABLE `tblreinstatements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblrepossessions`
--
ALTER TABLE `tblrepossessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblruraldocuments`
--
ALTER TABLE `tblruraldocuments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblrurallease_decisions`
--
ALTER TABLE `tblrurallease_decisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblrurallease_renewals`
--
ALTER TABLE `tblrurallease_renewals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblrural_lease`
--
ALTER TABLE `tblrural_lease`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblspouse`
--
ALTER TABLE `tblspouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstageinspection`
--
ALTER TABLE `tblstageinspection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstandclasses`
--
ALTER TABLE `tblstandclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstandconfigs`
--
ALTER TABLE `tblstandconfigs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstands`
--
ALTER TABLE `tblstands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstandtypes`
--
ALTER TABLE `tblstandtypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblvalid`
--
ALTER TABLE `tblvalid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblward`
--
ALTER TABLE `tblward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcemeteryowner`
--
ALTER TABLE `tblcemeteryowner`
  ADD CONSTRAINT `FK_tblCemeteryOwner_tblCemeteryGrave` FOREIGN KEY (`grave_id`) REFERENCES `tblcemeterygrave` (`grave_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblcessions`
--
ALTER TABLE `tblcessions`
  ADD CONSTRAINT `FK_tblCessions_application` FOREIGN KEY (`application_id_ceding`) REFERENCES `application` (`application_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_tblCessions_application1` FOREIGN KEY (`application_id_taking_over`) REFERENCES `application` (`application_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblleases#`
--
ALTER TABLE `tblleases#`
  ADD CONSTRAINT `FK_tblLeases_stand` FOREIGN KEY (`stand_id`) REFERENCES `stand` (`stand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
