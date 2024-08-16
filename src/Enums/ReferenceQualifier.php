<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Enums;

enum ReferenceQualifier: string
{
    // Order acknowledgement document identifier
    case AAA = 'AAA';

    // Proforma invoice document identifier
    case AAB = 'AAB';

    // Documentary credit identifier
    case AAC = 'AAC';

    // Contract document addendum identifier
    case AAD = 'AAD';

    // Goods declaration number
    case AAE = 'AAE';

    // Debit card number
    case AAF = 'AAF';

    // Offer number
    case AAG = 'AAG';

    // Bank's batch interbank transaction reference number
    case AAH = 'AAH';

    // Bank's individual interbank transaction reference number
    case AAI = 'AAI';

    // Delivery order number
    case AAJ = 'AAJ';

    // Despatch advice number
    case AAK = 'AAK';

    // Drawing number
    case AAL = 'AAL';

    // Waybill number
    case AAM = 'AAM';

    // Delivery schedule number
    case AAN = 'AAN';

    // Consignment identifier, consignee assigned
    case AAO = 'AAO';

    // Partial shipment identifier
    case AAP = 'AAP';

    // Transport equipment identifier
    case AAQ = 'AAQ';

    // Municipality assigned business registry number
    case AAR = 'AAR';

    // Transport contract document identifier
    case AAS = 'AAS';

    // Master label number
    case AAT = 'AAT';

    // Despatch note document identifier
    case AAU = 'AAU';

    // Enquiry number
    case AAV = 'AAV';

    // Docket number
    case AAW = 'AAW';

    // Civil action number
    case AAX = 'AAX';

    // Carrier's agent reference number
    case AAY = 'AAY';

    // Standard Carrier Alpha Code (SCAC) number
    case AAZ = 'AAZ';

    // Customs valuation decision number
    case ABA = 'ABA';

    // End use authorization number
    case ABB = 'ABB';

    // Anti-dumping case number
    case ABC = 'ABC';

    // Customs tariff number
    case ABD = 'ABD';

    // Declarant's reference number
    case ABE = 'ABE';

    // Repair estimate number
    case ABF = 'ABF';

    // Customs decision request number
    case ABG = 'ABG';

    // Sub-house bill of lading number
    case ABH = 'ABH';

    // Tax payment identifier
    case ABI = 'ABI';

    // Quota number
    case ABJ = 'ABJ';

    // Transit (onward carriage) guarantee (bond) number
    case ABK = 'ABK';

    // Customs guarantee number
    case ABL = 'ABL';

    // Replacing part number
    case ABM = 'ABM';

    // Seller's catalogue number
    case ABN = 'ABN';

    // Originator's reference
    case ABO = 'ABO';

    // Declarant's Customs identity number
    case ABP = 'ABP';

    // Importer reference number
    case ABQ = 'ABQ';

    // Export clearance instruction reference number
    case ABR = 'ABR';

    // Import clearance instruction reference number
    case ABS = 'ABS';

    // Goods declaration document identifier, Customs
    case ABT = 'ABT';

    // Article number
    case ABU = 'ABU';

    // Intra-plant routing
    case ABV = 'ABV';

    // Stock keeping unit number
    case ABW = 'ABW';

    // Text Element Identifier deletion reference
    case ABX = 'ABX';

    // Allotment identification (Air)
    case ABY = 'ABY';

    // Vehicle licence number
    case ABZ = 'ABZ';

    // Air cargo transfer manifest
    case AC = 'AC';

    // Cargo acceptance order reference number
    case ACA = 'ACA';

    // US government agency number
    case ACB = 'ACB';

    // Shipping unit identification
    case ACC = 'ACC';

    // Additional reference number
    case ACD = 'ACD';

    // Related document number
    case ACE = 'ACE';

    // Addressee reference
    case ACF = 'ACF';

    // ATA carnet number
    case ACG = 'ACG';

    // Packaging unit identification
    case ACH = 'ACH';

    // Outerpackaging unit identification
    case ACI = 'ACI';

    // Customer material specification number
    case ACJ = 'ACJ';

    // Bank reference
    case ACK = 'ACK';

    // Principal reference number
    case ACL = 'ACL';

    // Collection advice document identifier
    case ACN = 'ACN';

    // Iron charge number
    case ACO = 'ACO';

    // Hot roll number
    case ACP = 'ACP';

    // Cold roll number
    case ACQ = 'ACQ';

    // Railway wagon number
    case ACR = 'ACR';

    // Unique claims reference number of the sender
    case ACT = 'ACT';

    // Loss/event number
    case ACU = 'ACU';

    // Estimate order reference number
    case ACV = 'ACV';

    // Reference number to previous message
    case ACW = 'ACW';

    // Banker's acceptance
    case ACX = 'ACX';

    // Duty memo number
    case ACY = 'ACY';

    // Equipment transport charge number
    case ACZ = 'ACZ';

    // Buyer's item number
    case ADA = 'ADA';

    // Matured certificate of deposit
    case ADB = 'ADB';

    // Loan
    case ADC = 'ADC';

    // Analysis number/test number
    case ADD = 'ADD';

    // Account number
    case ADE = 'ADE';

    // Treaty number
    case ADF = 'ADF';

    // Catastrophe number
    case ADG = 'ADG';

    // Bureau signing (statement reference)
    case ADI = 'ADI';

    // Company / syndicate reference 1
    case ADJ = 'ADJ';

    // Company / syndicate reference 2
    case ADK = 'ADK';

    // Ordering customer consignment reference number
    case ADL = 'ADL';

    // Shipowner's authorization number
    case ADM = 'ADM';

    // Inland transport order number
    case ADN = 'ADN';

    // Container work order reference number
    case ADO = 'ADO';

    // Statement number
    case ADP = 'ADP';

    // Unique market reference
    case ADQ = 'ADQ';

    // Group accounting
    case ADT = 'ADT';

    // Broker reference 1
    case ADU = 'ADU';

    // Broker reference 2
    case ADV = 'ADV';

    // Lloyd's claims office reference
    case ADW = 'ADW';

    // Secure delivery terms and conditions agreement reference
    case ADX = 'ADX';

    // Report number
    case ADY = 'ADY';

    // Trader account number
    case ADZ = 'ADZ';

    // Authorization for expense (AFE) number
    case AE = 'AE';

    // Government agency reference number
    case AEA = 'AEA';

    // Assembly number
    case AEB = 'AEB';

    // Symbol number
    case AEC = 'AEC';

    // Commodity number
    case AED = 'AED';

    // Eur 1 certificate number
    case AEE = 'AEE';

    // Customer process specification number
    case AEF = 'AEF';

    // Customer specification number
    case AEG = 'AEG';

    // Applicable instructions or standards
    case AEH = 'AEH';

    // Registration number of previous Customs declaration
    case AEI = 'AEI';

    // Post-entry reference
    case AEJ = 'AEJ';

    // Payment order number
    case AEK = 'AEK';

    // Delivery number (transport)
    case AEL = 'AEL';

    // Transport route
    case AEM = 'AEM';

    // Customer's unit inventory number
    case AEN = 'AEN';

    // Product reservation number
    case AEO = 'AEO';

    // Project number
    case AEP = 'AEP';

    // Drawing list number
    case AEQ = 'AEQ';

    // Project specification number
    case AER = 'AER';

    // Primary reference
    case AES = 'AES';

    // Request for cancellation number
    case AET = 'AET';

    // Supplier's control number
    case AEU = 'AEU';

    // Shipping note number
    case AEV = 'AEV';

    // Empty container bill number
    case AEW = 'AEW';

    // Non-negotiable maritime transport document number
    case AEX = 'AEX';

    // Substitute air waybill number
    case AEY = 'AEY';

    // Despatch note (post parcels) number
    case AEZ = 'AEZ';

    // Airlines flight identification number
    case AF = 'AF';

    // Through bill of lading number
    case AFA = 'AFA';

    // Cargo manifest number
    case AFB = 'AFB';

    // Bordereau number
    case AFC = 'AFC';

    // Customs item number
    case AFD = 'AFD';

    // Export Control Commodity number (ECCN)
    case AFE = 'AFE';

    // Marking/label reference
    case AFF = 'AFF';

    // Tariff number
    case AFG = 'AFG';

    // Replenishment purchase order number
    case AFH = 'AFH';

    // Immediate transportation no. for in bond movement
    case AFI = 'AFI';

    // Transportation exportation no. for in bond movement
    case AFJ = 'AFJ';

    // Immediate exportation no. for in bond movement
    case AFK = 'AFK';

    // Associated invoices
    case AFL = 'AFL';

    // Secondary Customs reference
    case AFM = 'AFM';

    // Account party's reference
    case AFN = 'AFN';

    // Beneficiary's reference
    case AFO = 'AFO';

    // Second beneficiary's reference
    case AFP = 'AFP';

    // Applicant's bank reference
    case AFQ = 'AFQ';

    // Issuing bank's reference
    case AFR = 'AFR';

    // Beneficiary's bank reference
    case AFS = 'AFS';

    // Direct payment valuation number
    case AFT = 'AFT';

    // Direct payment valuation request number
    case AFU = 'AFU';

    // Quantity valuation number
    case AFV = 'AFV';

    // Quantity valuation request number
    case AFW = 'AFW';

    // Bill of quantities number
    case AFX = 'AFX';

    // Payment valuation number
    case AFY = 'AFY';

    // Situation number
    case AFZ = 'AFZ';

    // Agreement to pay number
    case AGA = 'AGA';

    // Contract party reference number
    case AGB = 'AGB';

    // Account party's bank reference
    case AGC = 'AGC';

    // Agent's bank reference
    case AGD = 'AGD';

    // Agent's reference
    case AGE = 'AGE';

    // Applicant's reference
    case AGF = 'AGF';

    // Dispute number
    case AGG = 'AGG';

    // Credit rating agency's reference number
    case AGH = 'AGH';

    // Request number
    case AGI = 'AGI';

    // Single transaction sequence number
    case AGJ = 'AGJ';

    // Application reference number
    case AGK = 'AGK';

    // Delivery verification certificate
    case AGL = 'AGL';

    // Number of temporary importation document
    case AGM = 'AGM';

    // Reference number quoted on statement
    case AGN = 'AGN';

    // Sender's reference to the original message
    case AGO = 'AGO';

    // Company issued equipment ID
    case AGP = 'AGP';

    // Domestic flight number
    case AGQ = 'AGQ';

    // International flight number
    case AGR = 'AGR';

    // Employer identification number of service bureau
    case AGS = 'AGS';

    // Service group identification number
    case AGT = 'AGT';

    // Member number
    case AGU = 'AGU';

    // Previous member number
    case AGV = 'AGV';

    // Scheme/plan number
    case AGW = 'AGW';

    // Previous scheme/plan number
    case AGX = 'AGX';

    // Receiving party's member identification
    case AGY = 'AGY';

    // Payroll number
    case AGZ = 'AGZ';

    // Packaging specification number
    case AHA = 'AHA';

    // Authority issued equipment identification
    case AHB = 'AHB';

    // Training flight number
    case AHC = 'AHC';

    // Fund code number
    case AHD = 'AHD';

    // Signal code number
    case AHE = 'AHE';

    // Major force program number
    case AHF = 'AHF';

    // Nomination number
    case AHG = 'AHG';

    // Laboratory registration number
    case AHH = 'AHH';

    // Transport contract reference number
    case AHI = 'AHI';

    // Payee's reference number
    case AHJ = 'AHJ';

    // Payer's reference number
    case AHK = 'AHK';

    // Creditor's reference number
    case AHL = 'AHL';

    // Debtor's reference number
    case AHM = 'AHM';

    // Joint venture reference number
    case AHN = 'AHN';

    // Chamber of Commerce registration number
    case AHO = 'AHO';

    // Tax registration number
    case AHP = 'AHP';

    // Wool identification number
    case AHQ = 'AHQ';

    // Wool tax reference number
    case AHR = 'AHR';

    // Meat processing establishment registration number
    case AHS = 'AHS';

    // Quarantine/treatment status reference number
    case AHT = 'AHT';

    // Request for quote number
    case AHU = 'AHU';

    // Manual processing authority number
    case AHV = 'AHV';

    // Rate note number
    case AHX = 'AHX';

    // Freight Forwarder number
    case AHY = 'AHY';

    // Customs release code
    case AHZ = 'AHZ';

    // Compliance code number
    case AIA = 'AIA';

    // Department of transportation bond number
    case AIB = 'AIB';

    // Export establishment number
    case AIC = 'AIC';

    // Certificate of conformity
    case AID = 'AID';

    // Ministerial certificate of homologation
    case AIE = 'AIE';

    // Previous delivery instruction number
    case AIF = 'AIF';

    // Passport number
    case AIG = 'AIG';

    // Common transaction reference number
    case AIH = 'AIH';

    // Bank's common transaction reference number
    case AII = 'AII';

    // Customer's individual transaction reference number
    case AIJ = 'AIJ';

    // Bank's individual transaction reference number
    case AIK = 'AIK';

    // Customer's common transaction reference number
    case AIL = 'AIL';

    // Individual transaction reference number
    case AIM = 'AIM';

    // Product sourcing agreement number
    case AIN = 'AIN';

    // Customs transhipment number
    case AIO = 'AIO';

    // Customs preference inquiry number
    case AIP = 'AIP';

    // Packing plant number
    case AIQ = 'AIQ';

    // Original certificate number
    case AIR = 'AIR';

    // Processing plant number
    case AIS = 'AIS';

    // Slaughter plant number
    case AIT = 'AIT';

    // Charge card account number
    case AIU = 'AIU';

    // Event reference number
    case AIV = 'AIV';

    // Transport section reference number
    case AIW = 'AIW';

    // Referred product for mechanical analysis
    case AIX = 'AIX';

    // Referred product for chemical analysis
    case AIY = 'AIY';

    // Consolidated invoice number
    case AIZ = 'AIZ';

    // Part reference indicator in a drawing
    case AJA = 'AJA';

    // U.S. Code of Federal Regulations (CFR)
    case AJB = 'AJB';

    // Purchasing activity clause number
    case AJC = 'AJC';

    // U.S. Defense Federal Acquisition Regulation Supplement
    case AJD = 'AJD';

    // Agency clause number
    case AJE = 'AJE';

    // Circular publication number
    case AJF = 'AJF';

    // U.S. Federal Acquisition Regulation
    case AJG = 'AJG';

    // U.S. General Services Administration Regulation
    case AJH = 'AJH';

    // U.S. Federal Information Resources Management Regulation
    case AJI = 'AJI';

    // Paragraph
    case AJJ = 'AJJ';

    // Special instructions number
    case AJK = 'AJK';

    // Site specific procedures, terms, and conditions number
    case AJL = 'AJL';

    // Master solicitation procedures, terms, and conditions
    case AJM = 'AJM';

    // U.S. Department of Veterans Affairs Acquisition Regulation
    case AJN = 'AJN';

    // Military Interdepartmental Purchase Request (MIPR) number
    case AJO = 'AJO';

    // Foreign military sales number
    case AJP = 'AJP';

    // Defense priorities allocation system priority rating
    case AJQ = 'AJQ';

    // Wage determination number
    case AJR = 'AJR';

    // Agreement number
    case AJS = 'AJS';

    // Standard Industry Classification (SIC) number
    case AJT = 'AJT';

    // End item number
    case AJU = 'AJU';

    // Federal supply schedule item number
    case AJV = 'AJV';

    // Technical document number
    case AJW = 'AJW';

    // Technical order number
    case AJX = 'AJX';

    // Suffix
    case AJY = 'AJY';

    // Transportation account number
    case AJZ = 'AJZ';

    // Container disposition order reference number
    case AKA = 'AKA';

    // Container prefix
    case AKB = 'AKB';

    // Transport equipment return reference
    case AKC = 'AKC';

    // Transport equipment survey reference
    case AKD = 'AKD';

    // Transport equipment survey report number
    case AKE = 'AKE';

    // Transport equipment stuffing order
    case AKF = 'AKF';

    // Vehicle Identification Number (VIN)
    case AKG = 'AKG';

    // Government bill of lading
    case AKH = 'AKH';

    // Ordering customer's second reference number
    case AKI = 'AKI';

    // Direct debit reference
    case AKJ = 'AKJ';

    // Meter reading at the beginning of the delivery
    case AKK = 'AKK';

    // Meter reading at the end of delivery
    case AKL = 'AKL';

    // Replenishment purchase order range start number
    case AKM = 'AKM';

    // Third bank's reference
    case AKN = 'AKN';

    // Action authorization number
    case AKO = 'AKO';

    // Appropriation number
    case AKP = 'AKP';

    // Product change authority number
    case AKQ = 'AKQ';

    // General cargo consignment reference number
    case AKR = 'AKR';

    // Catalogue sequence number
    case AKS = 'AKS';

    // Forwarding order number
    case AKT = 'AKT';

    // Transport equipment survey reference number
    case AKU = 'AKU';

    // Lease contract reference
    case AKV = 'AKV';

    // Transport costs reference number
    case AKW = 'AKW';

    // Transport equipment stripping order
    case AKX = 'AKX';

    // Prior policy number
    case AKY = 'AKY';

    // Policy number
    case AKZ = 'AKZ';

    // Procurement budget number
    case ALA = 'ALA';

    // Domestic inventory management code
    case ALB = 'ALB';

    // Customer reference number assigned to previous balance of
    case ALC = 'ALC';

    // Previous credit advice reference number
    case ALD = 'ALD';

    // Reporting form number
    case ALE = 'ALE';

    // Authorization number for exception to dangerous goods
    case ALF = 'ALF';

    // Dangerous goods security number
    case ALG = 'ALG';

    // Dangerous goods transport licence number
    case ALH = 'ALH';

    // Previous rental agreement number
    case ALI = 'ALI';

    // Next rental agreement reason number
    case ALJ = 'ALJ';

    // Consignee's invoice number
    case ALK = 'ALK';

    // Message batch number
    case ALL = 'ALL';

    // Previous delivery schedule number
    case ALM = 'ALM';

    // Physical inventory recount reference number
    case ALN = 'ALN';

    // Receiving advice number
    case ALO = 'ALO';

    // Returnable container reference number
    case ALP = 'ALP';

    // Returns notice number
    case ALQ = 'ALQ';

    // Sales forecast number
    case ALR = 'ALR';

    // Sales report number
    case ALS = 'ALS';

    // Previous tax control number
    case ALT = 'ALT';

    // AGERD (Aerospace Ground Equipment Requirement Data) number
    case ALU = 'ALU';

    // Registered capital reference
    case ALV = 'ALV';

    // Standard number of inspection document
    case ALW = 'ALW';

    // Model
    case ALX = 'ALX';

    // Financial management reference
    case ALY = 'ALY';

    // NOTIfication for COLlection number (NOTICOL)
    case ALZ = 'ALZ';

    // Previous request for metered reading reference number
    case AMA = 'AMA';

    // Next rental agreement number
    case AMB = 'AMB';

    // Reference number of a request for metered reading
    case AMC = 'AMC';

    // Hastening number
    case AMD = 'AMD';

    // Repair data request number
    case AME = 'AME';

    // Consumption data request number
    case AMF = 'AMF';

    // Profile number
    case AMG = 'AMG';

    // Case number
    case AMH = 'AMH';

    // Government quality assurance and control level Number
    case AMI = 'AMI';

    // Payment plan reference
    case AMJ = 'AMJ';

    // Replaced meter unit number
    case AMK = 'AMK';

    // Replenishment purchase order range end number
    case AML = 'AML';

    // Insurer assigned reference number
    case AMM = 'AMM';

    // Canadian excise entry number
    case AMN = 'AMN';

    // Premium rate table
    case AMO = 'AMO';

    // Advise through bank's reference
    case AMP = 'AMP';

    // US, Department of Transportation bond surety code
    case AMQ = 'AMQ';

    // US, Food and Drug Administration establishment indicator
    case AMR = 'AMR';

    // US, Federal Communications Commission (FCC) import
    case AMS = 'AMS';

    // Goods and Services Tax identification number
    case AMT = 'AMT';

    // Integrated logistic support cross reference number
    case AMU = 'AMU';

    // Department number
    case AMV = 'AMV';

    // Buyer's catalogue number
    case AMW = 'AMW';

    // Financial settlement party's reference number
    case AMX = 'AMX';

    // Standard's version number
    case AMY = 'AMY';

    // Pipeline number
    case AMZ = 'AMZ';

    // Account servicing bank's reference number
    case ANA = 'ANA';

    // Completed units payment request reference
    case ANB = 'ANB';

    // Payment in advance request reference
    case ANC = 'ANC';

    // Parent file
    case AND = 'AND';

    // Sub file
    case ANE = 'ANE';

    // CAD file layer convention
    case ANF = 'ANF';

    // Technical regulation
    case ANG = 'ANG';

    // Plot file
    case ANH = 'ANH';

    // File conversion journal
    case ANI = 'ANI';

    // Authorization number
    case ANJ = 'ANJ';

    // Reference number assigned by third party
    case ANK = 'ANK';

    // Deposit reference number
    case ANL = 'ANL';

    // Named bank's reference
    case ANM = 'ANM';

    // Drawee's reference
    case ANN = 'ANN';

    // Case of need party's reference
    case ANO = 'ANO';

    // Collecting bank's reference
    case ANP = 'ANP';

    // Remitting bank's reference
    case ANQ = 'ANQ';

    // Principal's bank reference
    case ANR = 'ANR';

    // Presenting bank's reference
    case ANS = 'ANS';

    // Consignee's reference
    case ANT = 'ANT';

    // Financial transaction reference number
    case ANU = 'ANU';

    // Credit reference number
    case ANV = 'ANV';

    // Receiving bank's authorization number
    case ANW = 'ANW';

    // Clearing reference
    case ANX = 'ANX';

    // Sending bank's reference number
    case ANY = 'ANY';

    // Documentary payment reference
    case AOA = 'AOA';

    // Accounting file reference
    case AOD = 'AOD';

    // Sender's file reference number
    case AOE = 'AOE';

    // Receiver's file reference number
    case AOF = 'AOF';

    // Source document internal reference
    case AOG = 'AOG';

    // Principal's reference
    case AOH = 'AOH';

    // Debit reference number
    case AOI = 'AOI';

    // Calendar
    case AOJ = 'AOJ';

    // Work shift
    case AOK = 'AOK';

    // Work breakdown structure
    case AOL = 'AOL';

    // Organisation breakdown structure
    case AOM = 'AOM';

    // Work task charge number
    case AON = 'AON';

    // Functional work group
    case AOO = 'AOO';

    // Work team
    case AOP = 'AOP';

    // Department
    case AOQ = 'AOQ';

    // Statement of work
    case AOR = 'AOR';

    // Work package
    case AOS = 'AOS';

    // Planning package
    case AOT = 'AOT';

    // Cost account
    case AOU = 'AOU';

    // Work order
    case AOV = 'AOV';

    // Transportation Control Number (TCN)
    case AOW = 'AOW';

    // Constraint notation
    case AOX = 'AOX';

    // ETERMS reference
    case AOY = 'AOY';

    // Implementation version number
    case AOZ = 'AOZ';

    // Accounts receivable number
    case AP = 'AP';

    // Incorporated legal reference
    case APA = 'APA';

    // Payment instalment reference number
    case APB = 'APB';

    // Equipment owner reference number
    case APC = 'APC';

    // Cedent's claim number
    case APD = 'APD';

    // Reinsurer's claim number
    case APE = 'APE';

    // Price/sales catalogue response reference number
    case APF = 'APF';

    // General purpose message reference number
    case APG = 'APG';

    // Invoicing data sheet reference number
    case APH = 'APH';

    // Inventory report reference number
    case API = 'API';

    // Ceiling formula reference number
    case APJ = 'APJ';

    // Price variation formula reference number
    case APK = 'APK';

    // Reference to account servicing bank's message
    case APL = 'APL';

    // Party sequence number
    case APM = 'APM';

    // Purchaser's request reference
    case APN = 'APN';

    // Contractor request reference
    case APO = 'APO';

    // Accident reference number
    case APP = 'APP';

    // Commercial account summary reference number
    case APQ = 'APQ';

    // Contract breakdown reference
    case APR = 'APR';

    // Contractor registration number
    case APS = 'APS';

    // Applicable coefficient identification number
    case APT = 'APT';

    // Special budget account number
    case APU = 'APU';

    // Authorisation for repair reference
    case APV = 'APV';

    // Manufacturer defined repair rates reference
    case APW = 'APW';

    // Original submitter log number
    case APX = 'APX';

    // Original submitter, parent Data Maintenance Request (DMR)
    case APY = 'APY';

    // Original submitter, child Data Maintenance Request (DMR)
    case APZ = 'APZ';

    // Entry point assessment log number
    case AQA = 'AQA';

    // Entry point assessment log number, parent DMR
    case AQB = 'AQB';

    // Entry point assessment log number, child DMR
    case AQC = 'AQC';

    // Data structure tag
    case AQD = 'AQD';

    // Central secretariat log number
    case AQE = 'AQE';

    // Central secretariat log number, parent Data Maintenance
    case AQF = 'AQF';

    // Central secretariat log number, child Data Maintenance
    case AQG = 'AQG';

    // International assessment log number
    case AQH = 'AQH';

    // International assessment log number, parent Data
    case AQI = 'AQI';

    // International assessment log number, child Data Maintenance
    case AQJ = 'AQJ';

    // Status report number
    case AQK = 'AQK';

    // Message design group number
    case AQL = 'AQL';

    // US Customs Service (USCS) entry code
    case AQM = 'AQM';

    // Beginning job sequence number
    case AQN = 'AQN';

    // Sender's clause number
    case AQO = 'AQO';

    // Dun and Bradstreet Canada's 8 digit Standard Industrial
    case AQP = 'AQP';

    // Activite Principale Exercee (APE) identifier
    case AQQ = 'AQQ';

    // Dun and Bradstreet US 8 digit Standard Industrial
    case AQR = 'AQR';

    // Nomenclature Activity Classification Economy (NACE)
    case AQS = 'AQS';

    // Norme Activite Francaise (NAF) identifier
    case AQT = 'AQT';

    // Registered contractor activity type
    case AQU = 'AQU';

    // Statistic Bundes Amt (SBA) identifier
    case AQV = 'AQV';

    // State or province assigned entity identification
    case AQW = 'AQW';

    // Institute of Security and Future Market Development (ISFMD)
    case AQX = 'AQX';

    // File identification number
    case AQY = 'AQY';

    // Bankruptcy procedure number
    case AQZ = 'AQZ';

    // National government business identification number
    case ARA = 'ARA';

    // Prior Data Universal Number System (DUNS) number
    case ARB = 'ARB';

    // Companies Registry Office (CRO) number
    case ARC = 'ARC';

    // Costa Rican judicial number
    case ARD = 'ARD';

    // Numero de Identificacion Tributaria (NIT)
    case ARE = 'ARE';

    // Patron number
    case ARF = 'ARF';

    // Registro Informacion Fiscal (RIF) number
    case ARG = 'ARG';

    // Registro Unico de Contribuyente (RUC) number
    case ARH = 'ARH';

    // Tokyo SHOKO Research (TSR) business identifier
    case ARI = 'ARI';

    // Personal identity card number
    case ARJ = 'ARJ';

    // Systeme Informatique pour le Repertoire des ENtreprises
    case ARK = 'ARK';

    // Systeme Informatique pour le Repertoire des ETablissements
    case ARL = 'ARL';

    // Publication issue number
    case ARM = 'ARM';

    // Original filing number
    case ARN = 'ARN';

    // Document page identifier
    case ARO = 'ARO';

    // Public filing registration number
    case ARP = 'ARP';

    // Regiristo Federal de Contribuyentes
    case ARQ = 'ARQ';

    // Social security number
    case ARR = 'ARR';

    // Document volume number
    case ARS = 'ARS';

    // Book number
    case ART = 'ART';

    // Stock exchange company identifier
    case ARU = 'ARU';

    // Imputation account
    case ARV = 'ARV';

    // Financial phase reference
    case ARW = 'ARW';

    // Technical phase reference
    case ARX = 'ARX';

    // Prior contractor registration number
    case ARY = 'ARY';

    // Stock adjustment number
    case ARZ = 'ARZ';

    // Dispensation reference
    case ASA = 'ASA';

    // Investment reference number
    case ASB = 'ASB';

    // Assuming company
    case ASC = 'ASC';

    // Budget chapter
    case ASD = 'ASD';

    // Duty free products security number
    case ASE = 'ASE';

    // Duty free products receipt authorisation number
    case ASF = 'ASF';

    // Party information message reference
    case ASG = 'ASG';

    // Formal statement reference
    case ASH = 'ASH';

    // Proof of delivery reference number
    case ASI = 'ASI';

    // Supplier's credit claim reference number
    case ASJ = 'ASJ';

    // Picture of actual product
    case ASK = 'ASK';

    // Picture of a generic product
    case ASL = 'ASL';

    // Trading partner identification number
    case ASM = 'ASM';

    // Prior trading partner identification number
    case ASN = 'ASN';

    // Password
    case ASO = 'ASO';

    // Formal report number
    case ASP = 'ASP';

    // Fund account number
    case ASQ = 'ASQ';

    // Safe custody number
    case ASR = 'ASR';

    // Master account number
    case ASS = 'ASS';

    // Group reference number
    case AST = 'AST';

    // Accounting transmission number
    case ASU = 'ASU';

    // Product data file number
    case ASV = 'ASV';

    // Cadastro Geral do Contribuinte (CGC)
    case ASW = 'ASW';

    // Foreign resident identification number
    case ASX = 'ASX';

    // CD-ROM
    case ASY = 'ASY';

    // Physical medium
    case ASZ = 'ASZ';

    // Financial cancellation reference number
    case ATA = 'ATA';

    // Purchase for export Customs agreement number
    case ATB = 'ATB';

    // Judgment number
    case ATC = 'ATC';

    // Secretariat number
    case ATD = 'ATD';

    // Previous banking status message reference
    case ATE = 'ATE';

    // Last received banking status message reference
    case ATF = 'ATF';

    // Bank's documentary procedure reference
    case ATG = 'ATG';

    // Customer's documentary procedure reference
    case ATH = 'ATH';

    // Safe deposit box number
    case ATI = 'ATI';

    // Receiving Bankgiro number
    case ATJ = 'ATJ';

    // Sending Bankgiro number
    case ATK = 'ATK';

    // Bankgiro reference
    case ATL = 'ATL';

    // Guarantee number
    case ATM = 'ATM';

    // Collection instrument number
    case ATN = 'ATN';

    // Converted Postgiro number
    case ATO = 'ATO';

    // Cost centre alignment number
    case ATP = 'ATP';

    // Kamer Van Koophandel (KVK) number
    case ATQ = 'ATQ';

    // Institut Belgo-Luxembourgeois de Codification (IBLC) number
    case ATR = 'ATR';

    // External object reference
    case ATS = 'ATS';

    // Exceptional transport authorisation number
    case ATT = 'ATT';

    // Clave Unica de Identificacion Tributaria (CUIT)
    case ATU = 'ATU';

    // Registro Unico Tributario (RUT)
    case ATV = 'ATV';

    // Flat rack container bundle identification number
    case ATW = 'ATW';

    // Transport equipment acceptance order reference
    case ATX = 'ATX';

    // Transport equipment release order reference
    case ATY = 'ATY';

    // Ship's stay reference number
    case ATZ = 'ATZ';

    // Authorization to meet competition number
    case AU = 'AU';

    // Place of positioning reference
    case AUA = 'AUA';

    // Party reference
    case AUB = 'AUB';

    // Issued prescription identification
    case AUC = 'AUC';

    // Collection reference
    case AUD = 'AUD';

    // Travel service
    case AUE = 'AUE';

    // Consignment stock contract
    case AUF = 'AUF';

    // Importer's letter of credit reference
    case AUG = 'AUG';

    // Performed prescription identification
    case AUH = 'AUH';

    // Image reference
    case AUI = 'AUI';

    // Proposed purchase order reference number
    case AUJ = 'AUJ';

    // Application for financial support reference number
    case AUK = 'AUK';

    // Manufacturing quality agreement number
    case AUL = 'AUL';

    // Software editor reference
    case AUM = 'AUM';

    // Software reference
    case AUN = 'AUN';

    // Software quality reference
    case AUO = 'AUO';

    // Consolidated orders' reference
    case AUP = 'AUP';

    // Customs binding ruling number
    case AUQ = 'AUQ';

    // Customs non-binding ruling number
    case AUR = 'AUR';

    // Delivery route reference
    case AUS = 'AUS';

    // Net area supplier reference
    case AUT = 'AUT';

    // Time series reference
    case AUU = 'AUU';

    // Connecting point to central grid
    case AUV = 'AUV';

    // Marketing plan identification number (MPIN)
    case AUW = 'AUW';

    // Entity reference number, previous
    case AUX = 'AUX';

    // International Standard Industrial Classification (ISIC)
    case AUY = 'AUY';

    // Customs pre-approval ruling number
    case AUZ = 'AUZ';

    // Account payable number
    case AV = 'AV';

    // First financial institution's transaction reference
    case AVA = 'AVA';

    // Product characteristics directory
    case AVB = 'AVB';

    // Supplier's customer reference number
    case AVC = 'AVC';

    // Inventory report request number
    case AVD = 'AVD';

    // Metering point
    case AVE = 'AVE';

    // Passenger reservation number
    case AVF = 'AVF';

    // Slaughterhouse approval number
    case AVG = 'AVG';

    // Meat cutting plant approval number
    case AVH = 'AVH';

    // Customer travel service identifier
    case AVI = 'AVI';

    // Export control classification number
    case AVJ = 'AVJ';

    // Broker reference 3
    case AVK = 'AVK';

    // Consignment information
    case AVL = 'AVL';

    // Goods item information
    case AVM = 'AVM';

    // Dangerous Goods information
    case AVN = 'AVN';

    // Pilotage services exemption number
    case AVO = 'AVO';

    // Person registration number
    case AVP = 'AVP';

    // Place of packing approval number
    case AVQ = 'AVQ';

    // Original Mandate Reference
    case AVR = 'AVR';

    // Mandate Reference
    case AVS = 'AVS';

    // Reservation station indentifier
    case AVT = 'AVT';

    // Unique goods shipment identifier
    case AVU = 'AVU';

    // Framework Agreement Number
    case AVV = 'AVV';

    // Hash value
    case AVW = 'AVW';

    // Movement reference number
    case AVX = 'AVX';

    // Economic Operators Registration and Identification Number
    case AVY = 'AVY';

    // Local Reference Number
    case AVZ = 'AVZ';

    // Rate code number
    case AWA = 'AWA';

    // Air waybill number
    case AWB = 'AWB';

    // Documentary credit amendment number
    case AWC = 'AWC';

    // Advising bank's reference
    case AWD = 'AWD';

    // Cost centre
    case AWE = 'AWE';

    // Work item quantity determination
    case AWF = 'AWF';

    // Internal data process number
    case AWG = 'AWG';

    // Category of work reference
    case AWH = 'AWH';

    // Policy form number
    case AWI = 'AWI';

    // Net area
    case AWJ = 'AWJ';

    // Service provider
    case AWK = 'AWK';

    // Error position
    case AWL = 'AWL';

    // Service category reference
    case AWM = 'AWM';

    // Connected location
    case AWN = 'AWN';

    // Related party
    case AWO = 'AWO';

    // Latest accounting entry record reference
    case AWP = 'AWP';

    // Accounting entry
    case AWQ = 'AWQ';

    // Document reference, original
    case AWR = 'AWR';

    // Hygienic Certificate number, national
    case AWS = 'AWS';

    // Administrative Reference Code
    case AWT = 'AWT';

    // Pick-up sheet number
    case AWU = 'AWU';

    // Phone number
    case AWV = 'AWV';

    // Buyer's fund number
    case AWW = 'AWW';

    // Company trading account number
    case AWX = 'AWX';

    // Reserved goods identifier
    case AWY = 'AWY';

    // Handling and movement reference number
    case AWZ = 'AWZ';

    // Instruction to despatch reference number
    case AXA = 'AXA';

    // Instruction for returns number
    case AXB = 'AXB';

    // Metered services consumption report number
    case AXC = 'AXC';

    // Order status enquiry number
    case AXD = 'AXD';

    // Firm booking reference number
    case AXE = 'AXE';

    // Product inquiry number
    case AXF = 'AXF';

    // Split delivery number
    case AXG = 'AXG';

    // Service relation number
    case AXH = 'AXH';

    // Serial shipping container code
    case AXI = 'AXI';

    // Test specification number
    case AXJ = 'AXJ';

    // Transport status report number
    case AXK = 'AXK';

    // Tooling contract number
    case AXL = 'AXL';

    // Formula reference number
    case AXM = 'AXM';

    // Pre-agreement number
    case AXN = 'AXN';

    // Product certification number
    case AXO = 'AXO';

    // Consignment contract number
    case AXP = 'AXP';

    // Product specification reference number
    case AXQ = 'AXQ';

    // Payroll deduction advice reference
    case AXR = 'AXR';

    // TRACES party identification
    case AXS = 'AXS';

    // Beginning meter reading actual
    case BA = 'BA';

    // Buyer's contract number
    case BC = 'BC';

    // Bid number
    case BD = 'BD';

    // Beginning meter reading estimated
    case BE = 'BE';

    // House bill of lading number
    case BH = 'BH';

    // Bill of lading number
    case BM = 'BM';

    // Consignment identifier, carrier assigned
    case BN = 'BN';

    // Blanket order number
    case BO = 'BO';

    // Broker or sales office number
    case BR = 'BR';

    // Batch number/lot number
    case BT = 'BT';

    // Battery and accumulator producer registration number
    case BTP = 'BTP';

    // Blended with number
    case BW = 'BW';

    // IATA Cargo Agent CASS Address number
    case CAS = 'CAS';

    // Matching of entries, balanced
    case CAT = 'CAT';

    // Entry flagging
    case CAU = 'CAU';

    // Matching of entries, unbalanced
    case CAV = 'CAV';

    // Document reference, internal
    case CAW = 'CAW';

    // European Value Added Tax identification
    case CAX = 'CAX';

    // Cost accounting document
    case CAY = 'CAY';

    // Grid operator's customer reference number
    case CAZ = 'CAZ';

    // Ticket control number
    case CBA = 'CBA';

    // Order shipment grouping reference
    case CBB = 'CBB';

    // Credit note number
    case CD = 'CD';

    // Ceding company
    case CEC = 'CEC';

    // Debit letter number
    case CED = 'CED';

    // Consignee's further order
    case CFE = 'CFE';

    // Animal farm licence number
    case CFF = 'CFF';

    // Consignor's further order
    case CFO = 'CFO';

    // Consignee's order number
    case CG = 'CG';

    // Customer catalogue number
    case CH = 'CH';

    // Cheque number
    case CK = 'CK';

    // Checking number
    case CKN = 'CKN';

    // Credit memo number
    case CM = 'CM';

    // Road consignment note number
    case CMR = 'CMR';

    // Carrier's reference number
    case CN = 'CN';

    // Charges note document attachment indicator
    case CNO = 'CNO';

    // Call off order number
    case COF = 'COF';

    // Condition of purchase document number
    case CP = 'CP';

    // Customer reference number
    case CR = 'CR';

    // Transport means journey identifier
    case CRN = 'CRN';

    // Condition of sale document number
    case CS = 'CS';

    // Team assignment number
    case CST = 'CST';

    // Contract number
    case CT = 'CT';

    // Consignment identifier, consignor assigned
    case CU = 'CU';

    // Container operators reference number
    case CV = 'CV';

    // Package number
    case CW = 'CW';

    // Cooperation contract number
    case CZ = 'CZ';

    // Deferment approval number
    case DA = 'DA';

    // Debit account number
    case DAN = 'DAN';

    // Buyer's debtor number
    case DB = 'DB';

    // Distributor invoice number
    case DI = 'DI';

    // Debit note number
    case DL = 'DL';

    // Document identifier
    case DM = 'DM';

    // Delivery note number
    case DQ = 'DQ';

    // Dock receipt number
    case DR = 'DR';

    // Ending meter reading actual
    case EA = 'EA';

    // Embargo permit number
    case EB = 'EB';

    // Export declaration
    case ED = 'ED';

    // Ending meter reading estimated
    case EE = 'EE';

    // Electrical and electronic equipment producer registration
    case EEP = 'EEP';

    // Employer's identification number
    case EI = 'EI';

    // Embargo number
    case EN = 'EN';

    // Equipment number
    case EQ = 'EQ';

    // Container/equipment receipt number
    case ER = 'ER';

    // Exporter's reference number
    case ERN = 'ERN';

    // Excess transportation number
    case ET = 'ET';

    // Export permit identifier
    case EX = 'EX';

    // Fiscal number
    case FC = 'FC';

    // Consignment identifier, freight forwarder assigned
    case FF = 'FF';

    // File line identifier
    case FI = 'FI';

    // Flow reference number
    case FLW = 'FLW';

    // Freight bill number
    case FN = 'FN';

    // Foreign exchange
    case FO = 'FO';

    // Final sequence number
    case FS = 'FS';

    // Free zone identifier
    case FT = 'FT';

    // File version number
    case FV = 'FV';

    // Foreign exchange contract number
    case FX = 'FX';

    // Standard's number
    case GA = 'GA';

    // Government contract number
    case GC = 'GC';

    // Standard's code number
    case GD = 'GD';

    // General declaration number
    case GDN = 'GDN';

    // Government reference number
    case GN = 'GN';

    // Harmonised system number
    case HS = 'HS';

    // House waybill number
    case HWB = 'HWB';

    // Internal vendor number
    case IA = 'IA';

    // In bond number
    case IB = 'IB';

    // IATA cargo agent code number
    case ICA = 'ICA';

    // Insurance certificate reference number
    case ICE = 'ICE';

    // Insurance contract reference number
    case ICO = 'ICO';

    // Initial sample inspection report number
    case II = 'II';

    // Internal order number
    case IL = 'IL';

    // Intermediary broker
    case INB = 'INB';

    // Interchange number new
    case INN = 'INN';

    // Interchange number old
    case INO = 'INO';

    // Import permit identifier
    case IP = 'IP';

    // Invoice number suffix
    case IS = 'IS';

    // Internal customer number
    case IT = 'IT';

    // Invoice document identifier
    case IV = 'IV';

    // Job number
    case JB = 'JB';

    // Ending job sequence number
    case JE = 'JE';

    // Shipping label serial number
    case LA = 'LA';

    // Loading authorisation identifier
    case LAN = 'LAN';

    // Lower number in range
    case LAR = 'LAR';

    // Lockbox
    case LB = 'LB';

    // Letter of credit number
    case LC = 'LC';

    // Document line identifier
    case LI = 'LI';

    // Load planning number
    case LO = 'LO';

    // Reservation office identifier
    case LRC = 'LRC';

    // Bar coded label serial number
    case LS = 'LS';

    // Ship notice/manifest number
    case MA = 'MA';

    // Master bill of lading number
    case MB = 'MB';

    // Manufacturer's part number
    case MF = 'MF';

    // Meter unit number
    case MG = 'MG';

    // Manufacturing order number
    case MH = 'MH';

    // Message recipient
    case MR = 'MR';

    // Mailing reference number
    case MRN = 'MRN';

    // Message sender
    case MS = 'MS';

    // Manufacturer's material safety data sheet number
    case MSS = 'MSS';

    // Master air waybill number
    case MWB = 'MWB';

    // North American hazardous goods classification number
    case NA = 'NA';

    // Nota Fiscal
    case NF = 'NF';

    // Current invoice number
    case OH = 'OH';

    // Previous invoice number
    case OI = 'OI';

    // Order document identifier, buyer assigned
    case ON = 'ON';

    // Original purchase order
    case OP = 'OP';

    // General order number
    case OR = 'OR';

    // Payer's financial institution account number
    case PB = 'PB';

    // Production code
    case PC = 'PC';

    // Promotion deal number
    case PD = 'PD';

    // Plant number
    case PE = 'PE';

    // Prime contractor contract number
    case PF = 'PF';

    // Price list version number
    case PI = 'PI';

    // Packing list number
    case PK = 'PK';

    // Price list number
    case PL = 'PL';

    // Purchase order response number
    case POR = 'POR';

    // Purchase order change number
    case PP = 'PP';

    // Payment reference
    case PQ = 'PQ';

    // Price quote number
    case PR = 'PR';

    // Purchase order number suffix
    case PS = 'PS';

    // Prior purchase order number
    case PW = 'PW';

    // Payee's financial institution account number
    case PY = 'PY';

    // Remittance advice number
    case RA = 'RA';

    // Rail/road routing code
    case RC = 'RC';

    // Railway consignment note number
    case RCN = 'RCN';

    // Release number
    case RE = 'RE';

    // Consignment receipt identifier
    case REN = 'REN';

    // Export reference number
    case RF = 'RF';

    // Payer's financial institution transit routing No.(ACH
    case RR = 'RR';

    // Payee's financial institution transit routing No.
    case RT = 'RT';

    // Sales person number
    case SA = 'SA';

    // Sales region number
    case SB = 'SB';

    // Sales department number
    case SD = 'SD';

    // Serial number
    case SE = 'SE';

    // Allocated seat
    case SEA = 'SEA';

    // Ship from
    case SF = 'SF';

    // Previous highest schedule number
    case SH = 'SH';

    // SID (Shipper's identifying number for shipment)
    case SI = 'SI';

    // Sales office number
    case SM = 'SM';

    // Transport equipment seal identifier
    case SN = 'SN';

    // Scan line
    case SP = 'SP';

    // Equipment sequence number
    case SQ = 'SQ';

    // Shipment reference number
    case SRN = 'SRN';

    // Sellers reference number
    case SS = 'SS';

    // Station reference number
    case STA = 'STA';

    // Swap order number
    case SW = 'SW';

    // Specification number
    case SZ = 'SZ';

    // Trucker's bill of lading
    case TB = 'TB';

    // Terminal operator's consignment reference
    case TCR = 'TCR';

    // Telex message number
    case TE = 'TE';

    // Transfer number
    case TF = 'TF';

    // TIR carnet number
    case TI = 'TI';

    // Transport instruction number
    case TIN = 'TIN';

    // Tax exemption licence number
    case TL = 'TL';

    // Transaction reference number
    case TN = 'TN';

    // Test report number
    case TP = 'TP';

    // Upper number of range
    case UAR = 'UAR';

    // Ultimate customer's reference number
    case UC = 'UC';

    // Unique consignment reference number
    case UCN = 'UCN';

    // United Nations Dangerous Goods identifier
    case UN = 'UN';

    // Ultimate customer's order number
    case UO = 'UO';

    // Uniform Resource Identifier
    case URI = 'URI';

    // VAT registration number
    case VA = 'VA';

    // Vendor contract number
    case VC = 'VC';

    // Transport equipment gross mass verification reference
    case VGR = 'VGR';

    // Vessel identifier
    case VM = 'VM';

    // Order number (vendor)
    case VN = 'VN';

    // Voyage number
    case VON = 'VON';

    // Transport equipment gross mass verification order reference
    case VOR = 'VOR';

    // Vendor product number
    case VP = 'VP';

    // Vendor ID number
    case VR = 'VR';

    // Vendor order number suffix
    case VS = 'VS';

    // Motor vehicle identification number
    case VT = 'VT';

    // Voucher number
    case VV = 'VV';

    // Warehouse entry number
    case WE = 'WE';

    // Weight agreement number
    case WM = 'WM';

    // Well number
    case WN = 'WN';

    // Warehouse receipt number
    case WR = 'WR';

    // Warehouse storage location number
    case WS = 'WS';

    // Rail waybill number
    case WY = 'WY';

    // Company/place registration number
    case XA = 'XA';

    // Cargo control number
    case XC = 'XC';

    // Previous cargo control number
    case XP = 'XP';

    // Mutually defined reference number
    case ZZZ = 'ZZZ';
}
