<?php

declare(strict_types=1);

namespace easybill\eInvoicing\Enums;

enum UnitCode: string
{
    // group
    case _10 = '10';

    // outfit
    case _11 = '11';

    // ration
    case _13 = '13';

    // shot
    case _14 = '14';

    // stick, military
    case _15 = '15';

    // twenty foot container
    case _20 = '20';

    // forty foot container
    case _21 = '21';

    // decilitre per gram
    case _22 = '22';

    // gram per cubic centimetre
    case _23 = '23';

    // theoretical pound
    case _24 = '24';

    // gram per square centimetre
    case _25 = '25';

    // theoretical ton
    case _27 = '27';

    // kilogram per square metre
    case _28 = '28';

    // kilopascal square metre per gram
    case _33 = '33';

    // kilopascal per millimetre
    case _34 = '34';

    // millilitre per square centimetre second
    case _35 = '35';

    // ounce per square foot
    case _37 = '37';

    // ounce per square foot per 0,01inch
    case _38 = '38';

    // millilitre per second
    case _40 = '40';

    // millilitre per minute
    case _41 = '41';

    // sitas
    case _56 = '56';

    // mesh
    case _57 = '57';

    // net kilogram
    case _58 = '58';

    // part per million
    case _59 = '59';

    // percent weight
    case _60 = '60';

    // part per billion (US)
    case _61 = '61';

    // millipascal
    case _74 = '74';

    // milli-inch
    case _77 = '77';

    // pound per square inch absolute
    case _80 = '80';

    // henry
    case _81 = '81';

    // foot pound-force
    case _85 = '85';

    // pound per cubic foot
    case _87 = '87';

    // poise
    case _89 = '89';

    // stokes
    case _91 = '91';

    // fixed rate
    case _1I = '1I';

    // radian per second
    case _2A = '2A';

    // radian per second squared
    case _2B = '2B';

    // roentgen
    case _2C = '2C';

    // volt AC
    case _2G = '2G';

    // volt DC
    case _2H = '2H';

    // British thermal unit (international table) per hour
    case _2I = '2I';

    // cubic centimetre per second
    case _2J = '2J';

    // cubic foot per hour
    case _2K = '2K';

    // cubic foot per minute
    case _2L = '2L';

    // centimetre per second
    case _2M = '2M';

    // decibel
    case _2N = '2N';

    // kilobyte
    case _2P = '2P';

    // kilobecquerel
    case _2Q = '2Q';

    // kilocurie
    case _2R = '2R';

    // megagram
    case _2U = '2U';

    // metre per minute
    case _2X = '2X';

    // milliroentgen
    case _2Y = '2Y';

    // millivolt
    case _2Z = '2Z';

    // megajoule
    case _3B = '3B';

    // manmonth
    case _3C = '3C';

    // centistokes
    case _4C = '4C';

    // microlitre
    case _4G = '4G';

    // micrometre (micron)
    case _4H = '4H';

    // milliampere
    case _4K = '4K';

    // megabyte
    case _4L = '4L';

    // milligram per hour
    case _4M = '4M';

    // megabecquerel
    case _4N = '4N';

    // microfarad
    case _4O = '4O';

    // newton per metre
    case _4P = '4P';

    // ounce inch
    case _4Q = '4Q';

    // ounce foot
    case _4R = '4R';

    // picofarad
    case _4T = '4T';

    // pound per hour
    case _4U = '4U';

    // ton (US) per hour
    case _4W = '4W';

    // kilolitre per hour
    case _4X = '4X';

    // barrel (US) per minute
    case _5A = '5A';

    // batch
    case _5B = '5B';

    // MMSCF/day
    case _5E = '5E';

    // hydraulic horse power
    case _5J = '5J';

    // ampere square metre per joule second
    case A10 = 'A10';

    // angstrom
    case A11 = 'A11';

    // astronomical unit
    case A12 = 'A12';

    // attojoule
    case A13 = 'A13';

    // barn
    case A14 = 'A14';

    // barn per electronvolt
    case A15 = 'A15';

    // barn per steradian electronvolt
    case A16 = 'A16';

    // barn per steradian
    case A17 = 'A17';

    // becquerel per kilogram
    case A18 = 'A18';

    // becquerel per cubic metre
    case A19 = 'A19';

    // ampere per centimetre
    case A2 = 'A2';

    // British thermal unit (international table) per second square foot degree Rankine
    case A20 = 'A20';

    // British thermal unit (international table) per pound degree Rankine
    case A21 = 'A21';

    // British thermal unit (international table) per second foot degree Rankine
    case A22 = 'A22';

    // British thermal unit (international table) per hour square foot degree Rankine
    case A23 = 'A23';

    // candela per square metre
    case A24 = 'A24';

    // coulomb metre
    case A26 = 'A26';

    // coulomb metre squared per volt
    case A27 = 'A27';

    // coulomb per cubic centimetre
    case A28 = 'A28';

    // coulomb per cubic metre
    case A29 = 'A29';

    // ampere per millimetre
    case A3 = 'A3';

    // coulomb per cubic millimetre
    case A30 = 'A30';

    // coulomb per kilogram second
    case A31 = 'A31';

    // coulomb per mole
    case A32 = 'A32';

    // coulomb per square centimetre
    case A33 = 'A33';

    // coulomb per square metre
    case A34 = 'A34';

    // coulomb per square millimetre
    case A35 = 'A35';

    // cubic centimetre per mole
    case A36 = 'A36';

    // cubic decimetre per mole
    case A37 = 'A37';

    // cubic metre per coulomb
    case A38 = 'A38';

    // cubic metre per kilogram
    case A39 = 'A39';

    // ampere per square centimetre
    case A4 = 'A4';

    // cubic metre per mole
    case A40 = 'A40';

    // ampere per square metre
    case A41 = 'A41';

    // curie per kilogram
    case A42 = 'A42';

    // deadweight tonnage
    case A43 = 'A43';

    // decalitre
    case A44 = 'A44';

    // decametre
    case A45 = 'A45';

    // decitex
    case A47 = 'A47';

    // degree Rankine
    case A48 = 'A48';

    // denier
    case A49 = 'A49';

    // ampere square metre
    case A5 = 'A5';

    // electronvolt
    case A53 = 'A53';

    // electronvolt per metre
    case A54 = 'A54';

    // electronvolt square metre
    case A55 = 'A55';

    // electronvolt square metre per kilogram
    case A56 = 'A56';

    // 8-part cloud cover
    case A59 = 'A59';

    // ampere per square metre kelvin squared
    case A6 = 'A6';

    // exajoule
    case A68 = 'A68';

    // farad per metre
    case A69 = 'A69';

    // ampere per square millimetre
    case A7 = 'A7';

    // femtojoule
    case A70 = 'A70';

    // femtometre
    case A71 = 'A71';

    // foot per second squared
    case A73 = 'A73';

    // foot pound-force per second
    case A74 = 'A74';

    // freight ton
    case A75 = 'A75';

    // gal
    case A76 = 'A76';

    // ampere second
    case A8 = 'A8';

    // gigacoulomb per cubic metre
    case A84 = 'A84';

    // gigaelectronvolt
    case A85 = 'A85';

    // gigahertz
    case A86 = 'A86';

    // gigaohm
    case A87 = 'A87';

    // gigaohm metre
    case A88 = 'A88';

    // gigapascal
    case A89 = 'A89';

    // rate
    case A9 = 'A9';

    // gigawatt
    case A90 = 'A90';

    // gon
    case A91 = 'A91';

    // gram per cubic metre
    case A93 = 'A93';

    // gram per mole
    case A94 = 'A94';

    // gray
    case A95 = 'A95';

    // gray per second
    case A96 = 'A96';

    // hectopascal
    case A97 = 'A97';

    // henry per metre
    case A98 = 'A98';

    // bit
    case A99 = 'A99';

    // ball
    case AA = 'AA';

    // bulk pack
    case AB = 'AB';

    // acre
    case ACR = 'ACR';

    // activity
    case ACT = 'ACT';

    // byte
    case AD = 'AD';

    // ampere per metre
    case AE = 'AE';

    // additional minute
    case AH = 'AH';

    // average minute per call
    case AI = 'AI';

    // fathom
    case AK = 'AK';

    // access line
    case AL = 'AL';

    // ampere hour
    case AMH = 'AMH';

    // ampere
    case AMP = 'AMP';

    // year
    case ANN = 'ANN';

    // troy ounce or apothecary ounce
    case APZ = 'APZ';

    // anti-hemophilic factor (AHF) unit
    case AQ = 'AQ';

    // assortment
    case AS = 'AS';

    // alcoholic strength by mass
    case ASM = 'ASM';

    // alcoholic strength by volume
    case ASU = 'ASU';

    // standard atmosphere
    case ATM = 'ATM';

    // american wire gauge
    case AWG = 'AWG';

    // assembly
    case AY = 'AY';

    // British thermal unit (international table) per pound
    case AZ = 'AZ';

    // barrel (US) per day
    case B1 = 'B1';

    // bit per second
    case B10 = 'B10';

    // joule per kilogram kelvin
    case B11 = 'B11';

    // joule per metre
    case B12 = 'B12';

    // joule per square metre
    case B13 = 'B13';

    // joule per metre to the fourth power
    case B14 = 'B14';

    // joule per mole
    case B15 = 'B15';

    // joule per mole kelvin
    case B16 = 'B16';

    // credit
    case B17 = 'B17';

    // joule second
    case B18 = 'B18';

    // digit
    case B19 = 'B19';

    // joule square metre per kilogram
    case B20 = 'B20';

    // kelvin per watt
    case B21 = 'B21';

    // kiloampere
    case B22 = 'B22';

    // kiloampere per square metre
    case B23 = 'B23';

    // kiloampere per metre
    case B24 = 'B24';

    // kilobecquerel per kilogram
    case B25 = 'B25';

    // kilocoulomb
    case B26 = 'B26';

    // kilocoulomb per cubic metre
    case B27 = 'B27';

    // kilocoulomb per square metre
    case B28 = 'B28';

    // kiloelectronvolt
    case B29 = 'B29';

    // batting pound
    case B3 = 'B3';

    // gibibit
    case B30 = 'B30';

    // kilogram metre per second
    case B31 = 'B31';

    // kilogram metre squared
    case B32 = 'B32';

    // kilogram metre squared per second
    case B33 = 'B33';

    // kilogram per cubic decimetre
    case B34 = 'B34';

    // kilogram per litre
    case B35 = 'B35';

    // barrel, imperial
    case B4 = 'B4';

    // kilojoule per kelvin
    case B41 = 'B41';

    // kilojoule per kilogram
    case B42 = 'B42';

    // kilojoule per kilogram kelvin
    case B43 = 'B43';

    // kilojoule per mole
    case B44 = 'B44';

    // kilomole
    case B45 = 'B45';

    // kilomole per cubic metre
    case B46 = 'B46';

    // kilonewton
    case B47 = 'B47';

    // kilonewton metre
    case B48 = 'B48';

    // kiloohm
    case B49 = 'B49';

    // kiloohm metre
    case B50 = 'B50';

    // kilosecond
    case B52 = 'B52';

    // kilosiemens
    case B53 = 'B53';

    // kilosiemens per metre
    case B54 = 'B54';

    // kilovolt per metre
    case B55 = 'B55';

    // kiloweber per metre
    case B56 = 'B56';

    // light year
    case B57 = 'B57';

    // litre per mole
    case B58 = 'B58';

    // lumen hour
    case B59 = 'B59';

    // lumen per square metre
    case B60 = 'B60';

    // lumen per watt
    case B61 = 'B61';

    // lumen second
    case B62 = 'B62';

    // lux hour
    case B63 = 'B63';

    // lux second
    case B64 = 'B64';

    // megaampere per square metre
    case B66 = 'B66';

    // megabecquerel per kilogram
    case B67 = 'B67';

    // gigabit
    case B68 = 'B68';

    // megacoulomb per cubic metre
    case B69 = 'B69';

    // cycle
    case B7 = 'B7';

    // megacoulomb per square metre
    case B70 = 'B70';

    // megaelectronvolt
    case B71 = 'B71';

    // megagram per cubic metre
    case B72 = 'B72';

    // meganewton
    case B73 = 'B73';

    // meganewton metre
    case B74 = 'B74';

    // megaohm
    case B75 = 'B75';

    // megaohm metre
    case B76 = 'B76';

    // megasiemens per metre
    case B77 = 'B77';

    // megavolt
    case B78 = 'B78';

    // megavolt per metre
    case B79 = 'B79';

    // joule per cubic metre
    case B8 = 'B8';

    // gigabit per second
    case B80 = 'B80';

    // reciprocal metre squared reciprocal second
    case B81 = 'B81';

    // inch per linear foot
    case B82 = 'B82';

    // metre to the fourth power
    case B83 = 'B83';

    // microampere
    case B84 = 'B84';

    // microbar
    case B85 = 'B85';

    // microcoulomb
    case B86 = 'B86';

    // microcoulomb per cubic metre
    case B87 = 'B87';

    // microcoulomb per square metre
    case B88 = 'B88';

    // microfarad per metre
    case B89 = 'B89';

    // microhenry
    case B90 = 'B90';

    // microhenry per metre
    case B91 = 'B91';

    // micronewton
    case B92 = 'B92';

    // micronewton metre
    case B93 = 'B93';

    // microohm
    case B94 = 'B94';

    // microohm metre
    case B95 = 'B95';

    // micropascal
    case B96 = 'B96';

    // microradian
    case B97 = 'B97';

    // microsecond
    case B98 = 'B98';

    // microsiemens
    case B99 = 'B99';

    // bar [unit of pressure]
    case BAR = 'BAR';

    // base box
    case BB = 'BB';

    // board foot
    case BFT = 'BFT';

    // brake horse power
    case BHP = 'BHP';

    // billion (EUR)
    case BIL = 'BIL';

    // dry barrel (US)
    case BLD = 'BLD';

    // barrel (US)
    case BLL = 'BLL';

    // hundred board foot
    case BP = 'BP';

    // beats per minute
    case BPM = 'BPM';

    // becquerel
    case BQL = 'BQL';

    // British thermal unit (international table)
    case BTU = 'BTU';

    // bushel (US)
    case BUA = 'BUA';

    // bushel (UK)
    case BUI = 'BUI';

    // call
    case C0 = 'C0';

    // millifarad
    case C10 = 'C10';

    // milligal
    case C11 = 'C11';

    // milligram per metre
    case C12 = 'C12';

    // milligray
    case C13 = 'C13';

    // millihenry
    case C14 = 'C14';

    // millijoule
    case C15 = 'C15';

    // millimetre per second
    case C16 = 'C16';

    // millimetre squared per second
    case C17 = 'C17';

    // millimole
    case C18 = 'C18';

    // mole per kilogram
    case C19 = 'C19';

    // millinewton
    case C20 = 'C20';

    // kibibit
    case C21 = 'C21';

    // millinewton per metre
    case C22 = 'C22';

    // milliohm metre
    case C23 = 'C23';

    // millipascal second
    case C24 = 'C24';

    // milliradian
    case C25 = 'C25';

    // millisecond
    case C26 = 'C26';

    // millisiemens
    case C27 = 'C27';

    // millisievert
    case C28 = 'C28';

    // millitesla
    case C29 = 'C29';

    // microvolt per metre
    case C3 = 'C3';

    // millivolt per metre
    case C30 = 'C30';

    // milliwatt
    case C31 = 'C31';

    // milliwatt per square metre
    case C32 = 'C32';

    // milliweber
    case C33 = 'C33';

    // mole
    case C34 = 'C34';

    // mole per cubic decimetre
    case C35 = 'C35';

    // mole per cubic metre
    case C36 = 'C36';

    // kilobit
    case C37 = 'C37';

    // mole per litre
    case C38 = 'C38';

    // nanoampere
    case C39 = 'C39';

    // nanocoulomb
    case C40 = 'C40';

    // nanofarad
    case C41 = 'C41';

    // nanofarad per metre
    case C42 = 'C42';

    // nanohenry
    case C43 = 'C43';

    // nanohenry per metre
    case C44 = 'C44';

    // nanometre
    case C45 = 'C45';

    // nanoohm metre
    case C46 = 'C46';

    // nanosecond
    case C47 = 'C47';

    // nanotesla
    case C48 = 'C48';

    // nanowatt
    case C49 = 'C49';

    // neper
    case C50 = 'C50';

    // neper per second
    case C51 = 'C51';

    // picometre
    case C52 = 'C52';

    // newton metre second
    case C53 = 'C53';

    // newton metre squared per kilogram squared
    case C54 = 'C54';

    // newton per square metre
    case C55 = 'C55';

    // newton per square millimetre
    case C56 = 'C56';

    // newton second
    case C57 = 'C57';

    // newton second per metre
    case C58 = 'C58';

    // octave
    case C59 = 'C59';

    // ohm centimetre
    case C60 = 'C60';

    // ohm metre
    case C61 = 'C61';

    // one
    case C62 = 'C62';

    // parsec
    case C63 = 'C63';

    // pascal per kelvin
    case C64 = 'C64';

    // pascal second
    case C65 = 'C65';

    // pascal second per cubic metre
    case C66 = 'C66';

    // pascal second per metre
    case C67 = 'C67';

    // petajoule
    case C68 = 'C68';

    // phon
    case C69 = 'C69';

    // centipoise
    case C7 = 'C7';

    // picoampere
    case C70 = 'C70';

    // picocoulomb
    case C71 = 'C71';

    // picofarad per metre
    case C72 = 'C72';

    // picohenry
    case C73 = 'C73';

    // kilobit per second
    case C74 = 'C74';

    // picowatt
    case C75 = 'C75';

    // picowatt per square metre
    case C76 = 'C76';

    // pound-force
    case C78 = 'C78';

    // kilovolt ampere hour
    case C79 = 'C79';

    // millicoulomb per kilogram
    case C8 = 'C8';

    // rad
    case C80 = 'C80';

    // radian
    case C81 = 'C81';

    // radian square metre per mole
    case C82 = 'C82';

    // radian square metre per kilogram
    case C83 = 'C83';

    // radian per metre
    case C84 = 'C84';

    // reciprocal angstrom
    case C85 = 'C85';

    // reciprocal cubic metre
    case C86 = 'C86';

    // reciprocal cubic metre per second
    case C87 = 'C87';

    // reciprocal electron volt per cubic metre
    case C88 = 'C88';

    // reciprocal henry
    case C89 = 'C89';

    // coil group
    case C9 = 'C9';

    // reciprocal joule per cubic metre
    case C90 = 'C90';

    // reciprocal kelvin or kelvin to the power minus one
    case C91 = 'C91';

    // reciprocal metre
    case C92 = 'C92';

    // reciprocal square metre
    case C93 = 'C93';

    // reciprocal minute
    case C94 = 'C94';

    // reciprocal mole
    case C95 = 'C95';

    // reciprocal pascal or pascal to the power minus one
    case C96 = 'C96';

    // reciprocal second
    case C97 = 'C97';

    // reciprocal second per metre squared
    case C99 = 'C99';

    // carrying capacity in metric ton
    case CCT = 'CCT';

    // candela
    case CDL = 'CDL';

    // degree Celsius
    case CEL = 'CEL';

    // hundred
    case CEN = 'CEN';

    // card
    case CG = 'CG';

    // centigram
    case CGM = 'CGM';

    // coulomb per kilogram
    case CKG = 'CKG';

    // hundred leave
    case CLF = 'CLF';

    // centilitre
    case CLT = 'CLT';

    // square centimetre
    case CMK = 'CMK';

    // cubic centimetre
    case CMQ = 'CMQ';

    // centimetre
    case CMT = 'CMT';

    // hundred pack
    case CNP = 'CNP';

    // cental (UK)
    case CNT = 'CNT';

    // coulomb
    case COU = 'COU';

    // content gram
    case CTG = 'CTG';

    // metric carat
    case CTM = 'CTM';

    // content ton (metric)
    case CTN = 'CTN';

    // curie
    case CUR = 'CUR';

    // hundred pound (cwt) / hundred weight (US)
    case CWA = 'CWA';

    // hundred weight (UK)
    case CWI = 'CWI';

    // kilowatt hour per hour
    case D03 = 'D03';

    // lot  [unit of weight]
    case D04 = 'D04';

    // reciprocal second per steradian
    case D1 = 'D1';

    // siemens per metre
    case D10 = 'D10';

    // mebibit
    case D11 = 'D11';

    // siemens square metre per mole
    case D12 = 'D12';

    // sievert
    case D13 = 'D13';

    // sone
    case D15 = 'D15';

    // square centimetre per erg
    case D16 = 'D16';

    // square centimetre per steradian erg
    case D17 = 'D17';

    // metre kelvin
    case D18 = 'D18';

    // square metre kelvin per watt
    case D19 = 'D19';

    // reciprocal second per steradian metre squared
    case D2 = 'D2';

    // square metre per joule
    case D20 = 'D20';

    // square metre per kilogram
    case D21 = 'D21';

    // square metre per mole
    case D22 = 'D22';

    // pen gram (protein)
    case D23 = 'D23';

    // square metre per steradian
    case D24 = 'D24';

    // square metre per steradian joule
    case D25 = 'D25';

    // square metre per volt second
    case D26 = 'D26';

    // steradian
    case D27 = 'D27';

    // terahertz
    case D29 = 'D29';

    // terajoule
    case D30 = 'D30';

    // terawatt
    case D31 = 'D31';

    // terawatt hour
    case D32 = 'D32';

    // tesla
    case D33 = 'D33';

    // tex
    case D34 = 'D34';

    // megabit
    case D36 = 'D36';

    // tonne per cubic metre
    case D41 = 'D41';

    // tropical year
    case D42 = 'D42';

    // unified atomic mass unit
    case D43 = 'D43';

    // var
    case D44 = 'D44';

    // volt squared per kelvin squared
    case D45 = 'D45';

    // volt - ampere
    case D46 = 'D46';

    // volt per centimetre
    case D47 = 'D47';

    // volt per kelvin
    case D48 = 'D48';

    // millivolt per kelvin
    case D49 = 'D49';

    // kilogram per square centimetre
    case D5 = 'D5';

    // volt per metre
    case D50 = 'D50';

    // volt per millimetre
    case D51 = 'D51';

    // watt per kelvin
    case D52 = 'D52';

    // watt per metre kelvin
    case D53 = 'D53';

    // watt per square metre
    case D54 = 'D54';

    // watt per square metre kelvin
    case D55 = 'D55';

    // watt per square metre kelvin to the fourth power
    case D56 = 'D56';

    // watt per steradian
    case D57 = 'D57';

    // watt per steradian square metre
    case D58 = 'D58';

    // weber per metre
    case D59 = 'D59';

    // roentgen per second
    case D6 = 'D6';

    // weber per millimetre
    case D60 = 'D60';

    // minute [unit of angle]
    case D61 = 'D61';

    // second [unit of angle]
    case D62 = 'D62';

    // book
    case D63 = 'D63';

    // round
    case D65 = 'D65';

    // number of words
    case D68 = 'D68';

    // inch to the fourth power
    case D69 = 'D69';

    // joule square metre
    case D73 = 'D73';

    // kilogram per mole
    case D74 = 'D74';

    // megacoulomb
    case D77 = 'D77';

    // megajoule per second
    case D78 = 'D78';

    // microwatt
    case D80 = 'D80';

    // microtesla
    case D81 = 'D81';

    // microvolt
    case D82 = 'D82';

    // millinewton metre
    case D83 = 'D83';

    // microwatt per square metre
    case D85 = 'D85';

    // millicoulomb
    case D86 = 'D86';

    // millimole per kilogram
    case D87 = 'D87';

    // millicoulomb per cubic metre
    case D88 = 'D88';

    // millicoulomb per square metre
    case D89 = 'D89';

    // rem
    case D91 = 'D91';

    // second per cubic metre
    case D93 = 'D93';

    // second per cubic metre radian
    case D94 = 'D94';

    // joule per gram
    case D95 = 'D95';

    // decare
    case DAA = 'DAA';

    // ten day
    case DAD = 'DAD';

    // day
    case DAY = 'DAY';

    // dry pound
    case DB = 'DB';

    // Decibel-milliwatts
    case DBM = 'DBM';

    // Decibel watt
    case DBW = 'DBW';

    // degree [unit of angle]
    case DD = 'DD';

    // decade
    case DEC = 'DEC';

    // decigram
    case DG = 'DG';

    // decagram
    case DJ = 'DJ';

    // decilitre
    case DLT = 'DLT';

    // cubic decametre
    case DMA = 'DMA';

    // square decimetre
    case DMK = 'DMK';

    // standard kilolitre
    case DMO = 'DMO';

    // cubic decimetre
    case DMQ = 'DMQ';

    // decimetre
    case DMT = 'DMT';

    // decinewton metre
    case DN = 'DN';

    // dozen piece
    case DPC = 'DPC';

    // dozen pair
    case DPR = 'DPR';

    // displacement tonnage
    case DPT = 'DPT';

    // dram (US)
    case DRA = 'DRA';

    // dram (UK)
    case DRI = 'DRI';

    // dozen roll
    case DRL = 'DRL';

    // dry ton
    case DT = 'DT';

    // decitonne
    case DTN = 'DTN';

    // pennyweight
    case DWT = 'DWT';

    // dozen
    case DZN = 'DZN';

    // dozen pack
    case DZP = 'DZP';

    // newton per square centimetre
    case E01 = 'E01';

    // megawatt hour per hour
    case E07 = 'E07';

    // megawatt per hertz
    case E08 = 'E08';

    // milliampere hour
    case E09 = 'E09';

    // degree day
    case E10 = 'E10';

    // mille
    case E12 = 'E12';

    // kilocalorie (international table)
    case E14 = 'E14';

    // kilocalorie (thermochemical) per hour
    case E15 = 'E15';

    // million Btu(IT) per hour
    case E16 = 'E16';

    // cubic foot per second
    case E17 = 'E17';

    // tonne per hour
    case E18 = 'E18';

    // ping
    case E19 = 'E19';

    // megabit per second
    case E20 = 'E20';

    // shares
    case E21 = 'E21';

    // TEU
    case E22 = 'E22';

    // tyre
    case E23 = 'E23';

    // active unit
    case E25 = 'E25';

    // dose
    case E27 = 'E27';

    // air dry ton
    case E28 = 'E28';

    // strand
    case E30 = 'E30';

    // square metre per litre
    case E31 = 'E31';

    // litre per hour
    case E32 = 'E32';

    // foot per thousand
    case E33 = 'E33';

    // gigabyte
    case E34 = 'E34';

    // terabyte
    case E35 = 'E35';

    // petabyte
    case E36 = 'E36';

    // pixel
    case E37 = 'E37';

    // megapixel
    case E38 = 'E38';

    // dots per inch
    case E39 = 'E39';

    // gross kilogram
    case E4 = 'E4';

    // part per hundred thousand
    case E40 = 'E40';

    // kilogram-force per square millimetre
    case E41 = 'E41';

    // kilogram-force per square centimetre
    case E42 = 'E42';

    // joule per square centimetre
    case E43 = 'E43';

    // kilogram-force metre per square centimetre
    case E44 = 'E44';

    // milliohm
    case E45 = 'E45';

    // kilowatt hour per cubic metre
    case E46 = 'E46';

    // kilowatt hour per kelvin
    case E47 = 'E47';

    // service unit
    case E48 = 'E48';

    // working day
    case E49 = 'E49';

    // accounting unit
    case E50 = 'E50';

    // job
    case E51 = 'E51';

    // run foot
    case E52 = 'E52';

    // test
    case E53 = 'E53';

    // trip
    case E54 = 'E54';

    // use
    case E55 = 'E55';

    // well
    case E56 = 'E56';

    // zone
    case E57 = 'E57';

    // exabit per second
    case E58 = 'E58';

    // exbibyte
    case E59 = 'E59';

    // pebibyte
    case E60 = 'E60';

    // tebibyte
    case E61 = 'E61';

    // gibibyte
    case E62 = 'E62';

    // mebibyte
    case E63 = 'E63';

    // kibibyte
    case E64 = 'E64';

    // exbibit per metre
    case E65 = 'E65';

    // exbibit per square metre
    case E66 = 'E66';

    // exbibit per cubic metre
    case E67 = 'E67';

    // gigabyte per second
    case E68 = 'E68';

    // gibibit per metre
    case E69 = 'E69';

    // gibibit per square metre
    case E70 = 'E70';

    // gibibit per cubic metre
    case E71 = 'E71';

    // kibibit per metre
    case E72 = 'E72';

    // kibibit per square metre
    case E73 = 'E73';

    // kibibit per cubic metre
    case E74 = 'E74';

    // mebibit per metre
    case E75 = 'E75';

    // mebibit per square metre
    case E76 = 'E76';

    // mebibit per cubic metre
    case E77 = 'E77';

    // petabit
    case E78 = 'E78';

    // petabit per second
    case E79 = 'E79';

    // pebibit per metre
    case E80 = 'E80';

    // pebibit per square metre
    case E81 = 'E81';

    // pebibit per cubic metre
    case E82 = 'E82';

    // terabit
    case E83 = 'E83';

    // terabit per second
    case E84 = 'E84';

    // tebibit per metre
    case E85 = 'E85';

    // tebibit per cubic metre
    case E86 = 'E86';

    // tebibit per square metre
    case E87 = 'E87';

    // bit per metre
    case E88 = 'E88';

    // bit per square metre
    case E89 = 'E89';

    // reciprocal centimetre
    case E90 = 'E90';

    // reciprocal day
    case E91 = 'E91';

    // cubic decimetre per hour
    case E92 = 'E92';

    // kilogram per hour
    case E93 = 'E93';

    // kilomole per second
    case E94 = 'E94';

    // mole per second
    case E95 = 'E95';

    // degree per second
    case E96 = 'E96';

    // millimetre per degree Celcius metre
    case E97 = 'E97';

    // degree Celsius per kelvin
    case E98 = 'E98';

    // hectopascal per bar
    case E99 = 'E99';

    // each
    case EA = 'EA';

    // electronic mail box
    case EB = 'EB';

    // equivalent gallon
    case EQ = 'EQ';

    // bit per cubic metre
    case F01 = 'F01';

    // kelvin per kelvin
    case F02 = 'F02';

    // kilopascal per bar
    case F03 = 'F03';

    // millibar per bar
    case F04 = 'F04';

    // megapascal per bar
    case F05 = 'F05';

    // poise per bar
    case F06 = 'F06';

    // pascal per bar
    case F07 = 'F07';

    // milliampere per inch
    case F08 = 'F08';

    // kelvin per hour
    case F10 = 'F10';

    // kelvin per minute
    case F11 = 'F11';

    // kelvin per second
    case F12 = 'F12';

    // slug
    case F13 = 'F13';

    // gram per kelvin
    case F14 = 'F14';

    // kilogram per kelvin
    case F15 = 'F15';

    // milligram per kelvin
    case F16 = 'F16';

    // pound-force per foot
    case F17 = 'F17';

    // kilogram square centimetre
    case F18 = 'F18';

    // kilogram square millimetre
    case F19 = 'F19';

    // pound inch squared
    case F20 = 'F20';

    // pound-force inch
    case F21 = 'F21';

    // pound-force foot per ampere
    case F22 = 'F22';

    // gram per cubic decimetre
    case F23 = 'F23';

    // kilogram per kilomol
    case F24 = 'F24';

    // gram per hertz
    case F25 = 'F25';

    // gram per day
    case F26 = 'F26';

    // gram per hour
    case F27 = 'F27';

    // gram per minute
    case F28 = 'F28';

    // gram per second
    case F29 = 'F29';

    // kilogram per day
    case F30 = 'F30';

    // kilogram per minute
    case F31 = 'F31';

    // milligram per day
    case F32 = 'F32';

    // milligram per minute
    case F33 = 'F33';

    // milligram per second
    case F34 = 'F34';

    // gram per day kelvin
    case F35 = 'F35';

    // gram per hour kelvin
    case F36 = 'F36';

    // gram per minute kelvin
    case F37 = 'F37';

    // gram per second kelvin
    case F38 = 'F38';

    // kilogram per day kelvin
    case F39 = 'F39';

    // kilogram per hour kelvin
    case F40 = 'F40';

    // kilogram per minute kelvin
    case F41 = 'F41';

    // kilogram per second kelvin
    case F42 = 'F42';

    // milligram per day kelvin
    case F43 = 'F43';

    // milligram per hour kelvin
    case F44 = 'F44';

    // milligram per minute kelvin
    case F45 = 'F45';

    // milligram per second kelvin
    case F46 = 'F46';

    // newton per millimetre
    case F47 = 'F47';

    // pound-force per inch
    case F48 = 'F48';

    // rod [unit of distance]
    case F49 = 'F49';

    // micrometre per kelvin
    case F50 = 'F50';

    // centimetre per kelvin
    case F51 = 'F51';

    // metre per kelvin
    case F52 = 'F52';

    // millimetre per kelvin
    case F53 = 'F53';

    // milliohm per metre
    case F54 = 'F54';

    // ohm per mile (statute mile)
    case F55 = 'F55';

    // ohm per kilometre
    case F56 = 'F56';

    // milliampere per pound-force per square inch
    case F57 = 'F57';

    // reciprocal bar
    case F58 = 'F58';

    // milliampere per bar
    case F59 = 'F59';

    // degree Celsius per bar
    case F60 = 'F60';

    // kelvin per bar
    case F61 = 'F61';

    // gram per day bar
    case F62 = 'F62';

    // gram per hour bar
    case F63 = 'F63';

    // gram per minute bar
    case F64 = 'F64';

    // gram per second bar
    case F65 = 'F65';

    // kilogram per day bar
    case F66 = 'F66';

    // kilogram per hour bar
    case F67 = 'F67';

    // kilogram per minute bar
    case F68 = 'F68';

    // kilogram per second bar
    case F69 = 'F69';

    // milligram per day bar
    case F70 = 'F70';

    // milligram per hour bar
    case F71 = 'F71';

    // milligram per minute bar
    case F72 = 'F72';

    // milligram per second bar
    case F73 = 'F73';

    // gram per bar
    case F74 = 'F74';

    // milligram per bar
    case F75 = 'F75';

    // milliampere per millimetre
    case F76 = 'F76';

    // pascal second per kelvin
    case F77 = 'F77';

    // inch of water
    case F78 = 'F78';

    // inch of mercury
    case F79 = 'F79';

    // water horse power
    case F80 = 'F80';

    // bar per kelvin
    case F81 = 'F81';

    // hectopascal per kelvin
    case F82 = 'F82';

    // kilopascal per kelvin
    case F83 = 'F83';

    // millibar per kelvin
    case F84 = 'F84';

    // megapascal per kelvin
    case F85 = 'F85';

    // poise per kelvin
    case F86 = 'F86';

    // volt per litre minute
    case F87 = 'F87';

    // newton centimetre
    case F88 = 'F88';

    // newton metre per degree
    case F89 = 'F89';

    // newton metre per ampere
    case F90 = 'F90';

    // bar litre per second
    case F91 = 'F91';

    // bar cubic metre per second
    case F92 = 'F92';

    // hectopascal litre per second
    case F93 = 'F93';

    // hectopascal cubic metre per second
    case F94 = 'F94';

    // millibar litre per second
    case F95 = 'F95';

    // millibar cubic metre per second
    case F96 = 'F96';

    // megapascal litre per second
    case F97 = 'F97';

    // megapascal cubic metre per second
    case F98 = 'F98';

    // pascal litre per second
    case F99 = 'F99';

    // degree Fahrenheit
    case FAH = 'FAH';

    // farad
    case FAR = 'FAR';

    // fibre metre
    case FBM = 'FBM';

    // thousand cubic foot
    case FC = 'FC';

    // hundred cubic metre
    case FF = 'FF';

    // micromole
    case FH = 'FH';

    // failures in time
    case FIT = 'FIT';

    // flake ton
    case FL = 'FL';

    // Formazin nephelometric unit
    case FNU = 'FNU';

    // foot
    case FOT = 'FOT';

    // pound per square foot
    case FP = 'FP';

    // foot per minute
    case FR = 'FR';

    // foot per second
    case FS = 'FS';

    // square foot
    case FTK = 'FTK';

    // cubic foot
    case FTQ = 'FTQ';

    // pascal cubic metre per second
    case G01 = 'G01';

    // centimetre per bar
    case G04 = 'G04';

    // metre per bar
    case G05 = 'G05';

    // millimetre per bar
    case G06 = 'G06';

    // square inch per second
    case G08 = 'G08';

    // square metre per second kelvin
    case G09 = 'G09';

    // stokes per kelvin
    case G10 = 'G10';

    // gram per cubic centimetre bar
    case G11 = 'G11';

    // gram per cubic decimetre bar
    case G12 = 'G12';

    // gram per litre bar
    case G13 = 'G13';

    // gram per cubic metre bar
    case G14 = 'G14';

    // gram per millilitre bar
    case G15 = 'G15';

    // kilogram per cubic centimetre bar
    case G16 = 'G16';

    // kilogram per litre bar
    case G17 = 'G17';

    // kilogram per cubic metre bar
    case G18 = 'G18';

    // newton metre per kilogram
    case G19 = 'G19';

    // US gallon per minute
    case G2 = 'G2';

    // pound-force foot per pound
    case G20 = 'G20';

    // cup [unit of volume]
    case G21 = 'G21';

    // peck
    case G23 = 'G23';

    // tablespoon (US)
    case G24 = 'G24';

    // teaspoon (US)
    case G25 = 'G25';

    // stere
    case G26 = 'G26';

    // cubic centimetre per kelvin
    case G27 = 'G27';

    // litre per kelvin
    case G28 = 'G28';

    // cubic metre per kelvin
    case G29 = 'G29';

    // Imperial gallon per minute
    case G3 = 'G3';

    // millilitre per kelvin
    case G30 = 'G30';

    // kilogram per cubic centimetre
    case G31 = 'G31';

    // ounce (avoirdupois) per cubic yard
    case G32 = 'G32';

    // gram per cubic centimetre kelvin
    case G33 = 'G33';

    // gram per cubic decimetre kelvin
    case G34 = 'G34';

    // gram per litre kelvin
    case G35 = 'G35';

    // gram per cubic metre kelvin
    case G36 = 'G36';

    // gram per millilitre kelvin
    case G37 = 'G37';

    // kilogram per cubic centimetre kelvin
    case G38 = 'G38';

    // kilogram per litre kelvin
    case G39 = 'G39';

    // kilogram per cubic metre kelvin
    case G40 = 'G40';

    // square metre per second bar
    case G41 = 'G41';

    // microsiemens per centimetre
    case G42 = 'G42';

    // microsiemens per metre
    case G43 = 'G43';

    // nanosiemens per centimetre
    case G44 = 'G44';

    // nanosiemens per metre
    case G45 = 'G45';

    // stokes per bar
    case G46 = 'G46';

    // cubic centimetre per day
    case G47 = 'G47';

    // cubic centimetre per hour
    case G48 = 'G48';

    // cubic centimetre per minute
    case G49 = 'G49';

    // gallon (US) per hour
    case G50 = 'G50';

    // litre per second
    case G51 = 'G51';

    // cubic metre per day
    case G52 = 'G52';

    // cubic metre per minute
    case G53 = 'G53';

    // millilitre per day
    case G54 = 'G54';

    // millilitre per hour
    case G55 = 'G55';

    // cubic inch per hour
    case G56 = 'G56';

    // cubic inch per minute
    case G57 = 'G57';

    // cubic inch per second
    case G58 = 'G58';

    // milliampere per litre minute
    case G59 = 'G59';

    // volt per bar
    case G60 = 'G60';

    // cubic centimetre per day kelvin
    case G61 = 'G61';

    // cubic centimetre per hour kelvin
    case G62 = 'G62';

    // cubic centimetre per minute kelvin
    case G63 = 'G63';

    // cubic centimetre per second kelvin
    case G64 = 'G64';

    // litre per day kelvin
    case G65 = 'G65';

    // litre per hour kelvin
    case G66 = 'G66';

    // litre per minute kelvin
    case G67 = 'G67';

    // litre per second kelvin
    case G68 = 'G68';

    // cubic metre per day kelvin
    case G69 = 'G69';

    // cubic metre per hour kelvin
    case G70 = 'G70';

    // cubic metre per minute kelvin
    case G71 = 'G71';

    // cubic metre per second kelvin
    case G72 = 'G72';

    // millilitre per day kelvin
    case G73 = 'G73';

    // millilitre per hour kelvin
    case G74 = 'G74';

    // millilitre per minute kelvin
    case G75 = 'G75';

    // millilitre per second kelvin
    case G76 = 'G76';

    // millimetre to the fourth power
    case G77 = 'G77';

    // cubic centimetre per day bar
    case G78 = 'G78';

    // cubic centimetre per hour bar
    case G79 = 'G79';

    // cubic centimetre per minute bar
    case G80 = 'G80';

    // cubic centimetre per second bar
    case G81 = 'G81';

    // litre per day bar
    case G82 = 'G82';

    // litre per hour bar
    case G83 = 'G83';

    // litre per minute bar
    case G84 = 'G84';

    // litre per second bar
    case G85 = 'G85';

    // cubic metre per day bar
    case G86 = 'G86';

    // cubic metre per hour bar
    case G87 = 'G87';

    // cubic metre per minute bar
    case G88 = 'G88';

    // cubic metre per second bar
    case G89 = 'G89';

    // millilitre per day bar
    case G90 = 'G90';

    // millilitre per hour bar
    case G91 = 'G91';

    // millilitre per minute bar
    case G92 = 'G92';

    // millilitre per second bar
    case G93 = 'G93';

    // cubic centimetre per bar
    case G94 = 'G94';

    // litre per bar
    case G95 = 'G95';

    // cubic metre per bar
    case G96 = 'G96';

    // millilitre per bar
    case G97 = 'G97';

    // microhenry per kiloohm
    case G98 = 'G98';

    // microhenry per ohm
    case G99 = 'G99';

    // gallon (US) per day
    case GB = 'GB';

    // gigabecquerel
    case GBQ = 'GBQ';

    // gram, dry weight
    case GDW = 'GDW';

    // pound per gallon (US)
    case GE = 'GE';

    // gram per metre (gram per 100 centimetres)
    case GF = 'GF';

    // gram of fissile isotope
    case GFI = 'GFI';

    // great gross
    case GGR = 'GGR';

    // gill (US)
    case GIA = 'GIA';

    // gram, including container
    case GIC = 'GIC';

    // gill (UK)
    case GII = 'GII';

    // gram, including inner packaging
    case GIP = 'GIP';

    // gram per millilitre
    case GJ = 'GJ';

    // gram per litre
    case GL = 'GL';

    // dry gallon (US)
    case GLD = 'GLD';

    // gallon (UK)
    case GLI = 'GLI';

    // gallon (US)
    case GLL = 'GLL';

    // gram per square metre
    case GM = 'GM';

    // milligram per square metre
    case GO = 'GO';

    // milligram per cubic metre
    case GP = 'GP';

    // microgram per cubic metre
    case GQ = 'GQ';

    // gram
    case GRM = 'GRM';

    // grain
    case GRN = 'GRN';

    // gross
    case GRO = 'GRO';

    // gigajoule
    case GV = 'GV';

    // gigawatt hour
    case GWH = 'GWH';

    // henry per kiloohm
    case H03 = 'H03';

    // henry per ohm
    case H04 = 'H04';

    // millihenry per kiloohm
    case H05 = 'H05';

    // millihenry per ohm
    case H06 = 'H06';

    // pascal second per bar
    case H07 = 'H07';

    // microbecquerel
    case H08 = 'H08';

    // reciprocal year
    case H09 = 'H09';

    // reciprocal hour
    case H10 = 'H10';

    // reciprocal month
    case H11 = 'H11';

    // degree Celsius per hour
    case H12 = 'H12';

    // degree Celsius per minute
    case H13 = 'H13';

    // degree Celsius per second
    case H14 = 'H14';

    // square centimetre per gram
    case H15 = 'H15';

    // square decametre
    case H16 = 'H16';

    // square hectometre
    case H18 = 'H18';

    // cubic hectometre
    case H19 = 'H19';

    // cubic kilometre
    case H20 = 'H20';

    // blank
    case H21 = 'H21';

    // volt square inch per pound-force
    case H22 = 'H22';

    // volt per inch
    case H23 = 'H23';

    // volt per microsecond
    case H24 = 'H24';

    // percent per kelvin
    case H25 = 'H25';

    // ohm per metre
    case H26 = 'H26';

    // degree per metre
    case H27 = 'H27';

    // microfarad per kilometre
    case H28 = 'H28';

    // microgram per litre
    case H29 = 'H29';

    // square micrometre (square micron)
    case H30 = 'H30';

    // ampere per kilogram
    case H31 = 'H31';

    // ampere squared second
    case H32 = 'H32';

    // farad per kilometre
    case H33 = 'H33';

    // hertz metre
    case H34 = 'H34';

    // kelvin metre per watt
    case H35 = 'H35';

    // megaohm per kilometre
    case H36 = 'H36';

    // megaohm per metre
    case H37 = 'H37';

    // megaampere
    case H38 = 'H38';

    // megahertz kilometre
    case H39 = 'H39';

    // newton per ampere
    case H40 = 'H40';

    // newton metre watt to the power minus 0,5
    case H41 = 'H41';

    // pascal per metre
    case H42 = 'H42';

    // siemens per centimetre
    case H43 = 'H43';

    // teraohm
    case H44 = 'H44';

    // volt second per metre
    case H45 = 'H45';

    // volt per second
    case H46 = 'H46';

    // watt per cubic metre
    case H47 = 'H47';

    // attofarad
    case H48 = 'H48';

    // centimetre per hour
    case H49 = 'H49';

    // reciprocal cubic centimetre
    case H50 = 'H50';

    // decibel per kilometre
    case H51 = 'H51';

    // decibel per metre
    case H52 = 'H52';

    // kilogram per bar
    case H53 = 'H53';

    // kilogram per cubic decimetre kelvin
    case H54 = 'H54';

    // kilogram per cubic decimetre bar
    case H55 = 'H55';

    // kilogram per square metre second
    case H56 = 'H56';

    // inch per two pi radiant
    case H57 = 'H57';

    // metre per volt second
    case H58 = 'H58';

    // square metre per newton
    case H59 = 'H59';

    // cubic metre per cubic metre
    case H60 = 'H60';

    // millisiemens per centimetre
    case H61 = 'H61';

    // millivolt per minute
    case H62 = 'H62';

    // milligram per square centimetre
    case H63 = 'H63';

    // milligram per gram
    case H64 = 'H64';

    // millilitre per cubic metre
    case H65 = 'H65';

    // millimetre per year
    case H66 = 'H66';

    // millimetre per hour
    case H67 = 'H67';

    // millimole per gram
    case H68 = 'H68';

    // picopascal per kilometre
    case H69 = 'H69';

    // picosecond
    case H70 = 'H70';

    // percent per month
    case H71 = 'H71';

    // percent per hectobar
    case H72 = 'H72';

    // percent per decakelvin
    case H73 = 'H73';

    // watt per metre
    case H74 = 'H74';

    // decapascal
    case H75 = 'H75';

    // gram per millimetre
    case H76 = 'H76';

    // module width
    case H77 = 'H77';

    // French gauge
    case H79 = 'H79';

    // rack unit
    case H80 = 'H80';

    // millimetre per minute
    case H81 = 'H81';

    // big point
    case H82 = 'H82';

    // litre per kilogram
    case H83 = 'H83';

    // gram millimetre
    case H84 = 'H84';

    // reciprocal week
    case H85 = 'H85';

    // piece
    case H87 = 'H87';

    // megaohm kilometre
    case H88 = 'H88';

    // percent per ohm
    case H89 = 'H89';

    // percent per degree
    case H90 = 'H90';

    // percent per ten thousand
    case H91 = 'H91';

    // percent per one hundred thousand
    case H92 = 'H92';

    // percent per hundred
    case H93 = 'H93';

    // percent per thousand
    case H94 = 'H94';

    // percent per volt
    case H95 = 'H95';

    // percent per bar
    case H96 = 'H96';

    // percent per inch
    case H98 = 'H98';

    // percent per metre
    case H99 = 'H99';

    // hank
    case HA = 'HA';

    // Piece Day
    case HAD = 'HAD';

    // hectobar
    case HBA = 'HBA';

    // hundred boxes
    case HBX = 'HBX';

    // hundred count
    case HC = 'HC';

    // hundred kilogram, dry weight
    case HDW = 'HDW';

    // head
    case HEA = 'HEA';

    // hectogram
    case HGM = 'HGM';

    // hundred cubic foot
    case HH = 'HH';

    // hundred international unit
    case HIU = 'HIU';

    // hundred kilogram, net mass
    case HKM = 'HKM';

    // hectolitre
    case HLT = 'HLT';

    // mile per hour (statute mile)
    case HM = 'HM';

    // Piece Month
    case HMO = 'HMO';

    // million cubic metre
    case HMQ = 'HMQ';

    // hectometre
    case HMT = 'HMT';

    // hectolitre of pure alcohol
    case HPA = 'HPA';

    // hertz
    case HTZ = 'HTZ';

    // hour
    case HUR = 'HUR';

    // Piece Week
    case HWE = 'HWE';

    // inch pound (pound inch)
    case IA = 'IA';

    // person
    case IE = 'IE';

    // inch
    case INH = 'INH';

    // square inch
    case INK = 'INK';

    // cubic inch
    case INQ = 'INQ';

    // international sugar degree
    case ISD = 'ISD';

    // inch per second
    case IU = 'IU';

    // international unit per gram
    case IUG = 'IUG';

    // inch per second squared
    case IV = 'IV';

    // percent per millimetre
    case J10 = 'J10';

    // per mille per psi
    case J12 = 'J12';

    // degree API
    case J13 = 'J13';

    // degree Baume (origin scale)
    case J14 = 'J14';

    // degree Baume (US heavy)
    case J15 = 'J15';

    // degree Baume (US light)
    case J16 = 'J16';

    // degree Balling
    case J17 = 'J17';

    // degree Brix
    case J18 = 'J18';

    // degree Fahrenheit hour square foot per British thermal unit (thermochemical)
    case J19 = 'J19';

    // joule per kilogram
    case J2 = 'J2';

    // degree Fahrenheit per kelvin
    case J20 = 'J20';

    // degree Fahrenheit per bar
    case J21 = 'J21';

    // degree Fahrenheit hour square foot per British thermal unit (international table)
    case J22 = 'J22';

    // degree Fahrenheit per hour
    case J23 = 'J23';

    // degree Fahrenheit per minute
    case J24 = 'J24';

    // degree Fahrenheit per second
    case J25 = 'J25';

    // reciprocal degree Fahrenheit
    case J26 = 'J26';

    // degree Oechsle
    case J27 = 'J27';

    // degree Rankine per hour
    case J28 = 'J28';

    // degree Rankine per minute
    case J29 = 'J29';

    // degree Rankine per second
    case J30 = 'J30';

    // degree Twaddell
    case J31 = 'J31';

    // micropoise
    case J32 = 'J32';

    // microgram per kilogram
    case J33 = 'J33';

    // microgram per cubic metre kelvin
    case J34 = 'J34';

    // microgram per cubic metre bar
    case J35 = 'J35';

    // microlitre per litre
    case J36 = 'J36';

    // baud
    case J38 = 'J38';

    // British thermal unit (mean)
    case J39 = 'J39';

    // British thermal unit (international table) foot per hour square foot degree Fahrenheit
    case J40 = 'J40';

    // British thermal unit (international table) inch per hour square foot degree Fahrenheit
    case J41 = 'J41';

    // British thermal unit (international table) inch per second square foot degree Fahrenheit
    case J42 = 'J42';

    // British thermal unit (international table) per pound degree Fahrenheit
    case J43 = 'J43';

    // British thermal unit (international table) per minute
    case J44 = 'J44';

    // British thermal unit (international table) per second
    case J45 = 'J45';

    // British thermal unit (thermochemical) foot per hour square foot degree Fahrenheit
    case J46 = 'J46';

    // British thermal unit (thermochemical) per hour
    case J47 = 'J47';

    // British thermal unit (thermochemical) inch per hour square foot degree Fahrenheit
    case J48 = 'J48';

    // British thermal unit (thermochemical) inch per second square foot degree Fahrenheit
    case J49 = 'J49';

    // British thermal unit (thermochemical) per pound degree Fahrenheit
    case J50 = 'J50';

    // British thermal unit (thermochemical) per minute
    case J51 = 'J51';

    // British thermal unit (thermochemical) per second
    case J52 = 'J52';

    // coulomb square metre per kilogram
    case J53 = 'J53';

    // megabaud
    case J54 = 'J54';

    // watt second
    case J55 = 'J55';

    // bar per bar
    case J56 = 'J56';

    // barrel (UK petroleum)
    case J57 = 'J57';

    // barrel (UK petroleum) per minute
    case J58 = 'J58';

    // barrel (UK petroleum) per day
    case J59 = 'J59';

    // barrel (UK petroleum) per hour
    case J60 = 'J60';

    // barrel (UK petroleum) per second
    case J61 = 'J61';

    // barrel (US petroleum) per hour
    case J62 = 'J62';

    // barrel (US petroleum) per second
    case J63 = 'J63';

    // bushel (UK) per day
    case J64 = 'J64';

    // bushel (UK) per hour
    case J65 = 'J65';

    // bushel (UK) per minute
    case J66 = 'J66';

    // bushel (UK) per second
    case J67 = 'J67';

    // bushel (US dry) per day
    case J68 = 'J68';

    // bushel (US dry) per hour
    case J69 = 'J69';

    // bushel (US dry) per minute
    case J70 = 'J70';

    // bushel (US dry) per second
    case J71 = 'J71';

    // centinewton metre
    case J72 = 'J72';

    // centipoise per kelvin
    case J73 = 'J73';

    // centipoise per bar
    case J74 = 'J74';

    // calorie (mean)
    case J75 = 'J75';

    // calorie (international table) per gram degree Celsius
    case J76 = 'J76';

    // calorie (thermochemical) per centimetre second degree Celsius
    case J78 = 'J78';

    // calorie (thermochemical) per gram degree Celsius
    case J79 = 'J79';

    // calorie (thermochemical) per minute
    case J81 = 'J81';

    // calorie (thermochemical) per second
    case J82 = 'J82';

    // clo
    case J83 = 'J83';

    // centimetre per second kelvin
    case J84 = 'J84';

    // centimetre per second bar
    case J85 = 'J85';

    // cubic centimetre per cubic metre
    case J87 = 'J87';

    // cubic decimetre per day
    case J90 = 'J90';

    // cubic decimetre per cubic metre
    case J91 = 'J91';

    // cubic decimetre per minute
    case J92 = 'J92';

    // cubic decimetre per second
    case J93 = 'J93';

    // ounce (UK fluid) per day
    case J95 = 'J95';

    // ounce (UK fluid) per hour
    case J96 = 'J96';

    // ounce (UK fluid) per minute
    case J97 = 'J97';

    // ounce (UK fluid) per second
    case J98 = 'J98';

    // ounce (US fluid) per day
    case J99 = 'J99';

    // joule per kelvin
    case JE = 'JE';

    // megajoule per kilogram
    case JK = 'JK';

    // megajoule per cubic metre
    case JM = 'JM';

    // pipeline joint
    case JNT = 'JNT';

    // joule
    case JOU = 'JOU';

    // hundred metre
    case JPS = 'JPS';

    // number of jewels
    case JWL = 'JWL';

    // kilowatt demand
    case K1 = 'K1';

    // ounce (US fluid) per hour
    case K10 = 'K10';

    // ounce (US fluid) per minute
    case K11 = 'K11';

    // ounce (US fluid) per second
    case K12 = 'K12';

    // foot per degree Fahrenheit
    case K13 = 'K13';

    // foot per hour
    case K14 = 'K14';

    // foot pound-force per hour
    case K15 = 'K15';

    // foot pound-force per minute
    case K16 = 'K16';

    // foot per psi
    case K17 = 'K17';

    // foot per second degree Fahrenheit
    case K18 = 'K18';

    // foot per second psi
    case K19 = 'K19';

    // kilovolt ampere reactive demand
    case K2 = 'K2';

    // reciprocal cubic foot
    case K20 = 'K20';

    // cubic foot per degree Fahrenheit
    case K21 = 'K21';

    // cubic foot per day
    case K22 = 'K22';

    // cubic foot per psi
    case K23 = 'K23';

    // gallon (UK) per day
    case K26 = 'K26';

    // gallon (UK) per hour
    case K27 = 'K27';

    // gallon (UK) per second
    case K28 = 'K28';

    // kilovolt ampere reactive hour
    case K3 = 'K3';

    // gallon (US liquid) per second
    case K30 = 'K30';

    // gram-force per square centimetre
    case K31 = 'K31';

    // gill (UK) per day
    case K32 = 'K32';

    // gill (UK) per hour
    case K33 = 'K33';

    // gill (UK) per minute
    case K34 = 'K34';

    // gill (UK) per second
    case K35 = 'K35';

    // gill (US) per day
    case K36 = 'K36';

    // gill (US) per hour
    case K37 = 'K37';

    // gill (US) per minute
    case K38 = 'K38';

    // gill (US) per second
    case K39 = 'K39';

    // standard acceleration of free fall
    case K40 = 'K40';

    // grain per gallon (US)
    case K41 = 'K41';

    // horsepower (boiler)
    case K42 = 'K42';

    // horsepower (electric)
    case K43 = 'K43';

    // inch per degree Fahrenheit
    case K45 = 'K45';

    // inch per psi
    case K46 = 'K46';

    // inch per second degree Fahrenheit
    case K47 = 'K47';

    // inch per second psi
    case K48 = 'K48';

    // reciprocal cubic inch
    case K49 = 'K49';

    // kilobaud
    case K50 = 'K50';

    // kilocalorie (mean)
    case K51 = 'K51';

    // kilocalorie (international table) per hour metre degree Celsius
    case K52 = 'K52';

    // kilocalorie (thermochemical)
    case K53 = 'K53';

    // kilocalorie (thermochemical) per minute
    case K54 = 'K54';

    // kilocalorie (thermochemical) per second
    case K55 = 'K55';

    // kilomole per hour
    case K58 = 'K58';

    // kilomole per cubic metre kelvin
    case K59 = 'K59';

    // kilolitre
    case K6 = 'K6';

    // kilomole per cubic metre bar
    case K60 = 'K60';

    // kilomole per minute
    case K61 = 'K61';

    // litre per litre
    case K62 = 'K62';

    // reciprocal litre
    case K63 = 'K63';

    // pound (avoirdupois) per degree Fahrenheit
    case K64 = 'K64';

    // pound (avoirdupois) square foot
    case K65 = 'K65';

    // pound (avoirdupois) per day
    case K66 = 'K66';

    // pound per foot hour
    case K67 = 'K67';

    // pound per foot second
    case K68 = 'K68';

    // pound (avoirdupois) per cubic foot degree Fahrenheit
    case K69 = 'K69';

    // pound (avoirdupois) per cubic foot psi
    case K70 = 'K70';

    // pound (avoirdupois) per gallon (UK)
    case K71 = 'K71';

    // pound (avoirdupois) per hour degree Fahrenheit
    case K73 = 'K73';

    // pound (avoirdupois) per hour psi
    case K74 = 'K74';

    // pound (avoirdupois) per cubic inch degree Fahrenheit
    case K75 = 'K75';

    // pound (avoirdupois) per cubic inch psi
    case K76 = 'K76';

    // pound (avoirdupois) per psi
    case K77 = 'K77';

    // pound (avoirdupois) per minute
    case K78 = 'K78';

    // pound (avoirdupois) per minute degree Fahrenheit
    case K79 = 'K79';

    // pound (avoirdupois) per minute psi
    case K80 = 'K80';

    // pound (avoirdupois) per second
    case K81 = 'K81';

    // pound (avoirdupois) per second degree Fahrenheit
    case K82 = 'K82';

    // pound (avoirdupois) per second psi
    case K83 = 'K83';

    // pound per cubic yard
    case K84 = 'K84';

    // pound-force per square foot
    case K85 = 'K85';

    // pound-force per square inch degree Fahrenheit
    case K86 = 'K86';

    // psi cubic inch per second
    case K87 = 'K87';

    // psi litre per second
    case K88 = 'K88';

    // psi cubic metre per second
    case K89 = 'K89';

    // psi cubic yard per second
    case K90 = 'K90';

    // pound-force second per square foot
    case K91 = 'K91';

    // pound-force second per square inch
    case K92 = 'K92';

    // reciprocal psi
    case K93 = 'K93';

    // quart (UK liquid) per day
    case K94 = 'K94';

    // quart (UK liquid) per hour
    case K95 = 'K95';

    // quart (UK liquid) per minute
    case K96 = 'K96';

    // quart (UK liquid) per second
    case K97 = 'K97';

    // quart (US liquid) per day
    case K98 = 'K98';

    // quart (US liquid) per hour
    case K99 = 'K99';

    // cake
    case KA = 'KA';

    // katal
    case KAT = 'KAT';

    // kilocharacter
    case KB = 'KB';

    // kilobar
    case KBA = 'KBA';

    // kilogram of choline chloride
    case KCC = 'KCC';

    // kilogram drained net weight
    case KDW = 'KDW';

    // kelvin
    case KEL = 'KEL';

    // kilogram
    case KGM = 'KGM';

    // kilogram per second
    case KGS = 'KGS';

    // kilogram of hydrogen peroxide
    case KHY = 'KHY';

    // kilohertz
    case KHZ = 'KHZ';

    // kilogram per millimetre width
    case KI = 'KI';

    // kilogram, including container
    case KIC = 'KIC';

    // kilogram, including inner packaging
    case KIP = 'KIP';

    // kilosegment
    case KJ = 'KJ';

    // kilojoule
    case KJO = 'KJO';

    // kilogram per metre
    case KL = 'KL';

    // lactic dry material percentage
    case KLK = 'KLK';

    // kilolux
    case KLX = 'KLX';

    // kilogram of methylamine
    case KMA = 'KMA';

    // kilometre per hour
    case KMH = 'KMH';

    // square kilometre
    case KMK = 'KMK';

    // kilogram per cubic metre
    case KMQ = 'KMQ';

    // kilometre
    case KMT = 'KMT';

    // kilogram of nitrogen
    case KNI = 'KNI';

    // kilonewton per square metre
    case KNM = 'KNM';

    // kilogram named substance
    case KNS = 'KNS';

    // knot
    case KNT = 'KNT';

    // milliequivalence caustic potash per gram of product
    case KO = 'KO';

    // kilopascal
    case KPA = 'KPA';

    // kilogram of potassium hydroxide (caustic potash)
    case KPH = 'KPH';

    // kilogram of potassium oxide
    case KPO = 'KPO';

    // kilogram of phosphorus pentoxide (phosphoric anhydride)
    case KPP = 'KPP';

    // kiloroentgen
    case KR = 'KR';

    // kilogram of substance 90 % dry
    case KSD = 'KSD';

    // kilogram of sodium hydroxide (caustic soda)
    case KSH = 'KSH';

    // kit
    case KT = 'KT';

    // kilotonne
    case KTN = 'KTN';

    // kilogram of uranium
    case KUR = 'KUR';

    // kilovolt - ampere
    case KVA = 'KVA';

    // kilovar
    case KVR = 'KVR';

    // kilovolt
    case KVT = 'KVT';

    // kilogram per millimetre
    case KW = 'KW';

    // kilowatt hour
    case KWH = 'KWH';

    // Kilowatt hour per normalized cubic metre
    case KWN = 'KWN';

    // kilogram of tungsten trioxide
    case KWO = 'KWO';

    // Kilowatt hour per standard cubic metre
    case KWS = 'KWS';

    // kilowatt
    case KWT = 'KWT';

    // kilowatt year
    case KWY = 'KWY';

    // millilitre per kilogram
    case KX = 'KX';

    // quart (US liquid) per minute
    case L10 = 'L10';

    // quart (US liquid) per second
    case L11 = 'L11';

    // metre per second kelvin
    case L12 = 'L12';

    // metre per second bar
    case L13 = 'L13';

    // square metre hour degree Celsius per kilocalorie (international table)
    case L14 = 'L14';

    // millipascal second per kelvin
    case L15 = 'L15';

    // millipascal second per bar
    case L16 = 'L16';

    // milligram per cubic metre kelvin
    case L17 = 'L17';

    // milligram per cubic metre bar
    case L18 = 'L18';

    // millilitre per litre
    case L19 = 'L19';

    // litre per minute
    case L2 = 'L2';

    // reciprocal cubic millimetre
    case L20 = 'L20';

    // cubic millimetre per cubic metre
    case L21 = 'L21';

    // mole per hour
    case L23 = 'L23';

    // mole per kilogram kelvin
    case L24 = 'L24';

    // mole per kilogram bar
    case L25 = 'L25';

    // mole per litre kelvin
    case L26 = 'L26';

    // mole per litre bar
    case L27 = 'L27';

    // mole per cubic metre kelvin
    case L28 = 'L28';

    // mole per cubic metre bar
    case L29 = 'L29';

    // mole per minute
    case L30 = 'L30';

    // milliroentgen aequivalent men
    case L31 = 'L31';

    // nanogram per kilogram
    case L32 = 'L32';

    // ounce (avoirdupois) per day
    case L33 = 'L33';

    // ounce (avoirdupois) per hour
    case L34 = 'L34';

    // ounce (avoirdupois) per minute
    case L35 = 'L35';

    // ounce (avoirdupois) per second
    case L36 = 'L36';

    // ounce (avoirdupois) per gallon (UK)
    case L37 = 'L37';

    // ounce (avoirdupois) per gallon (US)
    case L38 = 'L38';

    // ounce (avoirdupois) per cubic inch
    case L39 = 'L39';

    // ounce (avoirdupois)-force
    case L40 = 'L40';

    // ounce (avoirdupois)-force inch
    case L41 = 'L41';

    // picosiemens per metre
    case L42 = 'L42';

    // peck (UK)
    case L43 = 'L43';

    // peck (UK) per day
    case L44 = 'L44';

    // peck (UK) per hour
    case L45 = 'L45';

    // peck (UK) per minute
    case L46 = 'L46';

    // peck (UK) per second
    case L47 = 'L47';

    // peck (US dry) per day
    case L48 = 'L48';

    // peck (US dry) per hour
    case L49 = 'L49';

    // peck (US dry) per minute
    case L50 = 'L50';

    // peck (US dry) per second
    case L51 = 'L51';

    // psi per psi
    case L52 = 'L52';

    // pint (UK) per day
    case L53 = 'L53';

    // pint (UK) per hour
    case L54 = 'L54';

    // pint (UK) per minute
    case L55 = 'L55';

    // pint (UK) per second
    case L56 = 'L56';

    // pint (US liquid) per day
    case L57 = 'L57';

    // pint (US liquid) per hour
    case L58 = 'L58';

    // pint (US liquid) per minute
    case L59 = 'L59';

    // pint (US liquid) per second
    case L60 = 'L60';

    // slug per day
    case L63 = 'L63';

    // slug per foot second
    case L64 = 'L64';

    // slug per cubic foot
    case L65 = 'L65';

    // slug per hour
    case L66 = 'L66';

    // slug per minute
    case L67 = 'L67';

    // slug per second
    case L68 = 'L68';

    // tonne per kelvin
    case L69 = 'L69';

    // tonne per bar
    case L70 = 'L70';

    // tonne per day
    case L71 = 'L71';

    // tonne per day kelvin
    case L72 = 'L72';

    // tonne per day bar
    case L73 = 'L73';

    // tonne per hour kelvin
    case L74 = 'L74';

    // tonne per hour bar
    case L75 = 'L75';

    // tonne per cubic metre kelvin
    case L76 = 'L76';

    // tonne per cubic metre bar
    case L77 = 'L77';

    // tonne per minute
    case L78 = 'L78';

    // tonne per minute kelvin
    case L79 = 'L79';

    // tonne per minute bar
    case L80 = 'L80';

    // tonne per second
    case L81 = 'L81';

    // tonne per second kelvin
    case L82 = 'L82';

    // tonne per second bar
    case L83 = 'L83';

    // ton (UK shipping)
    case L84 = 'L84';

    // ton long per day
    case L85 = 'L85';

    // ton (US shipping)
    case L86 = 'L86';

    // ton short per degree Fahrenheit
    case L87 = 'L87';

    // ton short per day
    case L88 = 'L88';

    // ton short per hour degree Fahrenheit
    case L89 = 'L89';

    // ton short per hour psi
    case L90 = 'L90';

    // ton short per psi
    case L91 = 'L91';

    // ton (UK long) per cubic yard
    case L92 = 'L92';

    // ton (US short) per cubic yard
    case L93 = 'L93';

    // ton-force (US short)
    case L94 = 'L94';

    // common year
    case L95 = 'L95';

    // sidereal year
    case L96 = 'L96';

    // yard per degree Fahrenheit
    case L98 = 'L98';

    // yard per psi
    case L99 = 'L99';

    // pound per cubic inch
    case LA = 'LA';

    // lactose excess percentage
    case LAC = 'LAC';

    // pound
    case LBR = 'LBR';

    // troy pound (US)
    case LBT = 'LBT';

    // litre per day
    case LD = 'LD';

    // leaf
    case LEF = 'LEF';

    // linear foot
    case LF = 'LF';

    // labour hour
    case LH = 'LH';

    // link
    case LK = 'LK';

    // linear metre
    case LM = 'LM';

    // length
    case LN = 'LN';

    // lot  [unit of procurement]
    case LO = 'LO';

    // liquid pound
    case LP = 'LP';

    // litre of pure alcohol
    case LPA = 'LPA';

    // layer
    case LR = 'LR';

    // lump sum
    case LS = 'LS';

    // ton (UK) or long ton (US)
    case LTN = 'LTN';

    // litre
    case LTR = 'LTR';

    // metric ton, lubricating oil
    case LUB = 'LUB';

    // lumen
    case LUM = 'LUM';

    // lux
    case LUX = 'LUX';

    // linear yard
    case LY = 'LY';

    // milligram per litre
    case M1 = 'M1';

    // reciprocal cubic yard
    case M10 = 'M10';

    // cubic yard per degree Fahrenheit
    case M11 = 'M11';

    // cubic yard per day
    case M12 = 'M12';

    // cubic yard per hour
    case M13 = 'M13';

    // cubic yard per psi
    case M14 = 'M14';

    // cubic yard per minute
    case M15 = 'M15';

    // cubic yard per second
    case M16 = 'M16';

    // kilohertz metre
    case M17 = 'M17';

    // gigahertz metre
    case M18 = 'M18';

    // Beaufort
    case M19 = 'M19';

    // reciprocal megakelvin or megakelvin to the power minus one
    case M20 = 'M20';

    // reciprocal kilovolt - ampere reciprocal hour
    case M21 = 'M21';

    // millilitre per square centimetre minute
    case M22 = 'M22';

    // newton per centimetre
    case M23 = 'M23';

    // ohm kilometre
    case M24 = 'M24';

    // percent per degree Celsius
    case M25 = 'M25';

    // gigaohm per metre
    case M26 = 'M26';

    // megahertz metre
    case M27 = 'M27';

    // kilogram per kilogram
    case M29 = 'M29';

    // reciprocal volt - ampere reciprocal second
    case M30 = 'M30';

    // kilogram per kilometre
    case M31 = 'M31';

    // pascal second per litre
    case M32 = 'M32';

    // millimole per litre
    case M33 = 'M33';

    // newton metre per square metre
    case M34 = 'M34';

    // millivolt - ampere
    case M35 = 'M35';

    // 30-day month
    case M36 = 'M36';

    // actual/360
    case M37 = 'M37';

    // kilometre per second squared
    case M38 = 'M38';

    // centimetre per second squared
    case M39 = 'M39';

    // monetary value
    case M4 = 'M4';

    // yard per second squared
    case M40 = 'M40';

    // millimetre per second squared
    case M41 = 'M41';

    // mile (statute mile) per second squared
    case M42 = 'M42';

    // mil
    case M43 = 'M43';

    // revolution
    case M44 = 'M44';

    // degree [unit of angle] per second squared
    case M45 = 'M45';

    // revolution per minute
    case M46 = 'M46';

    // circular mil
    case M47 = 'M47';

    // square mile (based on U.S. survey foot)
    case M48 = 'M48';

    // chain (based on U.S. survey foot)
    case M49 = 'M49';

    // microcurie
    case M5 = 'M5';

    // furlong
    case M50 = 'M50';

    // foot (U.S. survey)
    case M51 = 'M51';

    // mile (based on U.S. survey foot)
    case M52 = 'M52';

    // metre per pascal
    case M53 = 'M53';

    // metre per radiant
    case M55 = 'M55';

    // shake
    case M56 = 'M56';

    // mile per minute
    case M57 = 'M57';

    // mile per second
    case M58 = 'M58';

    // metre per second pascal
    case M59 = 'M59';

    // metre per hour
    case M60 = 'M60';

    // inch per year
    case M61 = 'M61';

    // kilometre per second
    case M62 = 'M62';

    // inch per minute
    case M63 = 'M63';

    // yard per second
    case M64 = 'M64';

    // yard per minute
    case M65 = 'M65';

    // yard per hour
    case M66 = 'M66';

    // acre-foot (based on U.S. survey foot)
    case M67 = 'M67';

    // cord (128 ft3)
    case M68 = 'M68';

    // cubic mile (UK statute)
    case M69 = 'M69';

    // micro-inch
    case M7 = 'M7';

    // ton, register
    case M70 = 'M70';

    // cubic metre per pascal
    case M71 = 'M71';

    // bel
    case M72 = 'M72';

    // kilogram per cubic metre pascal
    case M73 = 'M73';

    // kilogram per pascal
    case M74 = 'M74';

    // kilopound-force
    case M75 = 'M75';

    // poundal
    case M76 = 'M76';

    // kilogram metre per second squared
    case M77 = 'M77';

    // pond
    case M78 = 'M78';

    // square foot per hour
    case M79 = 'M79';

    // stokes per pascal
    case M80 = 'M80';

    // square centimetre per second
    case M81 = 'M81';

    // square metre per second pascal
    case M82 = 'M82';

    // denier
    case M83 = 'M83';

    // pound per yard
    case M84 = 'M84';

    // ton, assay
    case M85 = 'M85';

    // pfund
    case M86 = 'M86';

    // kilogram per second pascal
    case M87 = 'M87';

    // tonne per month
    case M88 = 'M88';

    // tonne per year
    case M89 = 'M89';

    // million Btu per 1000 cubic foot
    case M9 = 'M9';

    // kilopound per hour
    case M90 = 'M90';

    // pound per pound
    case M91 = 'M91';

    // pound-force foot
    case M92 = 'M92';

    // newton metre per radian
    case M93 = 'M93';

    // kilogram metre
    case M94 = 'M94';

    // poundal foot
    case M95 = 'M95';

    // poundal inch
    case M96 = 'M96';

    // dyne metre
    case M97 = 'M97';

    // kilogram centimetre per second
    case M98 = 'M98';

    // gram centimetre per second
    case M99 = 'M99';

    // megavolt ampere reactive hour
    case MAH = 'MAH';

    // megalitre
    case MAL = 'MAL';

    // megametre
    case MAM = 'MAM';

    // megavar
    case MAR = 'MAR';

    // megawatt
    case MAW = 'MAW';

    // thousand standard brick equivalent
    case MBE = 'MBE';

    // thousand board foot
    case MBF = 'MBF';

    // millibar
    case MBR = 'MBR';

    // microgram
    case MC = 'MC';

    // millicurie
    case MCU = 'MCU';

    // air dry metric ton
    case MD = 'MD';

    // milligram
    case MGM = 'MGM';

    // megahertz
    case MHZ = 'MHZ';

    // square mile (statute mile)
    case MIK = 'MIK';

    // thousand
    case MIL = 'MIL';

    // minute [unit of time]
    case MIN = 'MIN';

    // million
    case MIO = 'MIO';

    // million international unit
    case MIU = 'MIU';

    // Square Metre Day
    case MKD = 'MKD';

    // Square Metre Month
    case MKM = 'MKM';

    // Square Metre Week
    case MKW = 'MKW';

    // milliard
    case MLD = 'MLD';

    // millilitre
    case MLT = 'MLT';

    // square millimetre
    case MMK = 'MMK';

    // cubic millimetre
    case MMQ = 'MMQ';

    // millimetre
    case MMT = 'MMT';

    // kilogram, dry weight
    case MND = 'MND';

    // Mega Joule per Normalised cubic Metre
    case MNJ = 'MNJ';

    // month
    case MON = 'MON';

    // megapascal
    case MPA = 'MPA';

    // Cubic Metre Day
    case MQD = 'MQD';

    // cubic metre per hour
    case MQH = 'MQH';

    // Cubic Metre Month
    case MQM = 'MQM';

    // cubic metre per second
    case MQS = 'MQS';

    // Cubic Metre Week
    case MQW = 'MQW';

    // Metre Day
    case MRD = 'MRD';

    // Metre Month
    case MRM = 'MRM';

    // Metre Week
    case MRW = 'MRW';

    // metre per second squared
    case MSK = 'MSK';

    // square metre
    case MTK = 'MTK';

    // cubic metre
    case MTQ = 'MTQ';

    // metre
    case MTR = 'MTR';

    // metre per second
    case MTS = 'MTS';

    // milihertz
    case MTZ = 'MTZ';

    // megavolt - ampere
    case MVA = 'MVA';

    // megawatt hour (1000 kW.h)
    case MWH = 'MWH';

    // pen calorie
    case N1 = 'N1';

    // pound foot per second
    case N10 = 'N10';

    // pound inch per second
    case N11 = 'N11';

    // Pferdestaerke
    case N12 = 'N12';

    // centimetre of mercury (0 ºC)
    case N13 = 'N13';

    // centimetre of water (4 ºC)
    case N14 = 'N14';

    // foot of water (39.2 ºF)
    case N15 = 'N15';

    // inch of mercury (32 ºF)
    case N16 = 'N16';

    // inch of mercury (60 ºF)
    case N17 = 'N17';

    // inch of water (39.2 ºF)
    case N18 = 'N18';

    // inch of water (60 ºF)
    case N19 = 'N19';

    // kip per square inch
    case N20 = 'N20';

    // poundal per square foot
    case N21 = 'N21';

    // ounce (avoirdupois) per square inch
    case N22 = 'N22';

    // conventional metre of water
    case N23 = 'N23';

    // gram per square millimetre
    case N24 = 'N24';

    // pound per square yard
    case N25 = 'N25';

    // poundal per square inch
    case N26 = 'N26';

    // foot to the fourth power
    case N27 = 'N27';

    // cubic decimetre per kilogram
    case N28 = 'N28';

    // cubic foot per pound
    case N29 = 'N29';

    // print point
    case N3 = 'N3';

    // cubic inch per pound
    case N30 = 'N30';

    // kilonewton per metre
    case N31 = 'N31';

    // poundal per inch
    case N32 = 'N32';

    // pound-force per yard
    case N33 = 'N33';

    // poundal second per square foot
    case N34 = 'N34';

    // poise per pascal
    case N35 = 'N35';

    // newton second per square metre
    case N36 = 'N36';

    // kilogram per metre second
    case N37 = 'N37';

    // kilogram per metre minute
    case N38 = 'N38';

    // kilogram per metre day
    case N39 = 'N39';

    // kilogram per metre hour
    case N40 = 'N40';

    // gram per centimetre second
    case N41 = 'N41';

    // poundal second per square inch
    case N42 = 'N42';

    // pound per foot minute
    case N43 = 'N43';

    // pound per foot day
    case N44 = 'N44';

    // cubic metre per second pascal
    case N45 = 'N45';

    // foot poundal
    case N46 = 'N46';

    // inch poundal
    case N47 = 'N47';

    // watt per square centimetre
    case N48 = 'N48';

    // watt per square inch
    case N49 = 'N49';

    // British thermal unit (international table) per square foot hour
    case N50 = 'N50';

    // British thermal unit (thermochemical) per square foot hour
    case N51 = 'N51';

    // British thermal unit (thermochemical) per square foot minute
    case N52 = 'N52';

    // British thermal unit (international table) per square foot second
    case N53 = 'N53';

    // British thermal unit (thermochemical) per square foot second
    case N54 = 'N54';

    // British thermal unit (international table) per square inch second
    case N55 = 'N55';

    // calorie (thermochemical) per square centimetre minute
    case N56 = 'N56';

    // calorie (thermochemical) per square centimetre second
    case N57 = 'N57';

    // British thermal unit (international table) per cubic foot
    case N58 = 'N58';

    // British thermal unit (thermochemical) per cubic foot
    case N59 = 'N59';

    // British thermal unit (international table) per degree Fahrenheit
    case N60 = 'N60';

    // British thermal unit (thermochemical) per degree Fahrenheit
    case N61 = 'N61';

    // British thermal unit (international table) per degree Rankine
    case N62 = 'N62';

    // British thermal unit (thermochemical) per degree Rankine
    case N63 = 'N63';

    // British thermal unit (thermochemical) per pound degree Rankine
    case N64 = 'N64';

    // kilocalorie (international table) per gram kelvin
    case N65 = 'N65';

    // British thermal unit (39 ºF)
    case N66 = 'N66';

    // British thermal unit (59 ºF)
    case N67 = 'N67';

    // British thermal unit (60 ºF)
    case N68 = 'N68';

    // calorie (20 ºC)
    case N69 = 'N69';

    // quad (1015 BtuIT)
    case N70 = 'N70';

    // therm (EC)
    case N71 = 'N71';

    // therm (U.S.)
    case N72 = 'N72';

    // British thermal unit (thermochemical) per pound
    case N73 = 'N73';

    // British thermal unit (international table) per hour square foot degree Fahrenheit
    case N74 = 'N74';

    // British thermal unit (thermochemical) per hour square foot degree Fahrenheit
    case N75 = 'N75';

    // British thermal unit (international table) per second square foot degree Fahrenheit
    case N76 = 'N76';

    // British thermal unit (thermochemical) per second square foot degree Fahrenheit
    case N77 = 'N77';

    // kilowatt per square metre kelvin
    case N78 = 'N78';

    // kelvin per pascal
    case N79 = 'N79';

    // watt per metre degree Celsius
    case N80 = 'N80';

    // kilowatt per metre kelvin
    case N81 = 'N81';

    // kilowatt per metre degree Celsius
    case N82 = 'N82';

    // metre per degree Celcius metre
    case N83 = 'N83';

    // degree Fahrenheit hour per British thermal unit (international table)
    case N84 = 'N84';

    // degree Fahrenheit hour per British thermal unit (thermochemical)
    case N85 = 'N85';

    // degree Fahrenheit second per British thermal unit (international table)
    case N86 = 'N86';

    // degree Fahrenheit second per British thermal unit (thermochemical)
    case N87 = 'N87';

    // degree Fahrenheit hour square foot per British thermal unit (international table) inch
    case N88 = 'N88';

    // degree Fahrenheit hour square foot per British thermal unit (thermochemical) inch
    case N89 = 'N89';

    // kilofarad
    case N90 = 'N90';

    // reciprocal joule
    case N91 = 'N91';

    // picosiemens
    case N92 = 'N92';

    // ampere per pascal
    case N93 = 'N93';

    // franklin
    case N94 = 'N94';

    // ampere minute
    case N95 = 'N95';

    // biot
    case N96 = 'N96';

    // gilbert
    case N97 = 'N97';

    // volt per pascal
    case N98 = 'N98';

    // picovolt
    case N99 = 'N99';

    // milligram per kilogram
    case NA = 'NA';

    // number of articles
    case NAR = 'NAR';

    // number of cells
    case NCL = 'NCL';

    // newton
    case NEW = 'NEW';

    // message
    case NF = 'NF';

    // nil
    case NIL = 'NIL';

    // number of international units
    case NIU = 'NIU';

    // load
    case NL = 'NL';

    // Normalised cubic metre
    case NM3 = 'NM3';

    // nautical mile
    case NMI = 'NMI';

    // number of packs
    case NMP = 'NMP';

    // number of parts
    case NPT = 'NPT';

    // net ton
    case NT = 'NT';

    // Nephelometric turbidity unit
    case NTU = 'NTU';

    // newton metre
    case NU = 'NU';

    // part per thousand
    case NX = 'NX';

    // panel
    case OA = 'OA';

    // ozone depletion equivalent
    case ODE = 'ODE';

    // ODS Grams
    case ODG = 'ODG';

    // ODS Kilograms
    case ODK = 'ODK';

    // ODS Milligrams
    case ODM = 'ODM';

    // ohm
    case OHM = 'OHM';

    // ounce per square yard
    case ON = 'ON';

    // ounce (avoirdupois)
    case ONZ = 'ONZ';

    // oscillations per minute
    case OPM = 'OPM';

    // overtime hour
    case OT = 'OT';

    // fluid ounce (US)
    case OZA = 'OZA';

    // fluid ounce (UK)
    case OZI = 'OZI';

    // percent
    case P1 = 'P1';

    // coulomb per metre
    case P10 = 'P10';

    // kiloweber
    case P11 = 'P11';

    // gamma
    case P12 = 'P12';

    // kilotesla
    case P13 = 'P13';

    // joule per second
    case P14 = 'P14';

    // joule per minute
    case P15 = 'P15';

    // joule per hour
    case P16 = 'P16';

    // joule per day
    case P17 = 'P17';

    // kilojoule per second
    case P18 = 'P18';

    // kilojoule per minute
    case P19 = 'P19';

    // pound per foot
    case P2 = 'P2';

    // kilojoule per hour
    case P20 = 'P20';

    // kilojoule per day
    case P21 = 'P21';

    // nanoohm
    case P22 = 'P22';

    // ohm circular-mil per foot
    case P23 = 'P23';

    // kilohenry
    case P24 = 'P24';

    // lumen per square foot
    case P25 = 'P25';

    // phot
    case P26 = 'P26';

    // footcandle
    case P27 = 'P27';

    // candela per square inch
    case P28 = 'P28';

    // footlambert
    case P29 = 'P29';

    // lambert
    case P30 = 'P30';

    // stilb
    case P31 = 'P31';

    // candela per square foot
    case P32 = 'P32';

    // kilocandela
    case P33 = 'P33';

    // millicandela
    case P34 = 'P34';

    // Hefner-Kerze
    case P35 = 'P35';

    // international candle
    case P36 = 'P36';

    // British thermal unit (international table) per square foot
    case P37 = 'P37';

    // British thermal unit (thermochemical) per square foot
    case P38 = 'P38';

    // calorie (thermochemical) per square centimetre
    case P39 = 'P39';

    // langley
    case P40 = 'P40';

    // decade (logarithmic)
    case P41 = 'P41';

    // pascal squared second
    case P42 = 'P42';

    // bel per metre
    case P43 = 'P43';

    // pound mole
    case P44 = 'P44';

    // pound mole per second
    case P45 = 'P45';

    // pound mole per minute
    case P46 = 'P46';

    // kilomole per kilogram
    case P47 = 'P47';

    // pound mole per pound
    case P48 = 'P48';

    // newton square metre per ampere
    case P49 = 'P49';

    // five pack
    case P5 = 'P5';

    // weber metre
    case P50 = 'P50';

    // mol per kilogram pascal
    case P51 = 'P51';

    // mol per cubic metre pascal
    case P52 = 'P52';

    // unit pole
    case P53 = 'P53';

    // milligray per second
    case P54 = 'P54';

    // microgray per second
    case P55 = 'P55';

    // nanogray per second
    case P56 = 'P56';

    // gray per minute
    case P57 = 'P57';

    // milligray per minute
    case P58 = 'P58';

    // microgray per minute
    case P59 = 'P59';

    // nanogray per minute
    case P60 = 'P60';

    // gray per hour
    case P61 = 'P61';

    // milligray per hour
    case P62 = 'P62';

    // microgray per hour
    case P63 = 'P63';

    // nanogray per hour
    case P64 = 'P64';

    // sievert per second
    case P65 = 'P65';

    // millisievert per second
    case P66 = 'P66';

    // microsievert per second
    case P67 = 'P67';

    // nanosievert per second
    case P68 = 'P68';

    // rem per second
    case P69 = 'P69';

    // sievert per hour
    case P70 = 'P70';

    // millisievert per hour
    case P71 = 'P71';

    // microsievert per hour
    case P72 = 'P72';

    // nanosievert per hour
    case P73 = 'P73';

    // sievert per minute
    case P74 = 'P74';

    // millisievert per minute
    case P75 = 'P75';

    // microsievert per minute
    case P76 = 'P76';

    // nanosievert per minute
    case P77 = 'P77';

    // reciprocal square inch
    case P78 = 'P78';

    // pascal square metre per kilogram
    case P79 = 'P79';

    // millipascal per metre
    case P80 = 'P80';

    // kilopascal per metre
    case P81 = 'P81';

    // hectopascal per metre
    case P82 = 'P82';

    // standard atmosphere per metre
    case P83 = 'P83';

    // technical atmosphere per metre
    case P84 = 'P84';

    // torr per metre
    case P85 = 'P85';

    // psi per inch
    case P86 = 'P86';

    // cubic metre per second square metre
    case P87 = 'P87';

    // rhe
    case P88 = 'P88';

    // pound-force foot per inch
    case P89 = 'P89';

    // pound-force inch per inch
    case P90 = 'P90';

    // perm (0 ºC)
    case P91 = 'P91';

    // perm (23 ºC)
    case P92 = 'P92';

    // byte per second
    case P93 = 'P93';

    // kilobyte per second
    case P94 = 'P94';

    // megabyte per second
    case P95 = 'P95';

    // reciprocal volt
    case P96 = 'P96';

    // reciprocal radian
    case P97 = 'P97';

    // pascal to the power sum of stoichiometric numbers
    case P98 = 'P98';

    // mole per cubiv metre to the power sum of stoichiometric numbers
    case P99 = 'P99';

    // pascal
    case PAL = 'PAL';

    // pad
    case PD = 'PD';

    // proof litre
    case PFL = 'PFL';

    // proof gallon
    case PGL = 'PGL';

    // pitch
    case PI = 'PI';

    // degree Plato
    case PLA = 'PLA';

    // pound per inch of length
    case PO = 'PO';

    // page per inch
    case PQ = 'PQ';

    // pair
    case PR = 'PR';

    // pound-force per square inch
    case PS = 'PS';

    // dry pint (US)
    case PTD = 'PTD';

    // pint (UK)
    case PTI = 'PTI';

    // liquid pint (US)
    case PTL = 'PTL';

    // portion
    case PTN = 'PTN';

    // joule per tesla
    case Q10 = 'Q10';

    // erlang
    case Q11 = 'Q11';

    // octet
    case Q12 = 'Q12';

    // octet per second
    case Q13 = 'Q13';

    // shannon
    case Q14 = 'Q14';

    // hartley
    case Q15 = 'Q15';

    // natural unit of information
    case Q16 = 'Q16';

    // shannon per second
    case Q17 = 'Q17';

    // hartley per second
    case Q18 = 'Q18';

    // natural unit of information per second
    case Q19 = 'Q19';

    // second per kilogramm
    case Q20 = 'Q20';

    // watt square metre
    case Q21 = 'Q21';

    // second per radian cubic metre
    case Q22 = 'Q22';

    // weber to the power minus one
    case Q23 = 'Q23';

    // reciprocal inch
    case Q24 = 'Q24';

    // dioptre
    case Q25 = 'Q25';

    // one per one
    case Q26 = 'Q26';

    // newton metre per metre
    case Q27 = 'Q27';

    // kilogram per square metre pascal second
    case Q28 = 'Q28';

    // microgram per hectogram
    case Q29 = 'Q29';

    // meal
    case Q3 = 'Q3';

    // pH (potential of Hydrogen)
    case Q30 = 'Q30';

    // kilojoule per gram
    case Q31 = 'Q31';

    // femtolitre
    case Q32 = 'Q32';

    // picolitre
    case Q33 = 'Q33';

    // nanolitre
    case Q34 = 'Q34';

    // megawatts per minute
    case Q35 = 'Q35';

    // square metre per cubic metre
    case Q36 = 'Q36';

    // Standard cubic metre per day
    case Q37 = 'Q37';

    // Standard cubic metre per hour
    case Q38 = 'Q38';

    // Normalized cubic metre per day
    case Q39 = 'Q39';

    // Normalized cubic metre per hour
    case Q40 = 'Q40';

    // Joule per normalised cubic metre
    case Q41 = 'Q41';

    // Joule per standard cubic metre
    case Q42 = 'Q42';

    // page - facsimile
    case QA = 'QA';

    // quarter (of a year)
    case QAN = 'QAN';

    // page - hardcopy
    case QB = 'QB';

    // quire
    case QR = 'QR';

    // dry quart (US)
    case QTD = 'QTD';

    // quart (UK)
    case QTI = 'QTI';

    // liquid quart (US)
    case QTL = 'QTL';

    // quarter (UK)
    case QTR = 'QTR';

    // pica
    case R1 = 'R1';

    // thousand cubic metre
    case R9 = 'R9';

    // running or operating hour
    case RH = 'RH';

    // ream
    case RM = 'RM';

    // room
    case ROM = 'ROM';

    // pound per ream
    case RP = 'RP';

    // revolutions per minute
    case RPM = 'RPM';

    // revolutions per second
    case RPS = 'RPS';

    // revenue ton mile
    case RT = 'RT';

    // square foot per second
    case S3 = 'S3';

    // square metre per second
    case S4 = 'S4';

    // half year (6 months)
    case SAN = 'SAN';

    // score
    case SCO = 'SCO';

    // scruple
    case SCR = 'SCR';

    // second [unit of time]
    case SEC = 'SEC';

    // set
    case SET = 'SET';

    // segment
    case SG = 'SG';

    // siemens
    case SIE = 'SIE';

    // Standard cubic metre
    case SM3 = 'SM3';

    // mile (statute mile)
    case SMI = 'SMI';

    // square
    case SQ = 'SQ';

    // square, roofing
    case SQR = 'SQR';

    // strip
    case SR = 'SR';

    // stick
    case STC = 'STC';

    // stone (UK)
    case STI = 'STI';

    // stick, cigarette
    case STK = 'STK';

    // standard litre
    case STL = 'STL';

    // ton (US) or short ton (UK/US)
    case STN = 'STN';

    // straw
    case STW = 'STW';

    // skein
    case SW = 'SW';

    // shipment
    case SX = 'SX';

    // syringe
    case SYR = 'SYR';

    // telecommunication line in service
    case T0 = 'T0';

    // thousand piece
    case T3 = 'T3';

    // kiloampere hour (thousand ampere hour)
    case TAH = 'TAH';

    // total acid number
    case TAN = 'TAN';

    // thousand square inch
    case TI = 'TI';

    // metric ton, including container
    case TIC = 'TIC';

    // metric ton, including inner packaging
    case TIP = 'TIP';

    // tonne kilometre
    case TKM = 'TKM';

    // kilogram of imported meat, less offal
    case TMS = 'TMS';

    // tonne (metric ton)
    case TNE = 'TNE';

    // ten pack
    case TP = 'TP';

    // teeth per inch
    case TPI = 'TPI';

    // ten pair
    case TPR = 'TPR';

    // thousand cubic metre per day
    case TQD = 'TQD';

    // trillion (EUR)
    case TRL = 'TRL';

    // ten set
    case TST = 'TST';

    // ten thousand sticks
    case TTS = 'TTS';

    // treatment
    case U1 = 'U1';

    // tablet
    case U2 = 'U2';

    // telecommunication line in service average
    case UB = 'UB';

    // telecommunication port
    case UC = 'UC';

    // volt - ampere per kilogram
    case VA = 'VA';

    // volt
    case VLT = 'VLT';

    // percent volume
    case VP = 'VP';

    // wet kilo
    case W2 = 'W2';

    // watt per kilogram
    case WA = 'WA';

    // wet pound
    case WB = 'WB';

    // cord
    case WCD = 'WCD';

    // wet ton
    case WE = 'WE';

    // weber
    case WEB = 'WEB';

    // week
    case WEE = 'WEE';

    // wine gallon
    case WG = 'WG';

    // watt hour
    case WHR = 'WHR';

    // working month
    case WM = 'WM';

    // standard
    case WSD = 'WSD';

    // watt
    case WTT = 'WTT';

    // Gunter's chain
    case X1 = 'X1';

    // square yard
    case YDK = 'YDK';

    // cubic yard
    case YDQ = 'YDQ';

    // yard
    case YRD = 'YRD';

    // hanging container
    case Z11 = 'Z11';

    // nanomole
    case Z9 = 'Z9';

    // page
    case ZP = 'ZP';

    // mutually defined
    case ZZ = 'ZZ';

    // Drum, steel
    case X1A = 'X1A';

    // Drum, aluminium
    case X1B = 'X1B';

    // Drum, plywood
    case X1D = 'X1D';

    // Container, flexible
    case X1F = 'X1F';

    // Drum, fibre
    case X1G = 'X1G';

    // Drum, wooden
    case X1W = 'X1W';

    // Barrel, wooden
    case X2C = 'X2C';

    // Jerrican, steel
    case X3A = 'X3A';

    // Jerrican, plastic
    case X3H = 'X3H';

    // Bag, super bulk
    case X43 = 'X43';

    // Bag, polybag
    case X44 = 'X44';

    // Box, steel
    case X4A = 'X4A';

    // Box, aluminium
    case X4B = 'X4B';

    // Box, natural wood
    case X4C = 'X4C';

    // Box, plywood
    case X4D = 'X4D';

    // Box, reconstituted wood
    case X4F = 'X4F';

    // Box, fibreboard
    case X4G = 'X4G';

    // Box, plastic
    case X4H = 'X4H';

    // Bag, woven plastic
    case X5H = 'X5H';

    // Bag, textile
    case X5L = 'X5L';

    // Bag, paper
    case X5M = 'X5M';

    // Composite packaging, plastic receptacle
    case X6H = 'X6H';

    // Composite packaging, glass receptacle
    case X6P = 'X6P';

    // Case, car
    case X7A = 'X7A';

    // Case, wooden
    case X7B = 'X7B';

    // Pallet, wooden
    case X8A = 'X8A';

    // Crate, wooden
    case X8B = 'X8B';

    // Bundle, wooden
    case X8C = 'X8C';

    // Intermediate bulk container, rigid plastic
    case XAA = 'XAA';

    // Receptacle, fibre
    case XAB = 'XAB';

    // Receptacle, paper
    case XAC = 'XAC';

    // Receptacle, wooden
    case XAD = 'XAD';

    // Aerosol
    case XAE = 'XAE';

    // Pallet, modular, collars 80cms * 60cms
    case XAF = 'XAF';

    // Pallet, shrinkwrapped
    case XAG = 'XAG';

    // Pallet, 100cms * 110cms
    case XAH = 'XAH';

    // Clamshell
    case XAI = 'XAI';

    // Cone
    case XAJ = 'XAJ';

    // Ball
    case XAL = 'XAL';

    // Ampoule, non-protected
    case XAM = 'XAM';

    // Ampoule, protected
    case XAP = 'XAP';

    // Atomizer
    case XAT = 'XAT';

    // Capsule
    case XAV = 'XAV';

    // Belt
    case XB4 = 'XB4';

    // Barrel
    case XBA = 'XBA';

    // Bobbin
    case XBB = 'XBB';

    // Bottlecrate / bottlerack
    case XBC = 'XBC';

    // Board
    case XBD = 'XBD';

    // Bundle
    case XBE = 'XBE';

    // Balloon, non-protected
    case XBF = 'XBF';

    // Bag
    case XBG = 'XBG';

    // Bunch
    case XBH = 'XBH';

    // Bin
    case XBI = 'XBI';

    // Bucket
    case XBJ = 'XBJ';

    // Basket
    case XBK = 'XBK';

    // Bale, compressed
    case XBL = 'XBL';

    // Basin
    case XBM = 'XBM';

    // Bale, non-compressed
    case XBN = 'XBN';

    // Bottle, non-protected, cylindrical
    case XBO = 'XBO';

    // Balloon, protected
    case XBP = 'XBP';

    // Bottle, protected cylindrical
    case XBQ = 'XBQ';

    // Bar
    case XBR = 'XBR';

    // Bottle, non-protected, bulbous
    case XBS = 'XBS';

    // Bolt
    case XBT = 'XBT';

    // Butt
    case XBU = 'XBU';

    // Bottle, protected bulbous
    case XBV = 'XBV';

    // Box, for liquids
    case XBW = 'XBW';

    // Box
    case XBX = 'XBX';

    // Board, in bundle/bunch/truss
    case XBY = 'XBY';

    // Bars, in bundle/bunch/truss
    case XBZ = 'XBZ';

    // Can, rectangular
    case XCA = 'XCA';

    // Crate, beer
    case XCB = 'XCB';

    // Churn
    case XCC = 'XCC';

    // Can, with handle and spout
    case XCD = 'XCD';

    // Creel
    case XCE = 'XCE';

    // Coffer
    case XCF = 'XCF';

    // Cage
    case XCG = 'XCG';

    // Chest
    case XCH = 'XCH';

    // Canister
    case XCI = 'XCI';

    // Coffin
    case XCJ = 'XCJ';

    // Cask
    case XCK = 'XCK';

    // Coil
    case XCL = 'XCL';

    // Card
    case XCM = 'XCM';

    // Container, not otherwise specified as transport equipment
    case XCN = 'XCN';

    // Carboy, non-protected
    case XCO = 'XCO';

    // Carboy, protected
    case XCP = 'XCP';

    // Cartridge
    case XCQ = 'XCQ';

    // Crate
    case XCR = 'XCR';

    // Case
    case XCS = 'XCS';

    // Carton
    case XCT = 'XCT';

    // Cup
    case XCU = 'XCU';

    // Cover
    case XCV = 'XCV';

    // Cage, roll
    case XCW = 'XCW';

    // Can, cylindrical
    case XCX = 'XCX';

    // Cylinder
    case XCY = 'XCY';

    // Canvas
    case XCZ = 'XCZ';

    // Crate, multiple layer, plastic
    case XDA = 'XDA';

    // Crate, multiple layer, wooden
    case XDB = 'XDB';

    // Crate, multiple layer, cardboard
    case XDC = 'XDC';

    // Cage, Commonwealth Handling Equipment Pool  (CHEP)
    case XDG = 'XDG';

    // Box, Commonwealth Handling Equipment Pool (CHEP), Eurobox
    case XDH = 'XDH';

    // Drum, iron
    case XDI = 'XDI';

    // Demijohn, non-protected
    case XDJ = 'XDJ';

    // Crate, bulk, cardboard
    case XDK = 'XDK';

    // Crate, bulk, plastic
    case XDL = 'XDL';

    // Crate, bulk, wooden
    case XDM = 'XDM';

    // Dispenser
    case XDN = 'XDN';

    // Demijohn, protected
    case XDP = 'XDP';

    // Drum
    case XDR = 'XDR';

    // Tray, one layer no cover, plastic
    case XDS = 'XDS';

    // Tray, one layer no cover, wooden
    case XDT = 'XDT';

    // Tray, one layer no cover, polystyrene
    case XDU = 'XDU';

    // Tray, one layer no cover, cardboard
    case XDV = 'XDV';

    // Tray, two layers no cover, plastic tray
    case XDW = 'XDW';

    // Tray, two layers no cover, wooden
    case XDX = 'XDX';

    // Tray, two layers no cover, cardboard
    case XDY = 'XDY';

    // Bag, plastic
    case XEC = 'XEC';

    // Case, with pallet base
    case XED = 'XED';

    // Case, with pallet base, wooden
    case XEE = 'XEE';

    // Case, with pallet base, cardboard
    case XEF = 'XEF';

    // Case, with pallet base, plastic
    case XEG = 'XEG';

    // Case, with pallet base, metal
    case XEH = 'XEH';

    // Case, isothermic
    case XEI = 'XEI';

    // Envelope
    case XEN = 'XEN';

    // Flexibag
    case XFB = 'XFB';

    // Crate, fruit
    case XFC = 'XFC';

    // Crate, framed
    case XFD = 'XFD';

    // Flexitank
    case XFE = 'XFE';

    // Firkin
    case XFI = 'XFI';

    // Flask
    case XFL = 'XFL';

    // Footlocker
    case XFO = 'XFO';

    // Filmpack
    case XFP = 'XFP';

    // Frame
    case XFR = 'XFR';

    // Foodtainer
    case XFT = 'XFT';

    // Cart, flatbed
    case XFW = 'XFW';

    // Bag, flexible container
    case XFX = 'XFX';

    // Bottle, gas
    case XGB = 'XGB';

    // Girder
    case XGI = 'XGI';

    // Container, gallon
    case XGL = 'XGL';

    // Receptacle, glass
    case XGR = 'XGR';

    // Tray, containing horizontally stacked flat items
    case XGU = 'XGU';

    // Bag, gunny
    case XGY = 'XGY';

    // Girders, in bundle/bunch/truss
    case XGZ = 'XGZ';

    // Basket, with handle, plastic
    case XHA = 'XHA';

    // Basket, with handle, wooden
    case XHB = 'XHB';

    // Basket, with handle, cardboard
    case XHC = 'XHC';

    // Hogshead
    case XHG = 'XHG';

    // Hanger
    case XHN = 'XHN';

    // Hamper
    case XHR = 'XHR';

    // Package, display, wooden
    case XIA = 'XIA';

    // Package, display, cardboard
    case XIB = 'XIB';

    // Package, display, plastic
    case XIC = 'XIC';

    // Package, display, metal
    case XID = 'XID';

    // Package, show
    case XIE = 'XIE';

    // Package, flow
    case XIF = 'XIF';

    // Package, paper wrapped
    case XIG = 'XIG';

    // Drum, plastic
    case XIH = 'XIH';

    // Package, cardboard, with bottle grip-holes
    case XIK = 'XIK';

    // Tray, rigid, lidded stackable (CEN TS 14482:2002)
    case XIL = 'XIL';

    // Ingot
    case XIN = 'XIN';

    // Ingots, in bundle/bunch/truss
    case XIZ = 'XIZ';

    // Bag, jumbo
    case XJB = 'XJB';

    // Jerrican, rectangular
    case XJC = 'XJC';

    // Jug
    case XJG = 'XJG';

    // Jar
    case XJR = 'XJR';

    // Jutebag
    case XJT = 'XJT';

    // Jerrican, cylindrical
    case XJY = 'XJY';

    // Keg
    case XKG = 'XKG';

    // Kit
    case XKI = 'XKI';

    // Luggage
    case XLE = 'XLE';

    // Log
    case XLG = 'XLG';

    // Lot
    case XLT = 'XLT';

    // Lug
    case XLU = 'XLU';

    // Liftvan
    case XLV = 'XLV';

    // Logs, in bundle/bunch/truss
    case XLZ = 'XLZ';

    // Crate, metal
    case XMA = 'XMA';

    // Bag, multiply
    case XMB = 'XMB';

    // Crate, milk
    case XMC = 'XMC';

    // Container, metal
    case XME = 'XME';

    // Receptacle, metal
    case XMR = 'XMR';

    // Sack, multi-wall
    case XMS = 'XMS';

    // Mat
    case XMT = 'XMT';

    // Receptacle, plastic wrapped
    case XMW = 'XMW';

    // Matchbox
    case XMX = 'XMX';

    // Not available
    case XNA = 'XNA';

    // Unpacked or unpackaged
    case XNE = 'XNE';

    // Unpacked or unpackaged, single unit
    case XNF = 'XNF';

    // Unpacked or unpackaged, multiple units
    case XNG = 'XNG';

    // Nest
    case XNS = 'XNS';

    // Net
    case XNT = 'XNT';

    // Net, tube, plastic
    case XNU = 'XNU';

    // Net, tube, textile
    case XNV = 'XNV';

    // Two sided cage on wheels with fixing strap
    case XO1 = 'XO1';

    // Trolley
    case XO2 = 'XO2';

    // Oneway pallet ISO 0 - 1/2 EURO Pallet
    case XO3 = 'XO3';

    // Oneway pallet ISO 1 - 1/1 EURO Pallet
    case XO4 = 'XO4';

    // Oneway pallet ISO 2 - 2/1 EURO Pallet
    case XO5 = 'XO5';

    // Pallet with exceptional dimensions
    case XO6 = 'XO6';

    // Wooden pallet  40 cm x 80 cm
    case XO7 = 'XO7';

    // Plastic pallet SRS 60 cm x 80 cm
    case XO8 = 'XO8';

    // Plastic pallet SRS 80 cm x 120 cm
    case XO9 = 'XO9';

    // Pallet, CHEP 40 cm x 60 cm
    case XOA = 'XOA';

    // Pallet, CHEP 80 cm x 120 cm
    case XOB = 'XOB';

    // Pallet, CHEP 100 cm x 120 cm
    case XOC = 'XOC';

    // Pallet, AS 4068-1993
    case XOD = 'XOD';

    // Pallet, ISO T11
    case XOE = 'XOE';

    // Platform, unspecified weight or dimension
    case XOF = 'XOF';

    // Pallet ISO 0 - 1/2 EURO Pallet
    case XOG = 'XOG';

    // Pallet ISO 1 - 1/1 EURO Pallet
    case XOH = 'XOH';

    // Pallet ISO 2 – 2/1 EURO Pallet
    case XOI = 'XOI';

    // 1/4 EURO Pallet
    case XOJ = 'XOJ';

    // Block
    case XOK = 'XOK';

    // 1/8 EURO Pallet
    case XOL = 'XOL';

    // Synthetic pallet ISO 1
    case XOM = 'XOM';

    // Synthetic pallet ISO 2
    case XON = 'XON';

    // Wholesaler pallet
    case XOP = 'XOP';

    // Pallet 80 X 100 cm
    case XOQ = 'XOQ';

    // Pallet 60 X 100 cm
    case XOR = 'XOR';

    // Oneway pallet
    case XOS = 'XOS';

    // Octabin
    case XOT = 'XOT';

    // Container, outer
    case XOU = 'XOU';

    // Returnable pallet
    case XOV = 'XOV';

    // Large bag, pallet sized
    case XOW = 'XOW';

    // A wheeled pallet with raised rim (81 x 67 x 135)
    case XOX = 'XOX';

    // A Wheeled pallet with raised rim (81 x 72 x 135)
    case XOY = 'XOY';

    // Wheeled pallet with raised rim ( 81 x 60 x 16)
    case XOZ = 'XOZ';

    // CHEP pallet 60 cm x 80 cm
    case XP1 = 'XP1';

    // Pan
    case XP2 = 'XP2';

    // LPR pallet 60 cm x 80 cm
    case XP3 = 'XP3';

    // LPR pallet 80 cm x 120 cm
    case XP4 = 'XP4';

    // Packet
    case XPA = 'XPA';

    // Pallet, box Combined open-ended box and pallet
    case XPB = 'XPB';

    // Parcel
    case XPC = 'XPC';

    // Pallet, modular, collars 80cms * 100cms
    case XPD = 'XPD';

    // Pallet, modular, collars 80cms * 120cms
    case XPE = 'XPE';

    // Pen
    case XPF = 'XPF';

    // Plate
    case XPG = 'XPG';

    // Pitcher
    case XPH = 'XPH';

    // Pipe
    case XPI = 'XPI';

    // Punnet
    case XPJ = 'XPJ';

    // Package
    case XPK = 'XPK';

    // Pail
    case XPL = 'XPL';

    // Plank
    case XPN = 'XPN';

    // Pouch
    case XPO = 'XPO';

    // Piece
    case XPP = 'XPP';

    // Receptacle, plastic
    case XPR = 'XPR';

    // Pot
    case XPT = 'XPT';

    // Tray
    case XPU = 'XPU';

    // Pipes, in bundle/bunch/truss
    case XPV = 'XPV';

    // Pallet
    case XPX = 'XPX';

    // Plates, in bundle/bunch/truss
    case XPY = 'XPY';

    // Planks, in bundle/bunch/truss
    case XPZ = 'XPZ';

    // Drum, steel, non-removable head
    case XQA = 'XQA';

    // Drum, steel, removable head
    case XQB = 'XQB';

    // Drum, aluminium, non-removable head
    case XQC = 'XQC';

    // Drum, aluminium, removable head
    case XQD = 'XQD';

    // Drum, plastic, non-removable head
    case XQF = 'XQF';

    // Drum, plastic, removable head
    case XQG = 'XQG';

    // Barrel, wooden, bung type
    case XQH = 'XQH';

    // Barrel, wooden, removable head
    case XQJ = 'XQJ';

    // Jerrican, steel, non-removable head
    case XQK = 'XQK';

    // Jerrican, steel, removable head
    case XQL = 'XQL';

    // Jerrican, plastic, non-removable head
    case XQM = 'XQM';

    // Jerrican, plastic, removable head
    case XQN = 'XQN';

    // Box, wooden, natural wood, ordinary
    case XQP = 'XQP';

    // Box, wooden, natural wood, with sift proof walls
    case XQQ = 'XQQ';

    // Box, plastic, expanded
    case XQR = 'XQR';

    // Box, plastic, solid
    case XQS = 'XQS';

    // Rod
    case XRD = 'XRD';

    // Ring
    case XRG = 'XRG';

    // Rack, clothing hanger
    case XRJ = 'XRJ';

    // Rack
    case XRK = 'XRK';

    // Reel
    case XRL = 'XRL';

    // Roll
    case XRO = 'XRO';

    // Rednet
    case XRT = 'XRT';

    // Rods, in bundle/bunch/truss
    case XRZ = 'XRZ';

    // Sack
    case XSA = 'XSA';

    // Slab
    case XSB = 'XSB';

    // Crate, shallow
    case XSC = 'XSC';

    // Spindle
    case XSD = 'XSD';

    // Sea-chest
    case XSE = 'XSE';

    // Sachet
    case XSH = 'XSH';

    // Skid
    case XSI = 'XSI';

    // Case, skeleton
    case XSK = 'XSK';

    // Slipsheet
    case XSL = 'XSL';

    // Sheetmetal
    case XSM = 'XSM';

    // Spool
    case XSO = 'XSO';

    // Sheet, plastic wrapping
    case XSP = 'XSP';

    // Case, steel
    case XSS = 'XSS';

    // Sheet
    case XST = 'XST';

    // Suitcase
    case XSU = 'XSU';

    // Envelope, steel
    case XSV = 'XSV';

    // Shrinkwrapped
    case XSW = 'XSW';

    // Set
    case XSX = 'XSX';

    // Sleeve
    case XSY = 'XSY';

    // Sheets, in bundle/bunch/truss
    case XSZ = 'XSZ';

    // Tablet
    case XT1 = 'XT1';

    // Tub
    case XTB = 'XTB';

    // Tea-chest
    case XTC = 'XTC';

    // Tube, collapsible
    case XTD = 'XTD';

    // Tyre
    case XTE = 'XTE';

    // Tank container, generic
    case XTG = 'XTG';

    // Tierce
    case XTI = 'XTI';

    // Tank, rectangular
    case XTK = 'XTK';

    // Tub, with lid
    case XTL = 'XTL';

    // Tin
    case XTN = 'XTN';

    // Tun
    case XTO = 'XTO';

    // Trunk
    case XTR = 'XTR';

    // Truss
    case XTS = 'XTS';

    // Bag, tote
    case XTT = 'XTT';

    // Tube
    case XTU = 'XTU';

    // Tube, with nozzle
    case XTV = 'XTV';

    // Pallet, triwall
    case XTW = 'XTW';

    // Tank, cylindrical
    case XTY = 'XTY';

    // Tubes, in bundle/bunch/truss
    case XTZ = 'XTZ';

    // Uncaged
    case XUC = 'XUC';

    // Unit
    case XUN = 'XUN';

    // Vat
    case XVA = 'XVA';

    // Bulk, gas (at 1031 mbar and 15°C)
    case XVG = 'XVG';

    // Vial
    case XVI = 'XVI';

    // Vanpack
    case XVK = 'XVK';

    // Bulk, liquid
    case XVL = 'XVL';

    // Vehicle
    case XVN = 'XVN';

    // Bulk, solid, large particles (“nodules”)
    case XVO = 'XVO';

    // Vacuum-packed
    case XVP = 'XVP';

    // Bulk, liquefied gas (at abnormal temperature/pressure)
    case XVQ = 'XVQ';

    // Bulk, solid, granular particles (“grains”)
    case XVR = 'XVR';

    // Bulk, scrap metal
    case XVS = 'XVS';

    // Bulk, solid, fine particles (“powders”)
    case XVY = 'XVY';

    // Intermediate bulk container
    case XWA = 'XWA';

    // Wickerbottle
    case XWB = 'XWB';

    // Intermediate bulk container, steel
    case XWC = 'XWC';

    // Intermediate bulk container, aluminium
    case XWD = 'XWD';

    // Intermediate bulk container, metal
    case XWF = 'XWF';

    // Intermediate bulk container, steel, pressurised > 10 kpa
    case XWG = 'XWG';

    // Intermediate bulk container, aluminium, pressurised > 10 kpa
    case XWH = 'XWH';

    // Intermediate bulk container, metal, pressure 10 kpa
    case XWJ = 'XWJ';

    // Intermediate bulk container, steel, liquid
    case XWK = 'XWK';

    // Intermediate bulk container, aluminium, liquid
    case XWL = 'XWL';

    // Intermediate bulk container, metal, liquid
    case XWM = 'XWM';

    // Intermediate bulk container, woven plastic, without coat/liner
    case XWN = 'XWN';

    // Intermediate bulk container, woven plastic, coated
    case XWP = 'XWP';

    // Intermediate bulk container, woven plastic, with liner
    case XWQ = 'XWQ';

    // Intermediate bulk container, woven plastic, coated and liner
    case XWR = 'XWR';

    // Intermediate bulk container, plastic film
    case XWS = 'XWS';

    // Intermediate bulk container, textile with out coat/liner
    case XWT = 'XWT';

    // Intermediate bulk container, natural wood, with inner liner
    case XWU = 'XWU';

    // Intermediate bulk container, textile, coated
    case XWV = 'XWV';

    // Intermediate bulk container, textile, with liner
    case XWW = 'XWW';

    // Intermediate bulk container, textile, coated and liner
    case XWX = 'XWX';

    // Intermediate bulk container, plywood, with inner liner
    case XWY = 'XWY';

    // Intermediate bulk container, reconstituted wood, with inner liner
    case XWZ = 'XWZ';

    // Bag, woven plastic, without inner coat/liner
    case XXA = 'XXA';

    // Bag, woven plastic, sift proof
    case XXB = 'XXB';

    // Bag, woven plastic, water resistant
    case XXC = 'XXC';

    // Bag, plastics film
    case XXD = 'XXD';

    // Bag, textile, without inner coat/liner
    case XXF = 'XXF';

    // Bag, textile, sift proof
    case XXG = 'XXG';

    // Bag, textile, water resistant
    case XXH = 'XXH';

    // Bag, paper, multi-wall
    case XXJ = 'XXJ';

    // Bag, paper, multi-wall, water resistant
    case XXK = 'XXK';

    // Composite packaging, plastic receptacle in steel drum
    case XYA = 'XYA';

    // Composite packaging, plastic receptacle in steel crate box
    case XYB = 'XYB';

    // Composite packaging, plastic receptacle in aluminium drum
    case XYC = 'XYC';

    // Composite packaging, plastic receptacle in aluminium crate
    case XYD = 'XYD';

    // Composite packaging, plastic receptacle in wooden box
    case XYF = 'XYF';

    // Composite packaging, plastic receptacle in plywood drum
    case XYG = 'XYG';

    // Composite packaging, plastic receptacle in plywood box
    case XYH = 'XYH';

    // Composite packaging, plastic receptacle in fibre drum
    case XYJ = 'XYJ';

    // Composite packaging, plastic receptacle in fibreboard box
    case XYK = 'XYK';

    // Composite packaging, plastic receptacle in plastic drum
    case XYL = 'XYL';

    // Composite packaging, plastic receptacle in solid plastic box
    case XYM = 'XYM';

    // Composite packaging, glass receptacle in steel drum
    case XYN = 'XYN';

    // Composite packaging, glass receptacle in steel crate box
    case XYP = 'XYP';

    // Composite packaging, glass receptacle in aluminium drum
    case XYQ = 'XYQ';

    // Composite packaging, glass receptacle in aluminium crate
    case XYR = 'XYR';

    // Composite packaging, glass receptacle in wooden box
    case XYS = 'XYS';

    // Composite packaging, glass receptacle in plywood drum
    case XYT = 'XYT';

    // Composite packaging, glass receptacle in wickerwork hamper
    case XYV = 'XYV';

    // Composite packaging, glass receptacle in fibre drum
    case XYW = 'XYW';

    // Composite packaging, glass receptacle in fibreboard box
    case XYX = 'XYX';

    // Composite packaging, glass receptacle in expandable plastic pack
    case XYY = 'XYY';

    // Composite packaging, glass receptacle in solid plastic pack
    case XYZ = 'XYZ';

    // Intermediate bulk container, paper, multi-wall
    case XZA = 'XZA';

    // Bag, large
    case XZB = 'XZB';

    // Intermediate bulk container, paper, multi-wall, water resistant
    case XZC = 'XZC';

    // Intermediate bulk container, rigid plastic, with structural equipment, solids
    case XZD = 'XZD';

    // Intermediate bulk container, rigid plastic, freestanding, solids
    case XZF = 'XZF';

    // Intermediate bulk container, rigid plastic, with structural equipment, pressurised
    case XZG = 'XZG';

    // Intermediate bulk container, rigid plastic, freestanding, pressurised
    case XZH = 'XZH';

    // Intermediate bulk container, rigid plastic, with structural equipment, liquids
    case XZJ = 'XZJ';

    // Intermediate bulk container, rigid plastic, freestanding, liquids
    case XZK = 'XZK';

    // Intermediate bulk container, composite, rigid plastic, solids
    case XZL = 'XZL';

    // Intermediate bulk container, composite, flexible plastic, solids
    case XZM = 'XZM';

    // Intermediate bulk container, composite, rigid plastic, pressurised
    case XZN = 'XZN';

    // Intermediate bulk container, composite, flexible plastic, pressurised
    case XZP = 'XZP';

    // Intermediate bulk container, composite, rigid plastic, liquids
    case XZQ = 'XZQ';

    // Intermediate bulk container, composite, flexible plastic, liquids
    case XZR = 'XZR';

    // Intermediate bulk container, composite
    case XZS = 'XZS';

    // Intermediate bulk container, fibreboard
    case XZT = 'XZT';

    // Intermediate bulk container, flexible
    case XZU = 'XZU';

    // Intermediate bulk container, metal, other than steel
    case XZV = 'XZV';

    // Intermediate bulk container, natural wood
    case XZW = 'XZW';

    // Intermediate bulk container, plywood
    case XZX = 'XZX';

    // Intermediate bulk container, reconstituted wood
    case XZY = 'XZY';

    // Mutually defined
    case XZZ = 'XZZ';
}
