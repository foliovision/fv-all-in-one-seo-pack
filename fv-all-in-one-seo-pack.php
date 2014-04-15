<?php
/*
Plugin Name: FV Simpler SEO
Plugin URI: http://foliovision.com/seo-tools/wordpress/plugins/fv-all-in-one-seo-pack
Description: Simple and effective SEO. Non-invasive, elegant. Ideal for client facing projects. | <a href="options-general.php?page=fv_simpler_seo">Options configuration panel</a>
Version: 1.6.23
Author: Foliovision
Author URI: http://foliovision.com
*/

$fv_simpler_seo_version = '1.6.23';

$UTF8_TABLES['strtolower'] = array(
	"Ôº∫" => "ÔΩö",	"Ôºπ" => "ÔΩô",	"Ôº∏" => "ÔΩò",
	"Ôº∑" => "ÔΩó",	"Ôº∂" => "ÔΩñ",	"Ôºµ" => "ÔΩï",
	"Ôº¥" => "ÔΩî",	"Ôº≥" => "ÔΩì",	"Ôº≤" => "ÔΩí",
	"Ôº±" => "ÔΩë",	"Ôº∞" => "ÔΩê",	"ÔºØ" => "ÔΩè",
	"ÔºÆ" => "ÔΩé",	"Ôº≠" => "ÔΩç",	"Ôº¨" => "ÔΩå",
	"Ôº´" => "ÔΩã",	"Ôº™" => "ÔΩä",	"Ôº©" => "ÔΩâ",
	"Ôº®" => "ÔΩà",	"Ôºß" => "ÔΩá",	"Ôº¶" => "ÔΩÜ",
	"Ôº•" => "ÔΩÖ",	"Ôº§" => "ÔΩÑ",	"Ôº£" => "ÔΩÉ",
	"Ôº¢" => "ÔΩÇ",	"Ôº°" => "ÔΩÅ",	"‚Ñ´" => "√•",
	"‚Ñ™" => "k",	"‚Ñ¶" => "œâ",	"·øª" => "·ΩΩ",
	"·ø∫" => "·Ωº",	"·øπ" => "·Ωπ",	"·ø∏" => "·Ω∏",
	"·ø¨" => "·ø•",	"·ø´" => "·Ωª",	"·ø™" => "·Ω∫",
	"·ø©" => "·ø°",	"·ø®" => "·ø ",	"·øõ" => "·Ω∑",
	"·øö" => "·Ω∂",	"·øô" => "·øë",	"·øò" => "·øê",
	"·øã" => "·Ωµ",	"·øä" => "·Ω¥",	"·øâ" => "·Ω≥",
	"·øà" => "·Ω≤",	"·æª" => "·Ω±",	"·æ∫" => "·Ω∞",
	"·æπ" => "·æ±",	"·æ∏" => "·æ∞",	"·ΩØ" => "·Ωß",
	"·ΩÆ" => "·Ω¶",	"·Ω≠" => "·Ω•",	"·Ω¨" => "·Ω§",
	"·Ω´" => "·Ω£",	"·Ω™" => "·Ω¢",	"·Ω©" => "·Ω°",
	"·Ω®" => "·Ω ",	"·Ωü" => "·Ωó",	"·Ωù" => "·Ωï",
	"·Ωõ" => "·Ωì",	"·Ωô" => "·Ωë",	"·Ωç" => "·ΩÖ",
	"·Ωå" => "·ΩÑ",	"·Ωã" => "·ΩÉ",	"·Ωä" => "·ΩÇ",
	"·Ωâ" => "·ΩÅ",	"·Ωà" => "·ΩÄ",	"·ºø" => "·º∑",
	"·ºæ" => "·º∂",	"·ºΩ" => "·ºµ",	"·ºº" => "·º¥",
	"·ºª" => "·º≥",	"·º∫" => "·º≤",	"·ºπ" => "·º±",
	"·º∏" => "·º∞",	"·ºØ" => "·ºß",	"·ºÆ" => "·º¶",
	"·º≠" => "·º•",	"·º¨" => "·º§",	"·º´" => "·º£",
	"·º™" => "·º¢",	"·º©" => "·º°",	"·º®" => "·º ",
	"·ºù" => "·ºï",	"·ºú" => "·ºî",	"·ºõ" => "·ºì",
	"·ºö" => "·ºí",	"·ºô" => "·ºë",	"·ºò" => "·ºê",
	"·ºè" => "·ºá",	"·ºé" => "·ºÜ",	"·ºç" => "·ºÖ",
	"·ºå" => "·ºÑ",	"·ºã" => "·ºÉ",	"·ºä" => "·ºÇ",
	"·ºâ" => "·ºÅ",	"·ºà" => "·ºÄ",	"·ª∏" => "·ªπ",
	"·ª∂" => "·ª∑",	"·ª¥" => "·ªµ",	"·ª≤" => "·ª≥",
	"·ª∞" => "·ª±",	"·ªÆ" => "·ªØ",	"·ª¨" => "·ª≠",
	"·ª™" => "·ª´",	"·ª®" => "·ª©",	"·ª¶" => "·ªß",
	"·ª§" => "·ª•",	"·ª¢" => "·ª£",	"·ª " => "·ª°",
	"·ªû" => "·ªü",	"·ªú" => "·ªù",	"·ªö" => "·ªõ",
	"·ªò" => "·ªô",	"·ªñ" => "·ªó",	"·ªî" => "·ªï",
	"·ªí" => "·ªì",	"·ªê" => "·ªë",	"·ªé" => "·ªè",
	"·ªå" => "·ªç",	"·ªä" => "·ªã",	"·ªà" => "·ªâ",
	"·ªÜ" => "·ªá",	"·ªÑ" => "·ªÖ",	"·ªÇ" => "·ªÉ",
	"·ªÄ" => "·ªÅ",	"·∫æ" => "·∫ø",	"·∫º" => "·∫Ω",
	"·∫∫" => "·∫ª",	"·∫∏" => "·∫π",	"·∫∂" => "·∫∑",
	"·∫¥" => "·∫µ",	"·∫≤" => "·∫≥",	"·∫∞" => "·∫±",
	"·∫Æ" => "·∫Ø",	"·∫¨" => "·∫≠",	"·∫™" => "·∫´",
	"·∫®" => "·∫©",	"·∫¶" => "·∫ß",	"·∫§" => "·∫•",
	"·∫¢" => "·∫£",	"·∫ " => "·∫°",	"·∫î" => "·∫ï",
	"·∫í" => "·∫ì",	"·∫ê" => "·∫ë",	"·∫é" => "·∫è",
	"·∫å" => "·∫ç",	"·∫ä" => "·∫ã",	"·∫à" => "·∫â",
	"·∫Ü" => "·∫á",	"·∫Ñ" => "·∫Ö",	"·∫Ç" => "·∫É",
	"·∫Ä" => "·∫Å",	"·πæ" => "·πø",	"·πº" => "·πΩ",
	"·π∫" => "·πª",	"·π∏" => "·ππ",	"·π∂" => "·π∑",
	"·π¥" => "·πµ",	"·π≤" => "·π≥",	"·π∞" => "·π±",
	"·πÆ" => "·πØ",	"·π¨" => "·π≠",	"·π™" => "·π´",
	"·π®" => "·π©",	"·π¶" => "·πß",	"·π§" => "·π•",
	"·π¢" => "·π£",	"·π " => "·π°",	"·πû" => "·πü",
	"·πú" => "·πù",	"·πö" => "·πõ",	"·πò" => "·πô",
	"·πñ" => "·πó",	"·πî" => "·πï",	"·πí" => "·πì",
	"·πê" => "·πë",	"·πé" => "·πè",	"·πå" => "·πç",
	"·πä" => "·πã",	"·πà" => "·πâ",	"·πÜ" => "·πá",
	"·πÑ" => "·πÖ",	"·πÇ" => "·πÉ",	"·πÄ" => "·πÅ",
	"·∏æ" => "·∏ø",	"·∏º" => "·∏Ω",	"·∏∫" => "·∏ª",
	"·∏∏" => "·∏π",	"·∏∂" => "·∏∑",	"·∏¥" => "·∏µ",
	"·∏≤" => "·∏≥",	"·∏∞" => "·∏±",	"·∏Æ" => "·∏Ø",
	"·∏¨" => "·∏≠",	"·∏™" => "·∏´",	"·∏®" => "·∏©",
	"·∏¶" => "·∏ß",	"·∏§" => "·∏•",	"·∏¢" => "·∏£",
	"·∏ " => "·∏°",	"·∏û" => "·∏ü",	"·∏ú" => "·∏ù",
	"·∏ö" => "·∏õ",	"·∏ò" => "·∏ô",	"·∏ñ" => "·∏ó",
	"·∏î" => "·∏ï",	"·∏í" => "·∏ì",	"·∏ê" => "·∏ë",
	"·∏é" => "·∏è",	"·∏å" => "·∏ç",	"·∏ä" => "·∏ã",
	"·∏à" => "·∏â",	"·∏Ü" => "·∏á",	"·∏Ñ" => "·∏Ö",
	"·∏Ç" => "·∏É",	"·∏Ä" => "·∏Å",	"’ñ" => "÷Ü",
	"’ï" => "÷Ö",	"’î" => "÷Ñ",	"’ì" => "÷É",
	"’í" => "÷Ç",	"’ë" => "÷Å",	"’ê" => "÷Ä",
	"’è" => "’ø",	"’é" => "’æ",	"’ç" => "’Ω",
	"’å" => "’º",	"’ã" => "’ª",	"’ä" => "’∫",
	"’â" => "’π",	"’à" => "’∏",	"’á" => "’∑",
	"’Ü" => "’∂",	"’Ö" => "’µ",	"’Ñ" => "’¥",
	"’É" => "’≥",	"’Ç" => "’≤",	"’Å" => "’±",
	"’Ä" => "’∞",	"‘ø" => "’Ø",	"‘æ" => "’Æ",
	"‘Ω" => "’≠",	"‘º" => "’¨",	"‘ª" => "’´",
	"‘∫" => "’™",	"‘π" => "’©",	"‘∏" => "’®",
	"‘∑" => "’ß",	"‘∂" => "’¶",	"‘µ" => "’•",
	"‘¥" => "’§",	"‘≥" => "’£",	"‘≤" => "’¢",
	"‘±" => "’°",	"‘é" => "‘è",	"‘å" => "‘ç",
	"‘ä" => "‘ã",	"‘à" => "‘â",	"‘Ü" => "‘á",
	"‘Ñ" => "‘Ö",	"‘Ç" => "‘É",	"‘Ä" => "‘Å",
	"”∏" => "”π",	"”¥" => "”µ",	"”≤" => "”≥",
	"”∞" => "”±",	"”Æ" => "”Ø",	"”¨" => "”≠",
	"”™" => "”´",	"”®" => "”©",	"”¶" => "”ß",
	"”§" => "”•",	"”¢" => "”£",	"” " => "”°",
	"”û" => "”ü",	"”ú" => "”ù",	"”ö" => "”õ",
	"”ò" => "”ô",	"”ñ" => "”ó",	"”î" => "”ï",
	"”í" => "”ì",	"”ê" => "”ë",	"”ç" => "”é",
	"”ã" => "”å",	"”â" => "”ä",	"”á" => "”à",
	"”Ö" => "”Ü",	"”É" => "”Ñ",	"”Å" => "”Ç",
	"“æ" => "“ø",	"“º" => "“Ω",	"“∫" => "“ª",
	"“∏" => "“π",	"“∂" => "“∑",	"“¥" => "“µ",
	"“≤" => "“≥",	"“∞" => "“±",	"“Æ" => "“Ø",
	"“¨" => "“≠",	"“™" => "“´",	"“®" => "“©",
	"“¶" => "“ß",	"“§" => "“•",	"“¢" => "“£",
	"“ " => "“°",	"“û" => "“ü",	"“ú" => "“ù",
	"“ö" => "“õ",	"“ò" => "“ô",	"“ñ" => "“ó",
	"“î" => "“ï",	"“í" => "“ì",	"“ê" => "“ë",
	"“é" => "“è",	"“å" => "“ç",	"“ä" => "“ã",
	"“Ä" => "“Å",	"—æ" => "—ø",	"—º" => "—Ω",
	"—∫" => "—ª",	"—∏" => "—π",	"—∂" => "—∑",
	"—¥" => "—µ",	"—≤" => "—≥",	"—∞" => "—±",
	"—Æ" => "—Ø",	"—¨" => "—≠",	"—™" => "—´",
	"—®" => "—©",	"—¶" => "—ß",	"—§" => "—•",
	"—¢" => "—£",	"— " => "—°",	"–Ø" => "—è",
	"–Æ" => "—é",	"–≠" => "—ç",	"–¨" => "—å",
	"–´" => "—ã",	"–™" => "—ä",	"–©" => "—â",
	"–®" => "—à",	"–ß" => "—á",	"–¶" => "—Ü",
	"–•" => "—Ö",	"–§" => "—Ñ",	"–£" => "—É",
	"–¢" => "—Ç",	"–°" => "—Å",	"– " => "—Ä",
	"–ü" => "–ø",	"–û" => "–æ",	"–ù" => "–Ω",
	"–ú" => "–º",	"–õ" => "–ª",	"–ö" => "–∫",
	"–ô" => "–π",	"–ò" => "–∏",	"–ó" => "–∑",
	"–ñ" => "–∂",	"–ï" => "–µ",	"–î" => "–¥",
	"–ì" => "–≥",	"–í" => "–≤",	"–ë" => "–±",
	"–ê" => "–∞",	"–è" => "—ü",	"–é" => "—û",
	"–ç" => "—ù",	"–å" => "—ú",	"–ã" => "—õ",
	"–ä" => "—ö",	"–â" => "—ô",	"–à" => "—ò",
	"–á" => "—ó",	"–Ü" => "—ñ",	"–Ö" => "—ï",
	"–Ñ" => "—î",	"–É" => "—ì",	"–Ç" => "—í",
	"–Å" => "—ë",	"–Ä" => "—ê",	"œ¥" => "Œ∏",
	"œÆ" => "œØ",	"œ¨" => "œ≠",	"œ™" => "œ´",
	"œ®" => "œ©",	"œ¶" => "œß",	"œ§" => "œ•",
	"œ¢" => "œ£",	"œ " => "œ°",	"œû" => "œü",
	"œú" => "œù",	"œö" => "œõ",	"œò" => "œô",
	"Œ´" => "œã",	"Œ™" => "œä",	"Œ©" => "œâ",
	"Œ®" => "œà",	"Œß" => "œá",	"Œ¶" => "œÜ",
	"Œ•" => "œÖ",	"Œ§" => "œÑ",	"Œ£" => "œÉ",
	"Œ°" => "œÅ",	"Œ " => "œÄ",	"Œü" => "Œø",
	"Œû" => "Œæ",	"Œù" => "ŒΩ",	"Œú" => "Œº",
	"Œõ" => "Œª",	"Œö" => "Œ∫",	"Œô" => "Œπ",
	"Œò" => "Œ∏",	"Œó" => "Œ∑",	"Œñ" => "Œ∂",
	"Œï" => "Œµ",	"Œî" => "Œ¥",	"Œì" => "Œ≥",
	"Œí" => "Œ≤",	"Œë" => "Œ±",	"Œè" => "œé",
	"Œé" => "œç",	"Œå" => "œå",	"Œä" => "ŒØ",
	"Œâ" => "ŒÆ",	"Œà" => "Œ≠",	"ŒÜ" => "Œ¨",
	"»≤" => "»≥",	"»∞" => "»±",	"»Æ" => "»Ø",
	"»¨" => "»≠",	"»™" => "»´",	"»®" => "»©",
	"»¶" => "»ß",	"»§" => "»•",	"»¢" => "»£",
	"» " => "∆û",	"»û" => "»ü",	"»ú" => "»ù",
	"»ö" => "»õ",	"»ò" => "»ô",	"»ñ" => "»ó",
	"»î" => "»ï",	"»í" => "»ì",	"»ê" => "»ë",
	"»é" => "»è",	"»å" => "»ç",	"»ä" => "»ã",
	"»à" => "»â",	"»Ü" => "»á",	"»Ñ" => "»Ö",
	"»Ç" => "»É",	"»Ä" => "»Å",	"«æ" => "«ø",
	"«º" => "«Ω",	"«∫" => "«ª",	"«∏" => "«π",
	"«∑" => "∆ø",	"«∂" => "∆ï",	"«¥" => "«µ",
	"«±" => "«≥",	"«Æ" => "«Ø",	"«¨" => "«≠",
	"«™" => "«´",	"«®" => "«©",	"«¶" => "«ß",
	"«§" => "«•",	"«¢" => "«£",	"« " => "«°",
	"«û" => "«ü",	"«õ" => "«ú",	"«ô" => "«ö",
	"«ó" => "«ò",	"«ï" => "«ñ",	"«ì" => "«î",
	"«ë" => "«í",	"«è" => "«ê",	"«ç" => "«é",
	"«ä" => "«å",	"«á" => "«â",	"«Ñ" => "«Ü",
	"∆º" => "∆Ω",	"∆∏" => "∆π",	"∆∑" => " í",
	"∆µ" => "∆∂",	"∆≥" => "∆¥",	"∆≤" => " ã",
	"∆±" => " ä",	"∆Ø" => "∆∞",	"∆Æ" => " à",
	"∆¨" => "∆≠",	"∆©" => " É",	"∆ß" => "∆®",
	"∆¶" => " Ä",	"∆§" => "∆•",	"∆¢" => "∆£",
	"∆ " => "∆°",	"∆ü" => "…µ",	"∆ù" => "…≤",
	"∆ú" => "…Ø",	"∆ò" => "∆ô",	"∆ó" => "…®",
	"∆ñ" => "…©",	"∆î" => "…£",	"∆ì" => "… ",
	"∆ë" => "∆í",	"∆ê" => "…õ",	"∆è" => "…ô",
	"∆é" => "«ù",	"∆ã" => "∆å",	"∆ä" => "…ó",
	"∆â" => "…ñ",	"∆á" => "∆à",	"∆Ü" => "…î",
	"∆Ñ" => "∆Ö",	"∆Ç" => "∆É",	"∆Å" => "…ì",
	"≈Ω" => "≈æ",	"≈ª" => "≈º",	"≈π" => "≈∫",
	"≈∏" => "√ø",	"≈∂" => "≈∑",	"≈¥" => "≈µ",
	"≈≤" => "≈≥",	"≈∞" => "≈±",	"≈Æ" => "≈Ø",
	"≈¨" => "≈≠",	"≈™" => "≈´",	"≈®" => "≈©",
	"≈¶" => "≈ß",	"≈§" => "≈•",	"≈¢" => "≈£",
	"≈ " => "≈°",	"≈û" => "≈ü",	"≈ú" => "≈ù",
	"≈ö" => "≈õ",	"≈ò" => "≈ô",	"≈ñ" => "≈ó",
	"≈î" => "≈ï",	"≈í" => "≈ì",	"≈ê" => "≈ë",
	"≈é" => "≈è",	"≈å" => "≈ç",	"≈ä" => "≈ã",
	"≈á" => "≈à",	"≈Ö" => "≈Ü",	"≈É" => "≈Ñ",
	"≈Å" => "≈Ç",	"ƒø" => "≈Ä",	"ƒΩ" => "ƒæ",
	"ƒª" => "ƒº",	"ƒπ" => "ƒ∫",	"ƒ∂" => "ƒ∑",
	"ƒ¥" => "ƒµ",	"ƒ≤" => "ƒ≥",	"ƒ∞" => "i",
	"ƒÆ" => "ƒØ",	"ƒ¨" => "ƒ≠",	"ƒ™" => "ƒ´",
	"ƒ®" => "ƒ©",	"ƒ¶" => "ƒß",	"ƒ§" => "ƒ•",
	"ƒ¢" => "ƒ£",	"ƒ " => "ƒ°",	"ƒû" => "ƒü",
	"ƒú" => "ƒù",	"ƒö" => "ƒõ",	"ƒò" => "ƒô",
	"ƒñ" => "ƒó",	"ƒî" => "ƒï",	"ƒí" => "ƒì",
	"ƒê" => "ƒë",	"ƒé" => "ƒè",	"ƒå" => "ƒç",
	"ƒä" => "ƒã",	"ƒà" => "ƒâ",	"ƒÜ" => "ƒá",
	"ƒÑ" => "ƒÖ",	"ƒÇ" => "ƒÉ",	"ƒÄ" => "ƒÅ",
	"√û" => "√æ",	"√ù" => "√Ω",	"√ú" => "√º",
	"√õ" => "√ª",	"√ö" => "√∫",	"√ô" => "√π",
	"√ò" => "√∏",	"√ñ" => "√∂",	"√ï" => "√µ",
	"√î" => "√¥",	"√ì" => "√≥",	"√í" => "√≤",
	"√ë" => "√±",	"√ê" => "√∞",	"√è" => "√Ø",
	"√é" => "√Æ",	"√ç" => "√≠",	"√å" => "√¨",
	"√ã" => "√´",	"√ä" => "√™",	"√â" => "√©",
	"√à" => "√®",	"√á" => "√ß",	"√Ü" => "√¶",
	"√Ö" => "√•",	"√Ñ" => "√§",	"√É" => "√£",
	"√Ç" => "√¢",	"√Å" => "√°",	"√Ä" => "√ ",
	"Z" => "z",		"Y" => "y",		"X" => "x",
	"W" => "w",		"V" => "v",		"U" => "u",
	"T" => "t",		"S" => "s",		"R" => "r",
	"Q" => "q",		"P" => "p",		"O" => "o",
	"N" => "n",		"M" => "m",		"L" => "l",
	"K" => "k",		"J" => "j",		"I" => "i",
	"H" => "h",		"G" => "g",		"F" => "f",
	"E" => "e",		"D" => "d",		"C" => "c",
	"B" => "b",		"A" => "a",
);


$UTF8_TABLES['strtoupper'] = array(
	"ÔΩö" => "Ôº∫",	"ÔΩô" => "Ôºπ",	"ÔΩò" => "Ôº∏",
	"ÔΩó" => "Ôº∑",	"ÔΩñ" => "Ôº∂",	"ÔΩï" => "Ôºµ",
	"ÔΩî" => "Ôº¥",	"ÔΩì" => "Ôº≥",	"ÔΩí" => "Ôº≤",
	"ÔΩë" => "Ôº±",	"ÔΩê" => "Ôº∞",	"ÔΩè" => "ÔºØ",
	"ÔΩé" => "ÔºÆ",	"ÔΩç" => "Ôº≠",	"ÔΩå" => "Ôº¨",
	"ÔΩã" => "Ôº´",	"ÔΩä" => "Ôº™",	"ÔΩâ" => "Ôº©",
	"ÔΩà" => "Ôº®",	"ÔΩá" => "Ôºß",	"ÔΩÜ" => "Ôº¶",
	"ÔΩÖ" => "Ôº•",	"ÔΩÑ" => "Ôº§",	"ÔΩÉ" => "Ôº£",
	"ÔΩÇ" => "Ôº¢",	"ÔΩÅ" => "Ôº°",	"·ø≥" => "·øº",
	"·ø•" => "·ø¨",	"·ø°" => "·ø©",	"·ø " => "·ø®",
	"·øë" => "·øô",	"·øê" => "·øò",	"·øÉ" => "·øå",
	"·ææ" => "Œô",	"·æ≥" => "·æº",	"·æ±" => "·æπ",
	"·æ∞" => "·æ∏",	"·æß" => "·æØ",	"·æ¶" => "·æÆ",
	"·æ•" => "·æ≠",	"·æ§" => "·æ¨",	"·æ£" => "·æ´",
	"·æ¢" => "·æ™",	"·æ°" => "·æ©",	"·æ " => "·æ®",
	"·æó" => "·æü",	"·æñ" => "·æû",	"·æï" => "·æù",
	"·æî" => "·æú",	"·æì" => "·æõ",	"·æí" => "·æö",
	"·æë" => "·æô",	"·æê" => "·æò",	"·æá" => "·æè",
	"·æÜ" => "·æé",	"·æÖ" => "·æç",	"·æÑ" => "·æå",
	"·æÉ" => "·æã",	"·æÇ" => "·æä",	"·æÅ" => "·æâ",
	"·æÄ" => "·æà",	"·ΩΩ" => "·øª",	"·Ωº" => "·ø∫",
	"·Ωª" => "·ø´",	"·Ω∫" => "·ø™",	"·Ωπ" => "·øπ",
	"·Ω∏" => "·ø∏",	"·Ω∑" => "·øõ",	"·Ω∂" => "·øö",
	"·Ωµ" => "·øã",	"·Ω¥" => "·øä",	"·Ω≥" => "·øâ",
	"·Ω≤" => "·øà",	"·Ω±" => "·æª",	"·Ω∞" => "·æ∫",
	"·Ωß" => "·ΩØ",	"·Ω¶" => "·ΩÆ",	"·Ω•" => "·Ω≠",
	"·Ω§" => "·Ω¨",	"·Ω£" => "·Ω´",	"·Ω¢" => "·Ω™",
	"·Ω°" => "·Ω©",	"·Ω " => "·Ω®",	"·Ωó" => "·Ωü",
	"·Ωï" => "·Ωù",	"·Ωì" => "·Ωõ",	"·Ωë" => "·Ωô",
	"·ΩÖ" => "·Ωç",	"·ΩÑ" => "·Ωå",	"·ΩÉ" => "·Ωã",
	"·ΩÇ" => "·Ωä",	"·ΩÅ" => "·Ωâ",	"·ΩÄ" => "·Ωà",
	"·º∑" => "·ºø",	"·º∂" => "·ºæ",	"·ºµ" => "·ºΩ",
	"·º¥" => "·ºº",	"·º≥" => "·ºª",	"·º≤" => "·º∫",
	"·º±" => "·ºπ",	"·º∞" => "·º∏",	"·ºß" => "·ºØ",
	"·º¶" => "·ºÆ",	"·º•" => "·º≠",	"·º§" => "·º¨",
	"·º£" => "·º´",	"·º¢" => "·º™",	"·º°" => "·º©",
	"·º " => "·º®",	"·ºï" => "·ºù",	"·ºî" => "·ºú",
	"·ºì" => "·ºõ",	"·ºí" => "·ºö",	"·ºë" => "·ºô",
	"·ºê" => "·ºò",	"·ºá" => "·ºè",	"·ºÜ" => "·ºé",
	"·ºÖ" => "·ºç",	"·ºÑ" => "·ºå",	"·ºÉ" => "·ºã",
	"·ºÇ" => "·ºä",	"·ºÅ" => "·ºâ",	"·ºÄ" => "·ºà",
	"·ªπ" => "·ª∏",	"·ª∑" => "·ª∂",	"·ªµ" => "·ª¥",
	"·ª≥" => "·ª≤",	"·ª±" => "·ª∞",	"·ªØ" => "·ªÆ",
	"·ª≠" => "·ª¨",	"·ª´" => "·ª™",	"·ª©" => "·ª®",
	"·ªß" => "·ª¶",	"·ª•" => "·ª§",	"·ª£" => "·ª¢",
	"·ª°" => "·ª ",	"·ªü" => "·ªû",	"·ªù" => "·ªú",
	"·ªõ" => "·ªö",	"·ªô" => "·ªò",	"·ªó" => "·ªñ",
	"·ªï" => "·ªî",	"·ªì" => "·ªí",	"·ªë" => "·ªê",
	"·ªè" => "·ªé",	"·ªç" => "·ªå",	"·ªã" => "·ªä",
	"·ªâ" => "·ªà",	"·ªá" => "·ªÜ",	"·ªÖ" => "·ªÑ",
	"·ªÉ" => "·ªÇ",	"·ªÅ" => "·ªÄ",	"·∫ø" => "·∫æ",
	"·∫Ω" => "·∫º",	"·∫ª" => "·∫∫",	"·∫π" => "·∫∏",
	"·∫∑" => "·∫∂",	"·∫µ" => "·∫¥",	"·∫≥" => "·∫≤",
	"·∫±" => "·∫∞",	"·∫Ø" => "·∫Æ",	"·∫≠" => "·∫¨",
	"·∫´" => "·∫™",	"·∫©" => "·∫®",	"·∫ß" => "·∫¶",
	"·∫•" => "·∫§",	"·∫£" => "·∫¢",	"·∫°" => "·∫ ",
	"·∫õ" => "·π ",	"·∫ï" => "·∫î",	"·∫ì" => "·∫í",
	"·∫ë" => "·∫ê",	"·∫è" => "·∫é",	"·∫ç" => "·∫å",
	"·∫ã" => "·∫ä",	"·∫â" => "·∫à",	"·∫á" => "·∫Ü",
	"·∫Ö" => "·∫Ñ",	"·∫É" => "·∫Ç",	"·∫Å" => "·∫Ä",
	"·πø" => "·πæ",	"·πΩ" => "·πº",	"·πª" => "·π∫",
	"·ππ" => "·π∏",	"·π∑" => "·π∂",	"·πµ" => "·π¥",
	"·π≥" => "·π≤",	"·π±" => "·π∞",	"·πØ" => "·πÆ",
	"·π≠" => "·π¨",	"·π´" => "·π™",	"·π©" => "·π®",
	"·πß" => "·π¶",	"·π•" => "·π§",	"·π£" => "·π¢",
	"·π°" => "·π ",	"·πü" => "·πû",	"·πù" => "·πú",
	"·πõ" => "·πö",	"·πô" => "·πò",	"·πó" => "·πñ",
	"·πï" => "·πî",	"·πì" => "·πí",	"·πë" => "·πê",
	"·πè" => "·πé",	"·πç" => "·πå",	"·πã" => "·πä",
	"·πâ" => "·πà",	"·πá" => "·πÜ",	"·πÖ" => "·πÑ",
	"·πÉ" => "·πÇ",	"·πÅ" => "·πÄ",	"·∏ø" => "·∏æ",
	"·∏Ω" => "·∏º",	"·∏ª" => "·∏∫",	"·∏π" => "·∏∏",
	"·∏∑" => "·∏∂",	"·∏µ" => "·∏¥",	"·∏≥" => "·∏≤",
	"·∏±" => "·∏∞",	"·∏Ø" => "·∏Æ",	"·∏≠" => "·∏¨",
	"·∏´" => "·∏™",	"·∏©" => "·∏®",	"·∏ß" => "·∏¶",
	"·∏•" => "·∏§",	"·∏£" => "·∏¢",	"·∏°" => "·∏ ",
	"·∏ü" => "·∏û",	"·∏ù" => "·∏ú",	"·∏õ" => "·∏ö",
	"·∏ô" => "·∏ò",	"·∏ó" => "·∏ñ",	"·∏ï" => "·∏î",
	"·∏ì" => "·∏í",	"·∏ë" => "·∏ê",	"·∏è" => "·∏é",
	"·∏ç" => "·∏å",	"·∏ã" => "·∏ä",	"·∏â" => "·∏à",
	"·∏á" => "·∏Ü",	"·∏Ö" => "·∏Ñ",	"·∏É" => "·∏Ç",
	"·∏Å" => "·∏Ä",	"÷Ü" => "’ñ",	"÷Ö" => "’ï",
	"÷Ñ" => "’î",	"÷É" => "’ì",	"÷Ç" => "’í",
	"÷Å" => "’ë",	"÷Ä" => "’ê",	"’ø" => "’è",
	"’æ" => "’é",	"’Ω" => "’ç",	"’º" => "’å",
	"’ª" => "’ã",	"’∫" => "’ä",	"’π" => "’â",
	"’∏" => "’à",	"’∑" => "’á",	"’∂" => "’Ü",
	"’µ" => "’Ö",	"’¥" => "’Ñ",	"’≥" => "’É",
	"’≤" => "’Ç",	"’±" => "’Å",	"’∞" => "’Ä",
	"’Ø" => "‘ø",	"’Æ" => "‘æ",	"’≠" => "‘Ω",
	"’¨" => "‘º",	"’´" => "‘ª",	"’™" => "‘∫",
	"’©" => "‘π",	"’®" => "‘∏",	"’ß" => "‘∑",
	"’¶" => "‘∂",	"’•" => "‘µ",	"’§" => "‘¥",
	"’£" => "‘≥",	"’¢" => "‘≤",	"’°" => "‘±",
	"‘è" => "‘é",	"‘ç" => "‘å",	"‘ã" => "‘ä",
	"‘â" => "‘à",	"‘á" => "‘Ü",	"‘Ö" => "‘Ñ",
	"‘É" => "‘Ç",	"‘Å" => "‘Ä",	"”π" => "”∏",
	"”µ" => "”¥",	"”≥" => "”≤",	"”±" => "”∞",
	"”Ø" => "”Æ",	"”≠" => "”¨",	"”´" => "”™",
	"”©" => "”®",	"”ß" => "”¶",	"”•" => "”§",
	"”£" => "”¢",	"”°" => "” ",	"”ü" => "”û",
	"”ù" => "”ú",	"”õ" => "”ö",	"”ô" => "”ò",
	"”ó" => "”ñ",	"”ï" => "”î",	"”ì" => "”í",
	"”ë" => "”ê",	"”é" => "”ç",	"”å" => "”ã",
	"”ä" => "”â",	"”à" => "”á",	"”Ü" => "”Ö",
	"”Ñ" => "”É",	"”Ç" => "”Å",	"“ø" => "“æ",
	"“Ω" => "“º",	"“ª" => "“∫",	"“π" => "“∏",
	"“∑" => "“∂",	"“µ" => "“¥",	"“≥" => "“≤",
	"“±" => "“∞",	"“Ø" => "“Æ",	"“≠" => "“¨",
	"“´" => "“™",	"“©" => "“®",	"“ß" => "“¶",
	"“•" => "“§",	"“£" => "“¢",	"“°" => "“ ",
	"“ü" => "“û",	"“ù" => "“ú",	"“õ" => "“ö",
	"“ô" => "“ò",	"“ó" => "“ñ",	"“ï" => "“î",
	"“ì" => "“í",	"“ë" => "“ê",	"“è" => "“é",
	"“ç" => "“å",	"“ã" => "“ä",	"“Å" => "“Ä",
	"—ø" => "—æ",	"—Ω" => "—º",	"—ª" => "—∫",
	"—π" => "—∏",	"—∑" => "—∂",	"—µ" => "—¥",
	"—≥" => "—≤",	"—±" => "—∞",	"—Ø" => "—Æ",
	"—≠" => "—¨",	"—´" => "—™",	"—©" => "—®",
	"—ß" => "—¶",	"—•" => "—§",	"—£" => "—¢",
	"—°" => "— ",	"—ü" => "–è",	"—û" => "–é",
	"—ù" => "–ç",	"—ú" => "–å",	"—õ" => "–ã",
	"—ö" => "–ä",	"—ô" => "–â",	"—ò" => "–à",
	"—ó" => "–á",	"—ñ" => "–Ü",	"—ï" => "–Ö",
	"—î" => "–Ñ",	"—ì" => "–É",	"—í" => "–Ç",
	"—ë" => "–Å",	"—ê" => "–Ä",	"—è" => "–Ø",
	"—é" => "–Æ",	"—ç" => "–≠",	"—å" => "–¨",
	"—ã" => "–´",	"—ä" => "–™",	"—â" => "–©",
	"—à" => "–®",	"—á" => "–ß",	"—Ü" => "–¶",
	"—Ö" => "–•",	"—Ñ" => "–§",	"—É" => "–£",
	"—Ç" => "–¢",	"—Å" => "–°",	"—Ä" => "– ",
	"–ø" => "–ü",	"–æ" => "–û",	"–Ω" => "–ù",
	"–º" => "–ú",	"–ª" => "–õ",	"–∫" => "–ö",
	"–π" => "–ô",	"–∏" => "–ò",	"–∑" => "–ó",
	"–∂" => "–ñ",	"–µ" => "–ï",	"–¥" => "–î",
	"–≥" => "–ì",	"–≤" => "–í",	"–±" => "–ë",
	"–∞" => "–ê",	"œµ" => "Œï",	"œ≤" => "Œ£",
	"œ±" => "Œ°",	"œ∞" => "Œö",	"œØ" => "œÆ",
	"œ≠" => "œ¨",	"œ´" => "œ™",	"œ©" => "œ®",
	"œß" => "œ¶",	"œ•" => "œ§",	"œ£" => "œ¢",
	"œ°" => "œ ",	"œü" => "œû",	"œù" => "œú",
	"œõ" => "œö",	"œô" => "œò",	"œñ" => "Œ ",
	"œï" => "Œ¶",	"œë" => "Œò",	"œê" => "Œí",
	"œé" => "Œè",	"œç" => "Œé",	"œå" => "Œå",
	"œã" => "Œ´",	"œä" => "Œ™",	"œâ" => "Œ©",
	"œà" => "Œ®",	"œá" => "Œß",	"œÜ" => "Œ¶",
	"œÖ" => "Œ•",	"œÑ" => "Œ§",	"œÉ" => "Œ£",
	"œÇ" => "Œ£",	"œÅ" => "Œ°",	"œÄ" => "Œ ",
	"Œø" => "Œü",	"Œæ" => "Œû",	"ŒΩ" => "Œù",
	"Œº" => "Œú",	"Œª" => "Œõ",	"Œ∫" => "Œö",
	"Œπ" => "Œô",	"Œ∏" => "Œò",	"Œ∑" => "Œó",
	"Œ∂" => "Œñ",	"Œµ" => "Œï",	"Œ¥" => "Œî",
	"Œ≥" => "Œì",	"Œ≤" => "Œí",	"Œ±" => "Œë",
	"ŒØ" => "Œä",	"ŒÆ" => "Œâ",	"Œ≠" => "Œà",
	"Œ¨" => "ŒÜ",	" í" => "∆∑",	" ã" => "∆≤",
	" ä" => "∆±",	" à" => "∆Æ",	" É" => "∆©",
	" Ä" => "∆¶",	"…µ" => "∆ü",	"…≤" => "∆ù",
	"…Ø" => "∆ú",	"…©" => "∆ñ",	"…®" => "∆ó",
	"…£" => "∆î",	"… " => "∆ì",	"…õ" => "∆ê",
	"…ô" => "∆è",	"…ó" => "∆ä",	"…ñ" => "∆â",
	"…î" => "∆Ü",	"…ì" => "∆Å",	"»≥" => "»≤",
	"»±" => "»∞",	"»Ø" => "»Æ",	"»≠" => "»¨",
	"»´" => "»™",	"»©" => "»®",	"»ß" => "»¶",
	"»•" => "»§",	"»£" => "»¢",	"»ü" => "»û",
	"»ù" => "»ú",	"»õ" => "»ö",	"»ô" => "»ò",
	"»ó" => "»ñ",	"»ï" => "»î",	"»ì" => "»í",
	"»ë" => "»ê",	"»è" => "»é",	"»ç" => "»å",
	"»ã" => "»ä",	"»â" => "»à",	"»á" => "»Ü",
	"»Ö" => "»Ñ",	"»É" => "»Ç",	"»Å" => "»Ä",
	"«ø" => "«æ",	"«Ω" => "«º",	"«ª" => "«∫",
	"«π" => "«∏",	"«µ" => "«¥",	"«≥" => "«≤",
	"«Ø" => "«Æ",	"«≠" => "«¨",	"«´" => "«™",
	"«©" => "«®",	"«ß" => "«¶",	"«•" => "«§",
	"«£" => "«¢",	"«°" => "« ",	"«ü" => "«û",
	"«ù" => "∆é",	"«ú" => "«õ",	"«ö" => "«ô",
	"«ò" => "«ó",	"«ñ" => "«ï",	"«î" => "«ì",
	"«í" => "«ë",	"«ê" => "«è",	"«é" => "«ç",
	"«å" => "«ã",	"«â" => "«à",	"«Ü" => "«Ö",
	"∆ø" => "«∑",	"∆Ω" => "∆º",	"∆π" => "∆∏",
	"∆∂" => "∆µ",	"∆¥" => "∆≥",	"∆∞" => "∆Ø",
	"∆≠" => "∆¨",	"∆®" => "∆ß",	"∆•" => "∆§",
	"∆£" => "∆¢",	"∆°" => "∆ ",	"∆û" => "» ",
	"∆ô" => "∆ò",	"∆ï" => "«∂",	"∆í" => "∆ë",
	"∆å" => "∆ã",	"∆à" => "∆á",	"∆Ö" => "∆Ñ",
	"∆É" => "∆Ç",	"≈ø" => "S",	"≈æ" => "≈Ω",
	"≈º" => "≈ª",	"≈∫" => "≈π",	"≈∑" => "≈∂",
	"≈µ" => "≈¥",	"≈≥" => "≈≤",	"≈±" => "≈∞",
	"≈Ø" => "≈Æ",	"≈≠" => "≈¨",	"≈´" => "≈™",
	"≈©" => "≈®",	"≈ß" => "≈¶",	"≈•" => "≈§",
	"≈£" => "≈¢",	"≈°" => "≈ ",	"≈ü" => "≈û",
	"≈ù" => "≈ú",	"≈õ" => "≈ö",	"≈ô" => "≈ò",
	"≈ó" => "≈ñ",	"≈ï" => "≈î",	"≈ì" => "≈í",
	"≈ë" => "≈ê",	"≈è" => "≈é",	"≈ç" => "≈å",
	"≈ã" => "≈ä",	"≈à" => "≈á",	"≈Ü" => "≈Ö",
	"≈Ñ" => "≈É",	"≈Ç" => "≈Å",	"≈Ä" => "ƒø",
	"ƒæ" => "ƒΩ",	"ƒº" => "ƒª",	"ƒ∫" => "ƒπ",
	"ƒ∑" => "ƒ∂",	"ƒµ" => "ƒ¥",	"ƒ≥" => "ƒ≤",
	"ƒ±" => "I",	"ƒØ" => "ƒÆ",	"ƒ≠" => "ƒ¨",
	"ƒ´" => "ƒ™",	"ƒ©" => "ƒ®",	"ƒß" => "ƒ¶",
	"ƒ•" => "ƒ§",	"ƒ£" => "ƒ¢",	"ƒ°" => "ƒ ",
	"ƒü" => "ƒû",	"ƒù" => "ƒú",	"ƒõ" => "ƒö",
	"ƒô" => "ƒò",	"ƒó" => "ƒñ",	"ƒï" => "ƒî",
	"ƒì" => "ƒí",	"ƒë" => "ƒê",	"ƒè" => "ƒé",
	"ƒç" => "ƒå",	"ƒã" => "ƒä",	"ƒâ" => "ƒà",
	"ƒá" => "ƒÜ",	"ƒÖ" => "ƒÑ",	"ƒÉ" => "ƒÇ",
	"ƒÅ" => "ƒÄ",	"√ø" => "≈∏",	"√æ" => "√û",
	"√Ω" => "√ù",	"√º" => "√ú",	"√ª" => "√õ",
	"√∫" => "√ö",	"√π" => "√ô",	"√∏" => "√ò",
	"√∂" => "√ñ",	"√µ" => "√ï",	"√¥" => "√î",
	"√≥" => "√ì",	"√≤" => "√í",	"√±" => "√ë",
	"√∞" => "√ê",	"√Ø" => "√è",	"√Æ" => "√é",
	"√≠" => "√ç",	"√¨" => "√å",	"√´" => "√ã",
	"√™" => "√ä",	"√©" => "√â",	"√®" => "√à",
	"√ß" => "√á",	"√¶" => "√Ü",	"√•" => "√Ö",
	"√§" => "√Ñ",	"√£" => "√É",	"√¢" => "√Ç",
	"√°" => "√Å",	"√ " => "√Ä",	"¬µ" => "Œú",
	"z" => "Z",		"y" => "Y",		"x" => "X",
	"w" => "W",		"v" => "V",		"u" => "U",
	"t" => "T",		"s" => "S",		"r" => "R",
	"q" => "Q",		"p" => "P",		"o" => "O",
	"n" => "N",		"m" => "M",		"l" => "L",
	"k" => "K",		"j" => "J",		"i" => "I",
	"h" => "H",		"g" => "G",		"f" => "F",
	"e" => "E",		"d" => "D",		"c" => "C",
	"b" => "B",		"a" => "A",
);

require_once( dirname(__FILE__).'/fp-api.php' );

class FV_Simpler_SEO_Pack extends FV_Simpler_SEO_Plugin
{
	//-------------------------------
	// FIELDS
	//-------------------------------

	/** Max numbers of chars in auto-generated description */
	//var $maximum_description_length = 160;
	var $maximum_description_length = 145;
	
	var $maximum_description_length_yellow = 134;
	//var $maximum_title_length = 61;
	var $maximum_title_length = 56;
 	
	/** Minimum number of chars an excerpt should be so that it can be used
	 * as description. Touch only if you know what you're doing
	 */
	var $minimum_description_length = 1;

	var $idEmptyPostName = null;
	var $strTitleForReference = null;
	//-------------------------------
	// CONSTRUCTORSaioseop_
	//-------------------------------




	/**
	 * Constructor.
	 */
	function FV_Simpler_SEO_Pack()
	{
		global $fvseop_options;
		
		if( is_admin() ) {
			parent::__construct();
			$this->plugin_slug = 'fv_simpler_seo';
		  $this->readme_URL = 'http://plugins.trac.wordpress.org/browser/fv-all-in-one-seo-pack/trunk/readme.txt?format=txt';    
		  if( !has_action( 'in_plugin_update_message-fv-all-in-one-seo-pack/fv-all-in-one-seo-pack.php' ) ) {
	   		add_action( 'in_plugin_update_message-fv-all-in-one-seo-pack/fv-all-in-one-seo-pack.php', array( &$this, 'plugin_update_message' ) );
	   	}
	   	
	   	add_filter( 'user_contactmethods', array( $this, 'update_contactmethods' ), 10, 1 );
	   	
	   	global $fv_simpler_seo_version;
	   	if( get_option('fv_simpler_seo_version') != $fv_simpler_seo_version ) {
	   		$this->activate();
	   	}
		}		
	}
	
	
	
	
	function activate() {
	  global $fv_simpler_seo_version;
		$fvseop_options = ( get_option('aioseop_options') ) ? get_option('aioseop_options') : array();
		if( /*isset($fvseop_options['aiosp_shorten_slugs']) && $fvseop_options['aiosp_shorten_slugs'] || */!isset($fvseop_options['aiosp_shorten_slugs']) ) {
			update_option( $this->plugin_slug.'_deferred_notices', 'FV Simpler SEO will from now on automatically shorten your new post slugs to 3 most important keywords. You can disable this option in its <a href="'.$this->get_admin_page_url().'">Settings</a>.' );     
		}
    if( /*isset($fvseop_options['aiosp_shorten_slugs']) && $fvseop_options['aiosp_shorten_slugs'] || */!isset($fvseop_options['social_meta_facebook']) || !isset($fvseop_options['social_meta_twitter']) ) {
      $deferred = get_option( $this->plugin_slug.'_deferred_notices');
      if( $deferred ) {
        $deferred = $deferred.'<br /><br />';
      }
			update_option( $this->plugin_slug.'_deferred_notices', $deferred.'FV Simpler SEO will from now on automatically add Facebook Open Graph and Twitter Card meta tags to your posts. You can disable this option in its <a href="'.$this->get_admin_page_url().'">Settings</a>.' );     
		}
		
    global $fvseop_default_options;    
    $fvseop_options = array_merge( $fvseop_default_options, $fvseop_options );
    update_option( 'aioseop_options', $fvseop_options );
		
		update_option('fv_simpler_seo_version', $fv_simpler_seo_version);
	}




	function admin_init() {
		if( isset($_GET['page']) && $_GET['page'] == $this->plugin_slug ) {
			wp_enqueue_script('common');
			wp_enqueue_script('wp-lists');
			wp_enqueue_script('postbox');
		}	
	}
	
	
	
		
	function fv_simpler_seo_settings_closed_meta_boxes( $closed ) {
    if ( false === $closed )
        $closed = array( 'fv_simpler_seo_interface_options', 'fv_simpler_seo_advanced' );

    return $closed;
	}

	
	
	
	//-------------------------------
	// UTILS
	//-------------------------------


	/**      
	 * Convert a string to lower case.
	 * Originally, this function relied their functionality in a global UTF-8 character table.
	 * I will take my chances with a standard function.
	 * 
	 * Update March 11, 2010: Well, the standard function is not working on some hosts. There's a check for it before this code is used.
	 */
	function strtolower($str)
	{
		global $UTF8_TABLES;
    return strtr($str, $UTF8_TABLES['strtolower']);
		///return mb_strtolower($str, 'UTF-8');
	}

	/**      
	 * Convert a string to upper case.
	 * Originally, this function relied their functionality in a global UTF-8 character table.
	 * I will take my chances with a standard function.
	 *
	 * Update March 11, 2010: Well, the standard function is not working on some hosts. There's a check for it before this code is used.
	 */
	function strtoupper($str)
	{
		global $UTF8_TABLES;
    return strtr($str, $UTF8_TABLES['strtoupper']);
		///return mb_strtoupper($str, 'UTF-8');
	}

	/**
	 * Make a string's first character uppercase.
	 */
	function capitalize($s)
	{
		$s = trim($s);
    $tokens = explode(' ', $s);
    while (list($key, $val) = each($tokens)) {
            $tokens[$key] = trim($tokens[$key]);
            $tokens[$key] = strtoupper(substr($tokens[$key], 0, 1)) . substr($tokens[$key], 1);
    }
    $s = implode(' ', $tokens);
    return $s;
		///return mb_convert_case($s, MB_CASE_TITLE, 'UTF-8');
	}
	
	function is_static_front_page()
	{
		global $wp_query;
		
		$post = $wp_query->get_queried_object();
		
		return get_option('show_on_front') == 'page' && is_page() && $post->ID == get_option('page_on_front');
	}
	
	function is_static_posts_page()
	{
		global $wp_query;
		
		$post = $wp_query->get_queried_object();
		
		return get_option('show_on_front') == 'page' && is_home() && $post->ID == get_option('page_for_posts');
	}

	/**
	 * This function detects if a given request contains the name of an excluded page.
	 */
	function fvseop_mrt_exclude_this_page()
	{
		global $fvseop_options;

		$currenturl = trim(esc_url($_SERVER['REQUEST_URI'], '/'));

    if( isset($fvseop_options['aiosp_ex_pages']) ) {
  		$excludedstuff = explode(',', $fvseop_options['aiosp_ex_pages']);
  		foreach ($excludedstuff as $exedd)
  		{
  			$exedd = trim($exedd);
  
  			if ($exedd)
  			{
  				if (stristr($currenturl, $exedd))
  				{
  					return true;
  				}
  			}
  		}
    }

		return false;
	}
	
	function output_callback_for_title($content)
	{
		return $this->rewrite_title($content);
	}

	/**
	 * TODO: This function seems to translate the text to the current language.
	 * Actually I don't have any insight that this is really effective.
	 */
	function internationalize($in)
	{
		if (function_exists('langswitch_filter_langs_with_message'))
		{
			$in = langswitch_filter_langs_with_message($in);
		}

		if (function_exists('polyglot_filter'))
		{
			$in = polyglot_filter($in);
		}

		if (function_exists('qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage'))
		{
			$in = qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage($in);
		}

		$in = apply_filters('localization', $in);

		return $in;
	}

	//-------------------------------
	// ACTIONS
	//-------------------------------

   function SortByLength( $strA, $strB ){
      return strlen( $strB ) - strlen( $strA );
   }


	function GeneratePostSlug( $strSlug, $idPost, $keywords = 3 ){
		global $wpdb;
		
		$aSlug = explode( '-', $strSlug );
		
		if( 3 >= count( $aSlug ) ) return $strSlug;
		//if( 4 == count( $aSlug ) && preg_match( '~\d+$~', $aSlug[3] ) ) return $strSlug;	//	todo: this is really not a good way.
		if( 20 >= strlen( $strSlug ) ) return $strSlug;
		
		$aSlug = array_unique( $aSlug );
		$aSortSlug = $aSlug;
		usort( $aSortSlug, array( $this, 'SortByLength' ) );
		$aSortSlug = array_slice( $aSortSlug, 0, $keywords );
		
		$aSlug = array_intersect( $aSlug, $aSortSlug );
		$strSlugNew = implode( '-', $aSlug );
		
		if( $idPost ){
			$aPost = $wpdb->get_var( "SELECT `ID` FROM `{$wpdb->posts}` WHERE `post_name` = '".$wpdb->escape( $strSlugNew )."' AND `ID` != {$idPost} AND post_type != 'revision'" );
			$i = 0;
			
			if( count($aSortSlug) >= $keywords ) {
				if( $aPost ) {
				   $strSlug = $this->GeneratePostSlug( $strSlug, $idPost, ++$keywords );
				} else {
				   $strSlug = $strSlugNew;
				}
			} else {
				while( count( $aPosts ) ) {
					if( $i ) $strNewSlug = $strSlug . '-' . ($i+1);
					else $strNewSlug = $strSlug . '-1';
					
					$i++;
					$aPosts = $wpdb->get_results( "SELECT `ID` FROM `{$wpdb->posts}` WHERE `post_name` = '".$wpdb->escape( $strNewSlug )."' AND `ID` != {$idPost}" );
				}	
				if( $strNewSlug ) $strSlug = $strNewSlug;
			}
		}
		
		return $strSlug;
	}
	

   function EditPostSlug( $strSlug, $idPost = null, $strPostStatus = null, $strPostType = null, $idPostParent = null ){
      global $fvseop_options, $wpdb;

      if( !$fvseop_options['aiosp_shorten_slugs'] || $strPostType == 'revision' )
         return $strSlug;

      if( !$idPost ){
         if( isset( $_GET['post'] ) )
            $idPost = intval( $_GET['post'] );
         if( isset( $_POST['post_id'] ) )
            $idPost = intval( $_POST['post_id'] );
         if( isset( $_POST['post_ID'] ) )
            $idPost = intval( $_POST['post_ID'] );
      }

      if( !$idPost )
         $strSlug = $this->GeneratePostSlug( $strSlug, false );
      else{
         $strName = $wpdb->get_var( "SELECT `post_name` FROM `{$wpdb->posts}` WHERE `ID` = $idPost" );
         if( !$strName )
            $strSlug = $this->GeneratePostSlug( $strSlug, $idPost );
      }

      return $strSlug;
   }

   function SavePostSlug( $aData, $aPostArg ){
      global $fvseop_options;
      
      if( !$fvseop_options['aiosp_shorten_slugs'] || $aPostArg['post_type'] == 'revision' )
         return $aData;

      if( isset( $aPostArg['post_id'] ) )
         $idPost = intval( $aPostArg['post_id'] );
      if( isset( $aPostArg['post_ID'] ) )
         $idPost = intval( $aPostArg['post_ID'] );
      if( isset( $aPostArg['ID'] ) )
         $idPost = intval( $aPostArg['ID'] );
      if( isset( $aData['ID'] ) )
         $idPost = intval( $aData['ID'] );

      if( !$aData['post_name'] ){
         $this->idEmptyPostName = $idPost;
         $this->strTitleForReference = $aData['post_title'];
      }

      return $aData;
   }

   function SanitizeTitleForShortening( $strTitle, $strRawTitle = '', $strContext = false ){
      global $fvseop_options;    

			if( isset($fvseop_options['aiosp_shorten_slugs']) && $fvseop_options['aiosp_shorten_slugs'] && $strContext == 'save' && $this->idEmptyPostName && $strRawTitle == $this->strTitleForReference ) {
				$strTitle = $this->GeneratePostSlug( $strTitle, $this->idEmptyPostName );
			}
      
      return $strTitle;
   }





	/**
	 * Runs after WordPress admin has finished loading but before any headers are sent.
	 * Useful for intercepting $_GET or $_POST triggers. 
	 */
	function init()
	{
		// Loads the plugin's translated strings. 
		load_plugin_textdomain('fv_seo', false, dirname(plugin_basename(__FILE__)) . "/languages");
	}
	
	function remove_canonical() {
	  if (is_single() || is_page() || $this->is_static_posts_page()) {
	    global $wp_query, $fvseop_options;
		  $post = $wp_query->get_queried_object();
		
  	  $custom_canonical = trim( get_post_meta($post->ID, "_aioseop_custom_canonical", true) );
  		if( $custom_canonical && $fvseop_options['aiosp_show_custom_canonical'] ) {
  		  remove_action('wp_head', 'rel_canonical');
  		}
	  }
	}

	/**
	 * Runs before the determination of the template file to be used to display the requested page,
	 * so that a plugin can override the template file choice.
	 *
	 * Used in this case for title rewrite.
	 */
	function template_redirect()
	{
		global $wp_query;
		global $fvseop_options;

		$post = $wp_query->get_queried_object();

		if ($this->fvseop_mrt_exclude_this_page())
		{
			return;
		}

		if (is_feed())
		{
			return;
		}

		if (is_single() || is_page())
		{
			$fvseo_disable = htmlspecialchars(stripcslashes(get_post_meta($post->ID, '_aioseop_disable', true)));
			
			if ($fvseo_disable)
			{
				return;
			}
		}

		///	Let's do this also if longer title is specified or if it's homepage
		if ($fvseop_options['aiosp_rewrite_titles']     || ( is_object( $post ) && get_post_meta($post->ID, "_aioseop_title", true) ) || is_home() )
		{
			ob_start(array($this, 'output_callback_for_title')); // this ob_start is matched with ob_end_flush in wp_head
		}
	}

	/**
	 * Triggered within the <head></head> section of the user's template.
	 *
	 * This hook is theme-dependent which means that it is up to the author of each WordPress theme
	 * to include it. It may not be available on all themes, so you should take this into account
	 * when using it.
	 *
	 * Although this is theme-dependent, it is one of the most essential theme hooks, so it is
	 * fairly widely supported. 
	 */
	function wp_head()
	{
		if (is_feed()) // ignore logic if it's a feed
		{
			return;
		}

		global $wp_query;
		global $fvseop_options;

		$post = $wp_query->get_queried_object();

		$meta_string = null;

		if ($this->is_static_posts_page())
		{
			// TODO: strip_tags return a string with all HTML and PHP tags stripped from a given str. Since
			// it uses a tag stripping state machine, probably it's better to remove this function if you
			// never use weird post titles.
			//
			// The apply_filters on 'single_post_title' ensure any previous plugin is applied.
			//
			// I would like to change this line to
			//
			// $title = $post->post_title;
			//
			// and save a lot of CPU cycles.
			$title = strip_tags(apply_filters('single_post_title', $post->post_title));
		}

		if (is_single() || is_page())
		{
			$fvseo_disable = htmlspecialchars(stripcslashes(get_post_meta($post->ID, '_aioseop_disable', true)));

			if ($fvseo_disable)
			{
				return;
			}
			
			$post_noindex = get_post_meta($post->ID, '_aioseop_noindex', true);
			$post_nofollow = get_post_meta($post->ID, '_aioseop_nofollow', true);
			if( $post_noindex ) {
				$meta_robots[] = 'noindex';
			}
			if( $post_nofollow ) {
				$meta_robots[] = 'nofollow';
			}	
			if( isset($meta_robots) && !empty($meta_robots) ) {
				$meta_string .= '<meta name="robots" content="'.implode(',',$meta_robots).'" />'."\n";
			}
			
		}

		if ($this->fvseop_mrt_exclude_this_page())
		{
			return;
		}

                /// Modification - always enabled
		if ($fvseop_options['aiosp_rewrite_titles']     || 1>0)
		{
			// make the title rewrite as short as possible
			if (function_exists('ob_list_handlers'))
			{
				$active_handlers = ob_list_handlers();
			}
			else
			{
				$active_handlers = array();
			}
			
			if ((sizeof($active_handlers) > 0) &&
				(strtolower($active_handlers[sizeof($active_handlers) - 1]) ==
				strtolower('FV_Simpler_SEO_Pack::output_callback_for_title')))
			{
				ob_end_flush(); // this ob_end_flush is matched with ob_start in template_redirect
			}
			else
			{
				// TODO:
				// if we get here there *could* be trouble with another plugin :(
				// decide what to do
			}
		}

		if ((is_home() && stripcslashes( $this->internationalize( $fvseop_options['aiosp_home_keywords'] ) ) &&
			!$this->is_static_posts_page()) || $this->is_static_front_page())
		{
			$keywords = trim( stripcslashes( $this->internationalize($fvseop_options['aiosp_home_keywords']) ) );
		}
		elseif ($this->is_static_posts_page() && !$fvseop_options['aiosp_dynamic_postspage_keywords']) // and if option = use page set keywords instead of keywords from recent posts
		{
			$keywords = stripcslashes($this->internationalize(get_post_meta($post->ID, "_aioseop_keywords", true)));
		}
		else
		{
			$keywords = $this->get_all_keywords();
		}

		if (is_single() || is_page() || $this->is_static_posts_page())
		{
			if ($this->is_static_front_page())
			{
				$description = trim(stripcslashes($this->internationalize($fvseop_options['aiosp_home_description'])));
			}
			else
			{
				$description = $this->get_post_description($post);
				$description = apply_filters('fvseop_description', $description);
			}
		}
		elseif (is_home())
		{
			$description = trim(stripcslashes($this->internationalize($fvseop_options['aiosp_home_description'])));
		}
		elseif (is_category())
		{
			$description = $this->internationalize(category_description());
		}

		if (isset($description) && (strlen($description) > $this->minimum_description_length) &&
			!(is_home() && is_paged()))
		{
			$description = trim(strip_tags($description));
			$description = str_replace('"', '', $description);
			
			// replace newlines on mac / windows?
			$description = str_replace("\r\n", ' ', $description);
			
			// maybe linux uses this alone
			$description = str_replace("\n", ' ', $description);

			if (!isset($meta_string))
			{
				$meta_string = '';
			}

			// description format
			$description_format = stripslashes( $fvseop_options['aiosp_description_format'] );

			if (!isset($description_format) || empty($description_format))
			{
				$description_format = "%description%";
			}
			
			$description = str_replace('%description%', $description, $description_format);
			$description = str_replace('%blog_title%', get_bloginfo('name'), $description);
			$description = str_replace('%blog_description%', get_bloginfo('description'), $description);
			$description = str_replace('%wp_title%', $this->get_original_title(), $description);
			$description = trim( str_replace('%page%', $this->paged_description(), $description) );
			$description = __( $description );

			if ($fvseop_options['aiosp_can'] && is_attachment())
			{
				$url = $this->fvseo_mrt_get_url($wp_query);
                
				if ($url)
				{
					preg_match_all('/(\d+)/', $url, $matches);

					if (is_array($matches))
					{
						$uniqueDesc = join('', $matches[0]);
					}
				}
				
				$description .= ' ' . $uniqueDesc;
			}
			
			$meta_string .= '<meta name="description" content="' . esc_attr($description) . '" />';
		}
		
		$keywords = apply_filters('fvseop_keywords', $keywords);
		
		if (isset($keywords) && !empty($keywords) && !(is_home() && is_paged()))
		{
			if (isset($meta_string))
			{
				$meta_string .= "\n";
			}
			
			$meta_string .= '<meta name="keywords" content="' . esc_attr($keywords) . '" />';
		}

		if (function_exists('is_tag'))
		{
			$is_tag = is_tag();
		}
		
                /// Added noindex for search
		if ((is_category() && $fvseop_options['aiosp_category_noindex']) ||
			(!is_category() && is_archive() &&!$is_tag && $fvseop_options['aiosp_archive_noindex']) ||
			($fvseop_options['aiosp_tags_noindex'] && $is_tag) ||
                        (is_search() && $fvseop_options['aiosp_search_noindex'])
                        )
		{
			if (isset($meta_string))
			{
				$meta_string .= "\n";
			}
			
			$meta_string .= '<meta name="robots" content="noindex,follow" />';
		}
		
		$page_meta = stripcslashes($fvseop_options['aiosp_page_meta_tags']);
		$post_meta = stripcslashes($fvseop_options['aiosp_post_meta_tags']);
		$home_meta = stripcslashes($fvseop_options['aiosp_home_meta_tags']);
		
		if (is_page() && isset($page_meta) && !empty($page_meta) || $this->is_static_posts_page())
		{
			if (isset($meta_string))
			{
				$meta_string .= "\n";
			}
			
			$meta_string .= $page_meta;
		}
		
		if (is_single() && isset($post_meta) && !empty($post_meta))
		{
			if (isset($meta_string))
			{
				$meta_string .= "\n";
			}

			$meta_string .= $post_meta;
		}

		if (is_home() && !empty($home_meta))
		{
			if (isset($meta_string))
			{
				$meta_string .= "\n";
			}

			$meta_string .= $home_meta;
		}

		// add google site verification meta tag for webmasters tools
		$home_google_site_verification_meta_tag = isset( $fvseop_options['aiosp_home_google_site_verification_meta_tag'] ) ? stripcslashes($fvseop_options['aiosp_home_google_site_verification_meta_tag']) : NULL;
		$home_yahoo_site_verification_meta_tag = isset( $fvseop_options['aiosp_home_yahoo_site_verification_meta_tag'] ) ? stripcslashes($fvseop_options['aiosp_home_yahoo_site_verification_meta_tag']) : NULL;
		$home_bing_site_verification_meta_tag = isset( $fvseop_options['aiosp_home_bing_site_verification_meta_tag'] ) ? stripcslashes($fvseop_options['aiosp_home_bing_site_verification_meta_tag']) : NULL;

		if (is_home() && !empty($home_google_site_verification_meta_tag))
		{
			if (isset($meta_string))
			{
				$meta_string .= "\n";
			}

			$meta_string .= wp_kses($home_google_site_verification_meta_tag, array('meta' => array('name' => array(), 'content' => array())));
		}
		
		if (is_home() && !empty($home_yahoo_site_verification_meta_tag))
		{
			if (isset($meta_string))
			{
				$meta_string .= "\n";
			}

			$meta_string .= wp_kses($home_yahoo_site_verification_meta_tag, array('meta' => array('name' => array(), 'content' => array())));
		}
		
		if (is_home() && !empty($home_bing_site_verification_meta_tag))
		{
			if (isset($meta_string))
			{
				$meta_string .= "\n";
			}

			$meta_string .= wp_kses($home_bing_site_verification_meta_tag, array('meta' => array('name' => array(), 'content' => array())));
		}

		if ($meta_string != null)
		{
			echo wp_kses($meta_string, array('meta' => array('name' => array(), 'content' => array()))) . "\n";
		}

    /// Modification  2010/11/30, adding custom_canonical url
    
    /// check if meta is present
    if (is_single() || is_page() || $this->is_static_posts_page()) {
		  $custom_canonical = trim( get_post_meta($post->ID, "_aioseop_custom_canonical", true) );
    }
		///
		
		//if ($fvseop_options['aiosp_can'])
		if ($fvseop_options['aiosp_can'] || ( isset( $custom_canonical ) && isset($fvseop_options['aiosp_show_custom_canonical']) && $fvseop_options['aiosp_show_custom_canonical']  ) )
		/// End of modification
		{
		  if( (isset($custom_canonical) && $custom_canonical) && (isset($fvseop_options['aiosp_show_custom_canonical']) && $fvseop_options['aiosp_show_custom_canonical']) ) {
		    $url = $custom_canonical;
		  } else {
			  $url = $this->fvseo_mrt_get_url($wp_query);
		  }

			if ($url)
			{
				$url = apply_filters('fvseop_canonical_url', $url);

				echo '<link rel="canonical" href="' . esc_url($url) . '" />' . "\n";
			}
		}
	}
	
	function fvseo_mrt_get_url($query)
	{
		global $fvseop_options;

		if ($query->is_404 || $query->is_search)
		{
			return false;
		}

		$haspost = count($query->posts) > 0;
		$has_ut = function_exists('user_trailingslashit');

		if (get_query_var('m'))
		{
			$m = preg_replace('/[^0-9]/', '', get_query_var('m'));
			
			switch (strlen($m))
			{
			case 4:
				$link = get_year_link($m);
				break;
			case 6:
				$link = get_month_link(substr($m, 0, 4), substr($m, 4, 2));
				break;
			case 8:
				$link = get_day_link(substr($m, 0, 4), substr($m, 4, 2), substr($m, 6, 2));
				break;
			default:
				return false;
			}
		}
		elseif (($query->is_single || $query->is_page) && $haspost)
		{
			$post = $query->posts[0];
			$link = get_permalink($post->ID);
			$link = $this->yoast_get_paged($link); 
		}
		elseif ($query->is_author && $haspost)
		{
			$author = get_userdata(get_query_var('author'));

			if ($author === false)
				return false;

			$link = get_author_link(false, $author->ID, $author->user_nicename);
		}
		elseif ($query->is_category && $haspost)
		{
			$link = get_category_link(get_query_var('cat'));
			$link = $this->yoast_get_paged($link);
		}
		elseif ($query->is_tag  && $haspost)
		{
			$tag = get_term_by('slug', get_query_var('tag'), 'post_tag');
			
			if (!empty($tag->term_id))
			{
				$link = get_tag_link($tag->term_id);
			}
			
			$link = $this->yoast_get_paged($link);			
		}
		elseif ($query->is_day && $haspost)
		{
			$link = get_day_link(get_query_var('year'), get_query_var('monthnum'), get_query_var('day'));
		}
		elseif ($query->is_month && $haspost)
		{
			$link = get_month_link(get_query_var('year'), get_query_var('monthnum'));
		}
		elseif ($query->is_year && $haspost)
		{
			$link = get_year_link(get_query_var('year'));
		}
		elseif ($query->is_home)
		{
			if ((get_option('show_on_front') == 'page') && ($pageid = get_option('page_for_posts')))
			{
				$link = get_permalink($pageid);
				$link = $this->yoast_get_paged($link);
				$link = trailingslashit($link);
			}
			else
			{
				$link = get_option('home');
				$link = $this->yoast_get_paged($link);
				$link = trailingslashit($link);
			}
		}
		else
		{
			return false;
		}
		
		return $link;
	}
	
	function yoast_get_paged($link)
	{
		$page = get_query_var('paged');

		if ($page && $page > 1)
		{
			$link = trailingslashit($link) ."page/". "$page";

			if ($has_ut)
			{
				$link = user_trailingslashit($link, 'paged');
			}
			else
			{
				$link .= '/';
			}
		}

		return $link;
	}
	
	
  function paged_description($description = NULL)
 	{
 		// the page number if paged
 		global $paged;
 		global $fvseop_options;
 		// simple tagging support
 		global $STagging;
 
 		if( is_paged() )
 		{
 			$part = $this->internationalize( $fvseop_options['aiosp_paged_format'] );
 
 			if( isset($part) || !empty($part) )
 			{
 				$part = trim($part);
 				$part = str_replace('%page%', $paged, $part);
 				$description .= $part;
 			}
 		}
 
 		return $description;
 	}	
 		

	function get_post_description($post)
	{
		global $fvseop_options;

		$description = trim(stripcslashes($this->internationalize(get_post_meta($post->ID, "_aioseop_description", true))));

		if (!$description)
		{
			///	Addition - condition added
			if(!$fvseop_options['aiosp_dont_use_excerpt']) {
				$description = $this->trim_excerpt_without_filters_full_length($this->internationalize($post->post_excerpt));
			}
			///	End of addition

			if (!$description && $fvseop_options["aiosp_generate_descriptions"])
			{
				$description = $this->trim_excerpt_without_filters($this->internationalize($post->post_content));
			}				
		}

		// "internal whitespace trim"
		$description = preg_replace("/\s\s+/", " ", $description);

		return $description;
	}

	/**
	 * Replace the title using regular expressions. If the regular expression fails
	 * (probably a backtrack limit error) you need to fix your environment.
	 */
	function replace_title($content, $title)
	{
    $title = __($title);
		return preg_replace('/<title>(.*?)<\/title>/ms', '<title>' . esc_html($title) . '</title>', $content, 1);
	}
	
	/** @return The original title as delivered by WP (well, in most cases) */
	function get_original_title()
	{
		global $wp_query;
		global $fvseop_options;
		
		if (!$wp_query)
		{
			return null;	
		}
		
		$post = $wp_query->get_queried_object();
		
		// the_search_query() is not suitable, it cannot just return
		global $s;

		$title = null;
		
		if (is_home())
		{
			$title = get_option('blogname');
		}
		elseif (is_single())
		{
			$title = $this->internationalize( /*wp_title('', false)*/ get_the_title($post->ID) );
		}
		elseif (is_search() && isset($s) && !empty($s))
		{
			if (function_exists('attribute_escape'))
			{
				$search = attribute_escape(stripcslashes($s));
			}
			else
			{
				$search = wp_specialchars(stripcslashes($s), true);
			}
			
			$search = $this->capitalize($search);
			$title = $search;
		}
		elseif (is_category() && !is_feed())
		{
			$category_description = $this->internationalize(category_description());
			$category_name = ucwords($this->internationalize(single_cat_title('', false)));
			$title = $category_name;
		}
		elseif (is_page())
		{
			$title = $this->internationalize( /*wp_title('', false)*/ get_the_title() );
		}
		elseif (function_exists('is_tag') && is_tag())
		{
			$tag = $this->internationalize(wp_title('', false));

			if ($tag)
			{
				$title = $tag;
			}
		}
		else if (is_archive())
		{
			$title = $this->internationalize(wp_title('', false));
		}
		else if (is_404())
		{
			$title_format = stripslashes( $fvseop_options['aiosp_404_title_format'] );

			$new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
			$new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
			$new_title = str_replace('%request_url%', esc_url($_SERVER['REQUEST_URI']), $new_title);
			$new_title = str_replace('%request_words%', $this->request_as_words(esc_url($_SERVER['REQUEST_URI'])), $new_title);
			
			$title = $new_title;
		}

		return trim($title);
	}
	
	function paged_title($title)
	{
		// the page number if paged
		global $paged;
		global $fvseop_options;
		// simple tagging support
		global $STagging;

		if (is_paged() || (isset($STagging) && $STagging->is_tag_view() && $paged))
		{
 			$part = stripslashes( $this->internationalize($fvseop_options['aiosp_paged_format']) );

			if (isset($part) || !empty($part))
			{
				$part = " " . trim($part);
				$part = str_replace('%page%', $paged, $part);
				$title .= $part;
			}
		}

		return $title;
	}
	
	function is_custom_post_type( $post = NULL )
	{
	    $all_custom_post_types = get_post_types( array ( '_builtin' => FALSE ) );

	    // there are no custom post types
	    if ( empty ( $all_custom_post_types ) )
	        return FALSE;

	    $custom_types      = array_keys( $all_custom_post_types );
	    $current_post_type = get_post_type( $post );

	    // could not detect current type
	    if ( ! $current_post_type )
	        return FALSE;

	    return in_array( $current_post_type, $custom_types );
	}

	function rewrite_title($header)
	{
		global $fvseop_options;
		global $wp_query;
		
		if (!$wp_query)
		{
			return $header;	
		}
		
		$post = $wp_query->get_queried_object();
		
		// the_search_query() is not suitable, it cannot just return
		global $s;
		
		global $STagging;

    //  change homepage title only if there is some in configuration. 
		if (is_home() && !$this->is_static_posts_page() && stripcslashes( $this->internationalize($fvseop_options['aiosp_home_title']) ) != '' /*&& $fvseop_options['aiosp_rewrite_titles']*/)
		{
			$title = stripcslashes( $this->internationalize( $fvseop_options['aiosp_home_title'] ) );
			
			if (empty($title))
			{
				$title = $this->internationalize(get_option('blogname'));
			}

			$title = $this->paged_title($title);
			$header = $this->replace_title($header, $title);
		}
		else if (is_attachment()        && $fvseop_options['aiosp_rewrite_titles'])
		{
			$title = get_the_title($post->post_parent).' '.$post->post_title.' – '.get_option('blogname');
			$header = $this->replace_title($header,$title);
		}
		else if (is_single())
		{
			// we're not in the loop :(
			$authordata = get_userdata($post->post_author);
			$categories = get_the_category();
			$category = '';
			
			if (count($categories) > 0)
			{
				$category = $categories[0]->cat_name;
			}

			$title = $this->internationalize(get_post_meta($post->ID, "_aioseop_title", true));
			
			if (!$title)
			{
				$title = $this->internationalize(get_post_meta($post->ID, "title_tag", true));
				
				if (!$title)
				{
					$title = $this->internationalize( /*wp_title('', false)*/ get_the_title() );
				}
			}

                        if( $fvseop_options['aiosp_rewrite_titles'] ) {
                            $title_format = stripslashes( $fvseop_options['aiosp_post_title_format'] );
    
                            $new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
                            $new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
                            $new_title = str_replace('%post_title%', $title, $new_title);
                            $new_title = str_replace('%category%', $category, $new_title);
                            $new_title = str_replace('%category_title%', $category, $new_title);
                            $new_title = str_replace('%post_author_login%', $authordata->user_login, $new_title);
                            $new_title = str_replace('%post_author_nicename%', $authordata->user_nicename, $new_title);
                            $new_title = str_replace('%post_author_firstname%', ucwords($authordata->first_name), $new_title);
                            $new_title = str_replace('%post_author_lastname%', ucwords($authordata->last_name), $new_title);
                        }
                        /// Addition
                        else
                            $new_title = $title;

			$title = $new_title;
			$title = trim($title);
			$title = apply_filters('fvseo_title_single',$title);

			$header = $this->replace_title($header, $title);
		}
		elseif (is_search() && isset($s) && !empty($s)      && $fvseop_options['aiosp_rewrite_titles'])
		{
			if (function_exists('attribute_escape'))
			{
				$search = attribute_escape(stripcslashes($s));
			}
			else
			{
				$search = wp_specialchars(stripcslashes($s), true);
			}

			$search = $this->capitalize($search);
			$title_format = stripslashes( $fvseop_options['aiosp_search_title_format'] );

			$title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
			$title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $title);
			$title = str_replace('%search%', $search, $title);
			
			$header = $this->replace_title($header, $title);
		}
		elseif (is_category() && !is_feed()     && $fvseop_options['aiosp_rewrite_titles'])
		{
			$category_description = $this->internationalize(category_description());

			if($fvseop_options['aiosp_cap_cats'])
			{
				$category_name = ucwords($this->internationalize(single_cat_title('', false)));
			}
			else
			{
				$category_name = $this->internationalize(single_cat_title('', false));
			}			

			$title_format = stripslashes( $fvseop_options['aiosp_category_title_format'] );

			$title = str_replace('%category_title%', $category_name, $title_format);
			$title = str_replace('%category_description%', $category_description, $title);
			$title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title);
			$title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $title);
			$title = $this->paged_title($title);
			
			$header = $this->replace_title($header, $title);
		}
		/// Modification  2011/01/26  - possibly a bugfix
		elseif (is_page() || $this->is_static_front_page())
		//elseif (is_page() || $this->is_static_posts_page())
		/// End of modification
		{
			// we're not in the loop :(
			$authordata = get_userdata($post->post_author);

			if ($this->is_static_front_page())
			{
				if ( stripcslashes( $this->internationalize($fvseop_options['aiosp_home_title']) ) )
				{
					//home title filter
					$home_title = stripcslashes( $this->internationalize( $fvseop_options['aiosp_home_title'] ) );
					$home_title = apply_filters('fvseop_home_page_title',$home_title);
					
					$header = $this->replace_title($header, $home_title);
				}
			}
			else
			{
				$title = $this->internationalize(get_post_meta($post->ID, "_aioseop_title", true));
				
				if (!$title)
				{
					$title = $this->internationalize( /*wp_title('', false)*/ get_the_title($post->ID) );
				}
                                
                                if( $fvseop_options['aiosp_rewrite_titles'] ) {

                                    $title_format = stripslashes( $fvseop_options['aiosp_page_title_format'] );
    
                                    $new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
                                    $new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
                                    $new_title = str_replace('%page_title%', $title, $new_title);
                                    $new_title = str_replace('%page_author_login%', $authordata->user_login, $new_title);
                                    $new_title = str_replace('%page_author_nicename%', $authordata->user_nicename, $new_title);
                                    $new_title = str_replace('%page_author_firstname%', ucwords($authordata->first_name), $new_title);
                                    $new_title = str_replace('%page_author_lastname%', ucwords($authordata->last_name), $new_title);
                                
                                }
                                /// Addition
                                else
                                    $new_title = $title;

				$title = trim($new_title);
				$title = apply_filters('fvseop_title_page', $title);

				$header = $this->replace_title($header, $title);
			}
		}
		elseif (function_exists('is_tag') && is_tag()       && $fvseop_options['aiosp_rewrite_titles'])
		{
			$tag = single_term_title( '', false );

			if ($tag)
			{
				$tag = $this->capitalize($tag);
				$title_format = stripslashes( $fvseop_options['aiosp_tag_title_format'] );
	            
				$title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
				$title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $title);
				$title = str_replace('%tag%', $tag, $title);
				$title = $this->paged_title($title);
				
				$header = $this->replace_title($header, $title);
			}
		}
		elseif (isset($STagging) && $STagging->is_tag_view()        && $fvseop_options['aiosp_rewrite_titles']) // simple tagging support
		{
			$tag = $STagging->search_tag;
			
			if ($tag)
			{
				$tag = $this->capitalize($tag);
				$title_format = stripslashes( $fvseop_options['aiosp_tag_title_format'] );

				$title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
				$title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $title);
				$title = str_replace('%tag%', $tag, $title);
				$title = $this->paged_title($title);

				$header = $this->replace_title($header, $title);
			}
		}
		else if (is_tax() && $fvseop_options['aiosp_rewrite_titles']) {
			$t_sep = ' ';
			$title_format = stripslashes( $fvseop_options['aiosp_custom_taxonomy_title_format'] );
			$term = get_queried_object();
			$tax = get_taxonomy( $term->taxonomy );
			$sCategoryName = $tax->labels->name;
			//$sCategoryTitle = single_term_title($tax->labels->name . $t_sep, false);
			//if ($this->is_custom_post_type()) {
				$sCategoryTitle = single_term_title('', false );
			//}
			$new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
			$new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
			$new_title = str_replace('%tax_type_title%', $sCategoryName, $new_title);
			$new_title = str_replace('%tax_title%', $sCategoryTitle, $new_title);

			$title = trim($new_title);
			$title = $this->paged_title($title);

			$header = $this->replace_title($header, $title);
		}
		else if (is_archive()       && $fvseop_options['aiosp_rewrite_titles'])
		{
			$title_format = stripslashes( $fvseop_options['aiosp_archive_title_format'] );
			$t_sep = ' ';
			if( is_date() ) {
				//	taken from wp_title()
				global $wp_locale;
				$m = get_query_var('m');
				$year = get_query_var('year');
				$monthnum = get_query_var('monthnum');
				$day = get_query_var('day');
				
				if( !empty($m) ) {
					$my_year = substr($m, 0, 4);
					$my_month = $wp_locale->get_month(substr($m, 4, 2));
					$my_day = intval(substr($m, 6, 2));
					$archive_title = $my_year . ( $my_month ? $t_sep . $my_month : '' ) . ( $my_day ? $t_sep . $my_day : '' );
				}	
				if( !empty($year) ) {
					$archive_title = $year;
					if ( !empty($monthnum) )
						$archive_title .= $t_sep . $wp_locale->get_month($monthnum);
					if ( !empty($day) )
						$archive_title .= $t_sep . zeroise($day, 2);
				}
			} else if (is_post_type_archive()) {
				$term = get_queried_object();
				$archive_title = $term->labels->name;
			}
			if ($this->is_custom_post_type()) {
				$title_format = stripslashes( $fvseop_options['aiosp_custom_taxonomy_title_format'] );
			}
			$new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
			$new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
			$new_title = str_replace('%date%', $archive_title, $new_title);

			$title = trim($new_title);
			$title = $this->paged_title($title);

			$header = $this->replace_title($header, $title);
		}
		else if (is_404()       && $fvseop_options['aiosp_rewrite_titles'])
		{
			$title_format = stripslashes( $fvseop_options['aiosp_404_title_format'] );

			$new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
			$new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
			$new_title = str_replace('%request_url%', esc_url($_SERVER['REQUEST_URI']), $new_title);
			$new_title = str_replace('%request_words%', $this->request_as_words(esc_url($_SERVER['REQUEST_URI'])), $new_title);
			$new_title = str_replace('%404_title%', $this->internationalize(wp_title('', false)), $new_title);

			$header = $this->replace_title($header, $new_title);
		}
		
		return $header;
	}
	
	/**
	 * @return User-readable nice words for a given request.
	 */
	function request_as_words($request)
	{
		$request = htmlspecialchars($request);
		$request = str_replace('.html', ' ', $request);
		$request = str_replace('.htm', ' ', $request);
		$request = str_replace('.', ' ', $request);
		$request = str_replace('/', ' ', $request);

		$request_a = explode(' ', $request);
		$request_new = array();

		foreach ($request_a as $token)
		{
			$request_new[] = ucwords(trim($token));
		}

		$request = implode(' ', $request_new);

		return $request;
	}
	
	function trim_excerpt_without_filters($text)
	{
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $text);
		$text = strip_tags($text);

		$max = $this->maximum_description_length;

		if ($max < strlen($text))
		{
			while ($text[$max] != ' ' && $max > $this->minimum_description_length)
			{
				$max--;
			}
		}

		$text = substr($text, 0, $max);

		return trim(stripcslashes($text));
	}
	
	function trim_excerpt_without_filters_full_length($text)
	{
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $text);
		$text = strip_tags($text);

		return trim(stripcslashes($text));
	}
	
	/**
	 * @return comma-separated list of unique keywords
	 */
	function get_all_keywords()
	{
		global $posts;
		global $fvseop_options;

		if (is_404())
		{
			return null;
		}
		
		// if we are on synthetic pages
		if (!is_home() && !is_page() && !is_single() &&!$this->is_static_front_page() && !$this->is_static_posts_page()) 
		{
			return null;
		}

		$keywords = array();
		
		if (is_array($posts))
		{
         /// optimalization HACKs by peter
         /// Pre-cache post meta and tags and categories if needed and if WP version permits it
         $aIDs = array();
         foreach( $posts as $objPost ) $aIDs[] = $objPost->ID;

         if( function_exists( 'update_meta_cache' ) ) update_meta_cache( 'post', $aIDs );
         if( ( $fvseop_options['aiosp_use_tags_as_keywords'] || ( $fvseop_options['aiosp_use_categories'] && !is_page() ) )
               && function_exists( 'wp_get_object_terms' )
               && function_exists( 'wp_cache_add' ) )
         {
            $aTax = array();
            if( $fvseop_options['aiosp_use_tags_as_keywords'] ) $aTax[] = 'post_tag';
            if( $fvseop_options['aiosp_use_categories'] && !is_page() ) $aTax[] = 'category';

            $aRawTerms = array();
            if( 0 < count( $aIDs ) && 0 < count( $aTax ) )
               $aRawTerms = wp_get_object_terms( $aIDs, $aTax, array( 'orderby' => 'count', 'order' => 'DESC', 'fields' => 'all_with_object_id' ) );
            $aTags = array();
            $aCats = array();


            foreach( $aRawTerms as $objTerm ){
               if( !isset( $aTags[$objTerm->object_id] ) ) $aTags[$objTerm->object_id] = array();
               if( !isset( $aCats[$objTerm->object_id] ) ) $aCats[$objTerm->object_id] = array();

               if( 'category' == $objTerm->taxonomy ) $aCats[$objTerm->object_id][] = $objTerm;
               if( 'post_tag' == $objTerm->taxonomy ) $aTags[$objTerm->object_id][] = $objTerm;
            }

            if( $fvseop_options['aiosp_use_categories'] && !is_page() )
               foreach( $aCats as $id => $aPostCats )
                  wp_cache_add( $id, $aPostCats, 'category_relationships');
            if( $fvseop_options['aiosp_use_tags_as_keywords'] )
               foreach( $aTags as $id => $aPostTags )
                  wp_cache_add( $id, $aPostTags, 'post_tag_relationships');
         }


			foreach ($posts as $post)
			{
				if ($post)
				{
					// custom field keywords
					$keywords_a = $keywords_i = null;
					$description_a = $description_i = null;

					$id = is_attachment() ? $post->post_parent : $post->ID; // if attachment then use parent post id

					$keywords_i = stripcslashes($this->internationalize(get_post_meta($id, "_aioseop_keywords", true)));
					$keywords_i = str_replace('"', '', $keywords_i);
	                
					if (isset($keywords_i) && !empty($keywords_i))
					{
						$traverse = explode(',', $keywords_i);
	                	
						foreach ($traverse as $keyword) 
						{
							$keywords[] = $keyword;
						}
					}
	                
					if ($fvseop_options['aiosp_use_tags_as_keywords'])
					{
						if (function_exists('get_the_tags'))
						{
							$tags = get_the_tags($id);

							if ($tags && is_array($tags))
							{
								foreach ($tags as $tag)
								{
									$keywords[] = $this->internationalize($tag->name);
								}
							}
						}
					}

					// autometa
					$autometa = stripcslashes(get_post_meta($id, 'autometa', true));

					if (isset($autometa) && !empty($autometa))
					{
						$autometa_array = explode(' ', $autometa);
						
						foreach ($autometa_array as $e) 
						{
							$keywords[] = $e;
						}
					}

					if ($fvseop_options['aiosp_use_categories'] && !is_page())
					{
						$categories = get_the_category($id); 

						foreach ($categories as $category)
						{
							$keywords[] = $this->internationalize($category->cat_name);
						}
					}
				}
			}
		}

		return $this->get_unique_keywords($keywords);
	}

	function get_unique_keywords($keywords)
	{
		$small_keywords = array();
		
		foreach ($keywords as $word)
		{
			if (function_exists('mb_strtolower'))			
				$small_keywords[] = mb_strtolower($word, get_bloginfo('charset'));
			else 
				$small_keywords[] = $this->strtolower($word);
		}
		
		$keywords_ar = array_unique($small_keywords);
		
		return implode(',', $keywords_ar);
	}

	/** crude approximization of whether current user is an admin */
	function is_admin()
	{
		return current_user_can('level_8');
	}

	function post_meta_tags($id)
	{
	  if( isset( $_POST['fvseo_edit'] ) ) {
		  $awmp_edit = $_POST['fvseo_edit'];
	  }
	  if( isset( $_POST['nonce-fvseopedit'] ) ) {
		  $nonce = $_POST['nonce-fvseopedit'];
	  }

		if (isset($awmp_edit) && !empty($awmp_edit) && wp_verify_nonce($nonce, 'edit-fvseopnonce'))
		{
			$keywords = isset( $_POST["fvseo_keywords"] ) ? $_POST["fvseo_keywords"] : NULL;
			if (function_exists('qtrans_getSortedLanguages')) {        
        $languages = qtrans_getSortedLanguages();          
        $title = '';
        foreach($languages as $language) {
          if ($_POST['fvseo_title_' . $language] != '') {
            $title .= '<!--:' . $language . '-->' . $_POST['fvseo_title_' . $language] . '<!--:-->';
          }
        }                                                  
        $description = '';
        foreach($languages as $language) {
          if ($_POST['fvseo_description_' . $language] != '')  {
            $description .= '<!--:' . $language . '-->' . $_POST['fvseo_description_' . $language] . '<!--:-->';
          }
        }                    
      }
      else {        
        $description = isset( $_POST["fvseo_description"] ) ? $_POST["fvseo_description"] : NULL;
        $title = isset( $_POST["fvseo_title"] ) ? $_POST["fvseo_title"] : NULL;
      }
			$fvseo_meta = isset( $_POST["fvseo_meta"] ) ? $_POST["fvseo_meta"] : NULL;
			$fvseo_disable = isset( $_POST["fvseo_disable"] ) ? $_POST["fvseo_disable"] : NULL;
			$fvseo_titleatr = isset( $_POST["fvseo_titleatr"] ) ? $_POST["fvseo_titleatr"] : NULL;
			$fvseo_menulabel = isset( $_POST["fvseo_menulabel"] ) ? $_POST["fvseo_menulabel"] : NULL;
			$custom_canonical = isset( $_POST["fvseo_custom_canonical"] ) ? $_POST["fvseo_custom_canonical"] : NULL;	
			$noindex = isset( $_POST["fvseo_noindex"] ) ? true : false;				
			$nofollow = isset( $_POST["fvseo_nofollow"] ) ? true : false;							
				
			delete_post_meta($id, '_aioseop_keywords');
			delete_post_meta($id, '_aioseop_description');
			delete_post_meta($id, '_aioseop_title');
			delete_post_meta($id, '_aioseop_titleatr');
			delete_post_meta($id, '_aioseop_menulabel');
			delete_post_meta($id, '_aioseop_custom_canonical');		
			delete_post_meta($id, '_aioseop_noindex');		
			delete_post_meta($id, '_aioseop_nofollow');					
		
			if ($this->is_admin())
			{
				delete_post_meta($id, '_aioseop_disable');
			}

			if (isset($keywords) && !empty($keywords))
			{
				add_post_meta($id, '_aioseop_keywords', $keywords);
			}

			if (isset($description) && !empty($description))
			{
				add_post_meta($id, '_aioseop_description', $description);
			}

			if (isset($title) && !empty($title) && $title != get_the_title( $id ) )
			{
				add_post_meta($id, '_aioseop_title', $title);
			}
		    
			if (isset($fvseo_titleatr) && !empty($fvseo_titleatr))
			{
				add_post_meta($id, '_aioseop_titleatr', $fvseo_titleatr);
			}

			if (isset($fvseo_menulabel) && !empty($fvseo_menulabel))
			{
				add_post_meta($id, '_aioseop_menulabel', $fvseo_menulabel);
			}				

			if (isset($fvseo_disable) && !empty($fvseo_disable) && $this->is_admin())
			{
				add_post_meta($id, '_aioseop_disable', $fvseo_disable);
			}

			if (isset($custom_canonical) && !empty($custom_canonical))
			{
				add_post_meta($id, '_aioseop_custom_canonical', str_replace(" ","%20", $custom_canonical ) );
			}			
			if (isset($noindex) && !empty($noindex))
			{
				add_post_meta($id, '_aioseop_noindex', true );
			}		
			if (isset($nofollow) && !empty($nofollow))
			{
				add_post_meta($id, '_aioseop_nofollow', true );
			}					
		}
	}

	/**
	 * Defines the sub-menu admin page using the add_submenu_page function.
	 */
	function admin_menu()
	{
		add_submenu_page('options-general.php', __('FV Simpler SEO', 'fv_seo'), __('FV Simpler SEO', 'fv_seo'), 'manage_options', $this->plugin_slug, array($this, 'options_panel'));
	}
	
	
	function admin_settings_basic() {
		global $fvseop_options;
	?>
		<p>
				<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_home_title_tip');">
					<?php _e('Home Title:', 'fv_seo')?>
				</a><br />
				<input type="text" class="regular-text" size="63" name="fvseo_home_title" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_home_title']))?>" />
				<div style="max-width:500px; text-align:left; display:none" id="fvseo_home_title_tip">
					<?php _e('As the name implies, this will be the title of your homepage. This is independent of any other option. If not set, the default blog title will get used.', 'fv_seo')?>
				</div>
		</p>
		<p>
				<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_home_description_tip');">
					<?php _e('Home Description:', 'fv_seo')?>
				</a><br />
				<textarea cols="57" rows="2" name="fvseo_home_description"><?php echo esc_attr(stripcslashes($fvseop_options['aiosp_home_description']))?></textarea>
				<div style="max-width:500px; text-align:left; display:none" id="fvseo_home_description_tip">
					<?php _e('The META description for your homepage. Independent of any other options, the default is no META description at all if this is not set.', 'fv_seo')?>
				</div>
		</p>
		<p>
				<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_home_keywords_tip');">
					<?php _e('Home Keywords (comma separated):', 'fv_seo')?>
				</a><br />
				<textarea cols="57" rows="2" name="fvseo_home_keywords"><?php echo esc_attr(stripcslashes($fvseop_options['aiosp_home_keywords'])); ?></textarea>
				<div style="max-width:500px; text-align:left; display:none" id="fvseo_home_keywords_tip">
					<?php _e("A comma separated list of your most important keywords for your site that will be written as META keywords on your homepage. Don't stuff everything in here.", 'fv_seo')?>
				</div>
		</p>
		<p>
			 <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_warnings_tip');">
					<?php _e('Warn me when publishing without a title or description:', 'fv_seo')?>
			 </a>
	
			 <label for="fvseo_publ_warnings">&nbsp;&nbsp;</label>            
			 <input type="checkbox" name="fvseo_publ_warnings" id="fvseo_publ_warnings" <?php if ( $fvseop_options['fvseo_publ_warnings'] == 1 ) echo 'checked="yes"'; ?> value="1">
			 <label for="fvseo_publ_warnings">&nbsp;&nbsp;</label>
	
			 <div style="max-width:500px; text-align:left; display:none" id="fvseo_warnings_tip">
					<?php _e("Uncheck this if you don't want to be warned in case you are publishing without a title or description. Default: checked.", 'fv_seo')?>
			 </div>
		</p>	
	<?php
	}
	
	
	function admin_settings_interface() {
		global $fvseop_options;
	?>
		<p>
				<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_show_keywords_tip');">
				<?php _e('Add keywords field to post editing screen:', 'fv_seo')?>
				</a>
				<input type="checkbox" name="fvseo_show_keywords" <?php if ($fvseop_options['aiosp_show_keywords']) echo "checked=\"1\""; ?>/>
				<div style="max-width:500px; text-align:left; display:none" id="fvseo_show_keywords_tip">
				<?php
				_e("You don't need this field at all if you are using tags properly. It makes the FV Simpler SEO box in the editing screen more complicated too.", 'fv_seo');
				 ?>
				</div>
		</p>
		<p>
				<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_show_noindex_tip');">
				<?php _e('Add no index checkbox to post editing screen:', 'fv_seo')?>
				</a>
				<input type="checkbox" name="fvseo_show_noindex" <?php if( isset($fvseop_options['aiosp_show_noindex']) && $fvseop_options['aiosp_show_noindex'] ) echo "checked=\"1\""; ?>/>
				<div style="max-width:500px; text-align:left; display:none" id="fvseo_show_noindex_tip">
				<?php
				_e("Adds a powerful checkbox to post editing screens which let's you exclude the post from search engine indexing. <strong>Warning:</strong> only use if you really know what you are doing.", 'fv_seo');
				 ?>
				</div>
		</p>                            	
		<p>
				<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_show_custom_canonical_tip');">
				<?php _e('Experimental - Use Custom Canonical URL field:', 'fv_seo')?>
				</a>
				<input type="checkbox" name="fvseo_show_custom_canonical" <?php if( isset($fvseop_options['aiosp_show_custom_canonical']) && $fvseop_options['aiosp_show_custom_canonical'] ) echo "checked=\"1\""; ?>/>
				<script type="text/javascript">
				jQuery("input[name='fvseo_show_custom_canonical']").change( function() {
					if( jQuery(this).is(':checked') ) {
						if (confirm(" <?php _e('Are you sure you want to turn on this feature? Using wrong custom canonical URLs can damage your site SEO rankings.\n\n If you are not sure, then leave this off and Wordpress will take care of it on its own.', 'fv_seo'); ?> ")) {
						} else {
							jQuery(this).removeAttr('checked');
						}
					}
				});
				</script>
				<div style="max-width:500px; text-align:left; display:none" id="fvseo_show_custom_canonical_tip">
				<?php
				_e("Use this feature only if you are sure you want to enter custom canonical URLs. This is not affected by the \"Canonical URLs\" Advanced Option (bellow).", 'fv_seo');
				 ?>
				</div>
		</p>                            	
		<p>
				<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_show_titleattribute_tip');">
				<?php _e('Add Title Attribute field to page editing screen (deprecated):', 'fv_seo')?>
				</a>
				<input type="checkbox" name="fvseo_show_titleattribute" <?php if ($fvseop_options['aiosp_show_titleattribute']) echo "checked=\"1\""; ?>/>
				<div style="max-width:500px; text-align:left; display:none" id="fvseo_show_titleattribute_tip">
				<?php
				_e("Allows you to set the anchor title for pages in menus. You don't need this field at all because post title or Long Title will be used instead.", 'fv_seo');
				 ?>
				</div>
		</p>		
		<p>
				<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_show_short_title_post_tip');">
				<?php _e('Add Short Title Attribute field to post editing screen:', 'fv_seo')?>
				</a>
				<input type="checkbox" name="fvseo_show_short_title_post" <?php if( isset($fvseop_options['aiosp_show_short_title_post']) && $fvseop_options['aiosp_show_short_title_post'] ) echo "checked=\"1\""; ?>/>
				<div style="max-width:500px; text-align:left; display:none" id="fvseo_show_short_title_post_tip">
				<?php
				_e("Stored as _aioseop_menulabel postmeta.", 'fv_seo');
				 ?>
				</div>
		</p>
		<p>
				<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_show_sidebar_short_title_tip');">
				<?php _e('Enable using short titles in sidebars:', 'fv_seo')?>
				</a>
				<input type="checkbox" name="fvseo_sidebar_short_title" <?php if( isset($fvseop_options['aiosp_sidebar_short_title']) && $fvseop_options['aiosp_sidebar_short_title'] ) echo "checked=\"1\""; ?>/>
				<div style="max-width:500px; text-align:left; display:none" id="fvseo_show_sidebar_short_title_tip">
				<?php
				_e("Use short titles instead on sidebar post titles. Add Short Title Attribute field to post editing screen option have to be enabled", 'fv_seo');
				 ?>
				</div>
		</p>
		<p>
				<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_show_disable_tip');">
				<?php _e('Add "Disable on this post/page" checkbox to post editing screen (deprecated):', 'fv_seo')?>
				</a>
				<input type="checkbox" name="fvseo_show_disable" <?php if ($fvseop_options['aiosp_show_disable']) echo "checked=\"1\""; ?>/>
				<div style="max-width:500px; text-align:left; display:none" id="fvseo_show_disable_tip">
				<?php
				_e("Let's you disable the plugin for a specific post or page.", 'fv_seo');
				 ?>
				</div>
		</p>	
	<?php
	}
	
	
	function admin_settings_advanced() {
		global $fvseop_options;
	?>
						<p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_can_tip');">
                  <?php _e('Canonical URLs:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_can" <?php if ($fvseop_options['aiosp_can']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_can_tip">
                  <?php _e("This option will automatically generate Canonical URLS for your entire WordPress installation.  This will help to prevent duplicate content penalties by <a href='http://googlewebmastercentral.blogspot.com/2009/02/specify-your-canonical.html' target='_blank'>Google</a>.", 'fv_seo')?>
                </div>
            </p>
            <p>
               <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_shorten_slugs');">
                  <?php _e('Shorten Post / Page name:', 'fv_seo')?>
               </a>
               <input type="checkbox" name="fvseo_shorten_slugs" <?php if( isset($fvseop_options['aiosp_shorten_slugs']) && $fvseop_options['aiosp_shorten_slugs'] ) echo 'checked="checked"'; ?>/>
               <div style="max-width:500px; text-align:left; display:none" id="fvseo_shorten_slugs">
                  <?php _e("This option will automatically shorten a link to post / page upon first save.", 'fv_seo')?>
               </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_rewrite_titles_tip');">
                  <?php _e('Rewrite Titles:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_rewrite_titles" <?php if ($fvseop_options['aiosp_rewrite_titles']) echo 'checked="checked"'; ?> onclick="toggleVisibility('fvseo_rewrite_titles_options');" /> <abbr title="Not required for most modern templates. Enable to see more options.">(?)</a>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_rewrite_titles_tip">
                  <?php _e("Note that this is all about the title tag. This is what you see in your browser's window title bar. This is NOT visible on a page, only in the window title bar and of course in the source. If set, all page, post, category, search and archive page titles get rewritten. You can specify the format for most of them. For example: The default templates puts the title tag of posts like this: Blog Archive >> Blog Name >> Post Title (maybe I've overdone slightly). This is far from optimal. With the default post title format, Rewrite Title rewrites this to Post Title | Blog Name. If you have manually defined a title (in one of the text fields for All in One SEO Plugin input) this will become the title of your post in the format string.", 'fv_seo')?>
                </div>
            </p>
            
            <div style="width: 470px; background: #f0f0f0; padding: 10px; margin-left: 20px; text-align:left; display:<?php if ($fvseop_options['aiosp_rewrite_titles']) echo 'block'; else echo 'none'; ?>" id="fvseo_rewrite_titles_options">
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_post_title_format_tip');">
                        <?php _e('Post Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_post_title_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_post_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_post_title_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%post_title% - The original title of the post', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%category_title% - The (main) category of the post', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%category% - Alias for %category_title%', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%post_author_login% - This post's author' login", 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%post_author_nicename% - This post's author' nicename", 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%post_author_firstname% - This post's author' first name (capitalized)", 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%post_author_lastname% - This post's author' last name (capitalized)", 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>    
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_page_title_format_tip');">
                      <?php _e('Page Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_page_title_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_page_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_page_title_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%page_title% - The original title of the page', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%page_author_login% - This page's author' login", 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%page_author_nicename% - This page's author' nicename", 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%page_author_firstname% - This page's author' first name (capitalized)", 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%page_author_lastname% - This page's author' last name (capitalized)", 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>    
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_category_title_format_tip');">
                      <?php _e('Category Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_category_title_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_category_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_category_title_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%category_title% - The original title of the category', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%category_description% - The description of the category', 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>   
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_archive_title_format_tip');">
                      <?php _e('Archive Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_archive_title_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_archive_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_archive_title_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%date% - The original archive title given by wordpress, e.g. "2007" or "2007 August"', 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>   
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_tag_title_format_tip');">
                      <?php _e('Tag Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_tag_title_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_tag_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_tag_title_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%tag% - The name of the tag', 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_custom_taxonomy_title_format_tip');">
                      <?php _e('Custom taxonomy Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_custom_taxonomy_title_format" value="<?php if (isset($fvseop_options['aiosp_custom_taxonomy_title_format'])) echo esc_attr(stripcslashes($fvseop_options['aiosp_custom_taxonomy_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_custom_taxonomy_title_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%tax_title% - Your actual taxonomy category title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%tax_type_title% - Your taxonomy title', 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>          
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_search_title_format_tip');">
                      <?php _e('Search Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_search_title_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_search_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_search_title_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%search% - What was searched for', 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>   
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_description_format_tip');">
                      <?php _e('Description Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_description_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_description_format'])); ?>" />
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_description_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%description% - The original description as determined by the plugin, e.g. the excerpt if one is set or an auto-generated one if that option is set', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%wp_title% - The original wordpress title, e.g. post_title for posts', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%page% - Page number for paged category archives', 'fv_seo'); echo('</li>');                        
                        echo('</ul>');
                        ?>
                    </div>
                </p>    
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_404_title_format_tip');">
                      <?php _e('404 Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_404_title_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_404_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_404_title_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%request_url% - The original URL path, like "/url-that-does-not-exist/"', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%request_words% - The URL path in human readable form, like "Url That Does Not Exist"', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%404_title% - Additional 404 title input"', 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_paged_format_tip');">
                      <?php _e('Paged Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_paged_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_paged_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_paged_format_tip">
                        <?php
                        _e('This string gets appended/prepended to titles when they are for paged index pages (like home or archive pages).', 'fv_seo');
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%page% - The page number', 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>
            </div>

            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_use_categories_tip');">
                  <?php _e('Use Categories for META keywords:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_use_categories" <?php if ($fvseop_options['aiosp_use_categories']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_use_categories_tip">
                  <?php _e('Check this if you want your categories for a given post used as the META keywords for this post (in addition to any keywords and tags you specify on the post edit page).', 'fv_seo')?>
                </div>
            </p>

            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_use_tags_as_keywords_tip');">
                  <?php _e('Use Tags for META keywords:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_use_tags_as_keywords" <?php if ($fvseop_options['aiosp_use_tags_as_keywords']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_use_tags_as_keywords_tip">
                  <?php _e('Check this if you want your tags for a given post used as the META keywords for this post (in addition to any keywords you specify on the post edit page).', 'fv_seo')?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_dynamic_postspage_keywords_tip');">
                  <?php _e('Dynamically Generate Keywords for Posts Page:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_dynamic_postspage_keywords" <?php if ($fvseop_options['aiosp_dynamic_postspage_keywords']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_dynamic_postspage_keywords_tip">
                  <?php _e('Check this if you want your keywords on a custom posts page (set it in options->reading) to be dynamically generated from the keywords of the posts showing on that page.  If unchecked, it will use the keywords set in the edit page screen for the posts page.', 'fv_seo') ?>
                </div>
            </p>          
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_remove_category_rel_tip');">
                  <?php _e('Remove Category rel attribute for validation:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_remove_category_rel" <?php if ($fvseop_options['aiosp_remove_category_rel']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_remove_category_rel_tip">
                  <?php _e('Check this if you want to remove attribute rel from links to categories. Useful for validation.', 'fv_seo') ?>
                </div>
            </p>            
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_category_noindex_tip');">
                  <?php _e('Use noindex for Categories:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_category_noindex" <?php if ($fvseop_options['aiosp_category_noindex']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_category_noindex_tip">
                  <?php _e('Check this for excluding category pages from being crawled. Useful for avoiding duplicate content.', 'fv_seo')?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_archive_noindex_tip');">
                  <?php _e('Use noindex for Archives:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_archive_noindex" <?php if ($fvseop_options['aiosp_archive_noindex']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_archive_noindex_tip">
                  <?php _e('Check this for excluding archive pages from being crawled. Useful for avoiding duplicate content.', 'fv_seo')?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_tags_noindex_tip');">
                  <?php _e('Use noindex for Tag Archives:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_tags_noindex" <?php if ($fvseop_options['aiosp_tags_noindex']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_tags_noindex_tip">
                  <?php _e('Check this for excluding tag pages from being crawled. Useful for avoiding duplicate content.', 'fv_seo')?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_search_noindex_tip');">
                  <?php _e('Use noindex for Search Results:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_search_noindex" <?php if ($fvseop_options['aiosp_search_noindex']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_search_noindex_tip">
                  <?php _e('Check this for excluding search results from being crawled. Useful for avoiding duplicate content.', 'fv_seo')?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_generate_descriptions_tip');">
                  <?php _e('Autogenerate Descriptions:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_generate_descriptions" <?php if ($fvseop_options['aiosp_generate_descriptions']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_generate_descriptions_tip">
                  <?php _e("Check this and your META descriptions will get autogenerated if there's no excerpt.", 'fv_seo')?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_cap_cats_tip');">
                  <?php _e('Capitalize Category Titles:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_cap_cats" <?php if ($fvseop_options['aiosp_cap_cats']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_cap_cats_tip">
                  <?php _e("Check this and Category Titles will have the first letter of each word capitalized.", 'fv_seo')?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_ex_pages_tip');">
                  <?php _e('Exclude Pages:', 'fv_seo')?>
                </a><br />
                <textarea cols="57" rows="2" name="fvseo_ex_pages"><?php if( isset( $fvseop_options['aiosp_ex_pages'] ) ) echo esc_attr(stripcslashes($fvseop_options['aiosp_ex_pages']))?></textarea>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_ex_pages_tip">
                  <?php _e("Enter any comma separated pages here to be excluded by All in One SEO Pack.  This is helpful when using plugins which generate their own non-WordPress dynamic pages.  Ex: <em>/forum/,/contact/</em>  For instance, if you want to exclude the virtual pages generated by a forum plugin, all you have to do is give forum or /forum or /forum/ or and any URL with the word \"forum\" in it, such as http://mysite.com/forum or http://mysite.com/forum/someforumpage will be excluded from FV Simpler SEO.", 'fv_seo')?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_post_meta_tags_tip');">
                  <?php _e('Additional Post Headers:', 'fv_seo')?>
                </a><br />
                <textarea cols="57" rows="2" name="fvseo_post_meta_tags"><?php echo htmlspecialchars(stripcslashes($fvseop_options['aiosp_post_meta_tags']))?></textarea>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_post_meta_tags_tip">
									<?php
									_e('What you enter here will be copied verbatim to your header on post pages. You can enter whatever additional headers you want here, even references to stylesheets.', 'fv_seo');
									echo '<br/>';
									_e('NOTE: This field currently only support meta tags.', 'fv_seo');
									?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_page_meta_tags_tip');">
                  <?php _e('Additional Page Headers:', 'fv_seo')?>
                </a><br />
                <textarea cols="57" rows="2" name="fvseo_page_meta_tags"><?php echo htmlspecialchars(stripcslashes($fvseop_options['aiosp_page_meta_tags']))?></textarea>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_page_meta_tags_tip">
									<?php
									_e('What you enter here will be copied verbatim to your header on pages. You can enter whatever additional headers you want here, even references to stylesheets.', 'fv_seo');
									echo '<br/>';
									_e('NOTE: This field currently only support meta tags.', 'fv_seo');
									?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_home_meta_tags_tip');">
                  <?php _e('Additional Home Headers:', 'fv_seo')?>
                </a><br />
                <textarea cols="57" rows="2" name="fvseo_home_meta_tags"><?php echo htmlspecialchars(stripcslashes($fvseop_options['aiosp_home_meta_tags']))?></textarea>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_home_meta_tags_tip">
									<?php
									_e('What you enter here will be copied verbatim to your header on the home page. You can enter whatever additional headers you want here, even references to stylesheets.', 'fv_seo');
									echo '<br/>';
									_e('NOTE: This field currently only support meta tags.', 'fv_seo');
									?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_home_google_site_verification_meta_tag_tip');">
                  <?php _e('Google Verification Meta Tag:', 'fv_seo')?>
                </a> <abbr title="We recommend you to use a single file instead for Google verification">(?)</abbr><br />
                <textarea cols="57" rows="1" name="fvseo_home_google_site_verification_meta_tag"><?php if( isset( $fvseop_options['aiosp_home_google_site_verification_meta_tag'] ) ) echo htmlspecialchars(stripcslashes($fvseop_options['aiosp_home_google_site_verification_meta_tag']))?></textarea>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_home_google_site_verification_meta_tag_tip">
									<?php
									_e('What you enter here will be copied verbatim to your header on the home page. Webmaster Tools provides the meta tag in XHTML syntax.', 'fv_seo');
									echo('<br/>');
									echo('1. '); _e('On the Webmaster Tools Home page, click Verify this site next to the site you want.', 'fv_seo');
									echo('<br/>');
									echo('2. '); _e('In the Verification method list, select Meta tag, and follow the steps on your screen.', 'fv_seo');
									echo('<br/>');
									_e('Once you have added the tag to your home page, click Verify.', 'fv_seo');
									?>
                </div>
            </p>         
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_home_yahoo_site_verification_meta_tag');">
                  <?php _e('Yahoo Verification Meta Tag:', 'fv_seo')?>
                </a><br />
                <textarea cols="57" rows="1" name="fvseo_home_yahoo_site_verification_meta_tag"><?php if( isset( $fvseop_options['aiosp_home_yahoo_site_verification_meta_tag'] ) ) echo htmlspecialchars(stripcslashes($fvseop_options['aiosp_home_yahoo_site_verification_meta_tag']))?></textarea>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_home_yahoo_site_verification_meta_tag">
									<?php _e('Put your Yahoo site verification tag for your homepage here.', 'fv_seo'); ?>
                </div>
            </p>        
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_home_bing_site_verification_meta_tag');">
                  <?php _e('Bing Verification Meta Tag:', 'fv_seo')?>
                </a><br />
                <textarea cols="57" rows="1" name="fvseo_home_bing_site_verification_meta_tag"><?php if( isset( $fvseop_options['aiosp_home_bing_site_verification_meta_tag'] ) ) echo htmlspecialchars(stripcslashes($fvseop_options['aiosp_home_bing_site_verification_meta_tag']))?></textarea>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_home_bing_site_verification_meta_tag">
									<?php _e('Put your Bing site verification tag for your homepage here.', 'fv_seo'); ?>
                </div>
            </p>                        
            <p>
								<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_dont_use_excerpt_tip');">
								<?php _e('Turn off excerpts for descriptions:', 'fv_seo')?>
								</a>
						
								<input type="checkbox" name="fvseo_dont_use_excerpt" <?php if ($fvseop_options['aiosp_dont_use_excerpt']) echo "checked=\"1\""; ?>/>
								<div style="max-width:500px; text-align:left; display:none" id="fvseo_dont_use_excerpt_tip">
									<?php _e("Since Typepad export is containing auto generated excerpts for the most of the time we use this option a lot.", 'fv_seo'); ?>
								</div>
            </p>	
	<?php
	}
	
	
	function admin_settings_social() {
		global $fvseop_options;
	?>
		<p>
				<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_social_google_publisher_tip');">
					<?php _e('Google +1 Site Publisher:', 'fv_seo')?>
				</a><br />
				<input type="text" class="regular-text" size="63" name="social_google_publisher" value="<?php if (isset($fvseop_options['social_google_publisher'])) { echo esc_attr(stripcslashes($fvseop_options['social_google_publisher'])); }?>" />
				<div style="max-width:500px; text-align:left; display:none" id="fvseo_social_google_publisher_tip">
					<?php _e('This will be used across the whole site.', 'fv_seo')?>
				</div>
		</p>
		<p>
				<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_social_google_author_tip');">
					<?php _e('Google +1 Default Author:', 'fv_seo')?>
				</a><br />
				<input type="text" class="regular-text" size="63" name="social_google_author" value="<?php if (isset($fvseop_options['social_google_author'])) echo esc_attr(stripcslashes($fvseop_options['social_google_author']))?>" />
				<div style="max-width:500px; text-align:left; display:none" id="fvseo_social_google_author_tip">
					<?php _e('This will be used across the whole site, however user\'s Google +1 links will be used for their posts (if filled in).', 'fv_seo')?>
				</div>
		</p>
		<p>
				<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_social_twitter_site_tip');">
					<?php _e('Twitter site:', 'fv_seo')?>
				</a><br />
				<input type="text" class="regular-text" size="63" name="social_twitter_site" value="<?php if (isset($fvseop_options['social_twitter_site'])) { echo esc_attr(stripcslashes($fvseop_options['social_twitter_site'])); }?>" />
				<div style="max-width:500px; text-align:left; display:none" id="fvseo_social_twitter_site_tip">
					<?php _e('This will be used across the whole site. Enter @site_username.', 'fv_seo')?>
				</div>
		</p>
		<p>
				<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_social_twitter_creator_tip');">
					<?php _e('Tiwtter creator:', 'fv_seo')?>
				</a><br />
				<input type="text" class="regular-text" size="63" name="social_twitter_creator" value="<?php if (isset($fvseop_options['social_twitter_creator'])) echo esc_attr(stripcslashes($fvseop_options['social_twitter_creator']))?>" />
				<div style="max-width:500px; text-align:left; display:none" id="fvseo_social_twitter_creator_tip">
					<?php _e('This will be used across the whole site, enter @your_username.', 'fv_seo')?>
				</div>
		</p>    
		<p>
				<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('social_meta_facebook');">
					<?php _e('Insert Facebook Open Graph tags:', 'fv_seo')?>
				</a> 
				<input type="checkbox" name="social_meta_facebook" <?php if( !isset($fvseop_options['social_meta_facebook']) || $fvseop_options['social_meta_facebook'] ) echo 'checked="checked"'; ?>" />
				<div style="max-width:500px; text-align:left; display:none" id="social_meta_facebook">
					<?php _e('Automatically inserts Facebook Open Graph tags with your post meta description and featured image.', 'fv_seo')?>
				</div>
		</p>
		<p>
				<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('social_meta_twitter');">
					<?php _e('Insert Twitter Card meta tags:', 'fv_seo')?>
				</a> 
				<input type="checkbox" name="social_meta_twitter" <?php if( !isset($fvseop_options['social_meta_twitter']) || $fvseop_options['social_meta_twitter'] ) echo 'checked="checked"'; ?>" />
				<div style="max-width:500px; text-align:left; display:none" id="social_meta_twitter">
					<?php _e('Automatically inserts Twitter Card meta tags with your post meta description and featured image.', 'fv_seo')?>
				</div>
		</p>        
	<?php
	}	
	

	function options_panel()
	{
		$message = null;

		global $fvseop_options;		
		
		if (!$fvseop_options['aiosp_cap_cats'])
		{
			$fvseop_options['aiosp_cap_cats'] = '1';
		}
		
		if( isset($_POST['action']) && $_POST['action'] == 'fvseo_update' && isset( $_POST['Submit_Default'] ) && $_POST['Submit_Default'] != '')
		{
			$nonce = $_POST['nonce-fvseop'];
			
			if (!wp_verify_nonce($nonce, 'fvseopnonce'))
				die ( 'Security Check - If you receive this in error, log out and back in to WordPress');
			
			$message = __("FV Simpler SEO Options Reset.", 'fv_seo');

			delete_option('aioseop_options');

      global $fvseop_default_options;
			$res_fvseop_options = $fvseop_default_options;
				
			update_option('aioseop_options', $res_fvseop_options);
		}
		
		// update options
		if( isset($_POST['action']) && $_POST['action'] == 'fvseo_update' && isset( $_POST['Submit'] ) && $_POST['Submit'] != '')
		{
			$nonce = $_POST['nonce-fvseop'];
		
			if (!wp_verify_nonce($nonce, 'fvseopnonce'))
				die ( 'Security Check - If you receive this in error, log out and back in to WordPress');
				
			$message = __("FV Simpler SEO Options Updated.", 'fv_seo');
			
			$fvseop_options['aiosp_can'] = isset( $_POST['fvseo_can'] ) ? $_POST['fvseo_can'] : NULL;
			$fvseop_options['aiosp_home_title'] = isset( $_POST['fvseo_home_title'] ) ? $_POST['fvseo_home_title'] : NULL;
			$fvseop_options['aiosp_home_description'] = isset( $_POST['fvseo_home_description'] ) ? $_POST['fvseo_home_description'] : NULL;
			$fvseop_options['aiosp_home_keywords'] = isset( $_POST['fvseo_home_keywords'] ) ? $_POST['fvseo_home_keywords'] : NULL;
			$fvseop_options['aiosp_max_words_excerpt'] = isset( $_POST['fvseo_max_words_excerpt'] ) ? $_POST['fvseo_max_words_excerpt'] : NULL;
			$fvseop_options['aiosp_rewrite_titles'] = isset( $_POST['fvseo_rewrite_titles'] ) ? $_POST['fvseo_rewrite_titles'] : NULL;
			$fvseop_options['aiosp_post_title_format'] = isset( $_POST['fvseo_post_title_format'] ) ? $_POST['fvseo_post_title_format'] : NULL;
			$fvseop_options['aiosp_page_title_format'] = isset( $_POST['fvseo_page_title_format'] ) ? $_POST['fvseo_page_title_format'] : NULL;
			$fvseop_options['aiosp_category_title_format'] = isset( $_POST['fvseo_category_title_format'] ) ? $_POST['fvseo_category_title_format'] : NULL;
			$fvseop_options['aiosp_archive_title_format'] = isset( $_POST['fvseo_archive_title_format'] ) ? $_POST['fvseo_archive_title_format'] : NULL;
			$fvseop_options['aiosp_custom_taxonomy_title_format'] = isset( $_POST['fvseo_custom_taxonomy_title_format'] ) ? $_POST['fvseo_custom_taxonomy_title_format'] : NULL;
			$fvseop_options['aiosp_tag_title_format'] = isset( $_POST['fvseo_tag_title_format'] ) ? $_POST['fvseo_tag_title_format'] : NULL;
			$fvseop_options['aiosp_search_title_format'] = isset( $_POST['fvseo_search_title_format'] ) ? $_POST['fvseo_search_title_format'] : NULL;
			$fvseop_options['aiosp_description_format'] = isset( $_POST['fvseo_description_format'] ) ? $_POST['fvseo_description_format'] : NULL;
			$fvseop_options['aiosp_404_title_format'] = isset( $_POST['fvseo_404_title_format'] ) ? $_POST['fvseo_404_title_format'] : NULL;
			$fvseop_options['aiosp_paged_format'] = isset( $_POST['fvseo_paged_format'] ) ? $_POST['fvseo_paged_format'] : NULL;
			$fvseop_options['aiosp_use_categories'] = isset( $_POST['fvseo_use_categories'] ) ? $_POST['fvseo_use_categories'] : NULL;
			$fvseop_options['aiosp_dynamic_postspage_keywords'] = $_POST['fvseo_dynamic_postspage_keywords'];
      $fvseop_options['aiosp_remove_category_rel'] = $_POST['fvseo_remove_category_rel'];
			$fvseop_options['aiosp_category_noindex'] = isset( $_POST['fvseo_category_noindex'] ) ? $_POST['fvseo_category_noindex'] : NULL;
			$fvseop_options['aiosp_archive_noindex'] = isset( $_POST['fvseo_archive_noindex'] ) ? $_POST['fvseo_archive_noindex'] : NULL;
			$fvseop_options['aiosp_tags_noindex'] = isset( $_POST['fvseo_tags_noindex'] ) ? $_POST['fvseo_tags_noindex'] : NULL;
			$fvseop_options['aiosp_generate_descriptions'] = isset( $_POST['fvseo_generate_descriptions'] ) ? $_POST['fvseo_generate_descriptions'] : NULL;
			$fvseop_options['aiosp_cap_cats'] = isset( $_POST['fvseo_cap_cats'] ) ? $_POST['fvseo_cap_cats'] : NULL;
			$fvseop_options['aiosp_debug_info'] = isset( $_POST['fvseo_debug_info'] ) ? $_POST['fvseo_debug_info'] : NULL;
			$fvseop_options['aiosp_post_meta_tags'] = isset( $_POST['fvseo_post_meta_tags'] ) ? $_POST['fvseo_post_meta_tags'] : NULL;
			$fvseop_options['aiosp_page_meta_tags'] = isset( $_POST['fvseo_page_meta_tags'] ) ? $_POST['fvseo_page_meta_tags'] : NULL;
			$fvseop_options['aiosp_home_meta_tags'] = isset( $_POST['fvseo_home_meta_tags'] ) ? $_POST['fvseo_home_meta_tags'] : NULL;
			$fvseop_options['aiosp_home_google_site_verification_meta_tag'] = isset( $_POST['fvseo_home_google_site_verification_meta_tag'] ) ? $_POST['fvseo_home_google_site_verification_meta_tag'] : NULL;
			$fvseop_options['aiosp_home_bing_site_verification_meta_tag'] = isset( $_POST['fvseo_home_bing_site_verification_meta_tag'] ) ? $_POST['fvseo_home_bing_site_verification_meta_tag'] : NULL;
			$fvseop_options['aiosp_home_yahoo_site_verification_meta_tag'] = isset( $_POST['fvseo_home_yahoo_site_verification_meta_tag'] ) ? $_POST['fvseo_home_yahoo_site_verification_meta_tag'] : NULL;						
			$fvseop_options['aiosp_ex_pages'] = isset( $_POST['fvseo_ex_pages'] ) ? $_POST['fvseo_ex_pages'] : NULL;
			$fvseop_options['aiosp_use_tags_as_keywords'] = isset( $_POST['fvseo_use_tags_as_keywords'] ) ? $_POST['fvseo_use_tags_as_keywords'] : NULL;

      $fvseop_options['aiosp_search_noindex'] = isset( $_POST['fvseo_search_noindex'] ) ? $_POST['fvseo_search_noindex'] : NULL;
			$fvseop_options['aiosp_dont_use_excerpt'] = isset( $_POST['fvseo_dont_use_excerpt'] ) ? $_POST['fvseo_dont_use_excerpt'] : NULL;
			$fvseop_options['aiosp_show_keywords'] = isset( $_POST['fvseo_show_keywords'] ) ? $_POST['fvseo_show_keywords'] : NULL;
			$fvseop_options['aiosp_show_noindex'] = isset( $_POST['fvseo_show_noindex'] ) ? $_POST['fvseo_show_noindex'] : NULL;			
			$fvseop_options['aiosp_show_custom_canonical'] = isset( $_POST['fvseo_show_custom_canonical'] ) ? $_POST['fvseo_show_custom_canonical'] : NULL;
			$fvseop_options['aiosp_show_titleattribute'] = isset( $_POST['fvseo_show_titleattribute'] ) ? $_POST['fvseo_show_titleattribute'] : NULL;
      $fvseop_options['aiosp_show_short_title_post'] = isset( $_POST['fvseo_show_short_title_post'] ) ? $_POST['fvseo_show_short_title_post'] : NULL;
      $fvseop_options['aiosp_sidebar_short_title'] = isset( $_POST['fvseo_sidebar_short_title'] ) ? $_POST['fvseo_sidebar_short_title'] : NULL;
			$fvseop_options['aiosp_show_disable'] = isset( $_POST['fvseo_show_disable'] ) ? $_POST['fvseo_show_disable'] : NULL;
      $fvseop_options['aiosp_shorten_slugs'] = isset( $_POST['fvseo_shorten_slugs'] ) ? true : false;
      $fvseop_options['fvseo_publ_warnings'] = isset( $_POST['fvseo_publ_warnings'] ) ? $_POST['fvseo_publ_warnings'] : 0;

      $fvseop_options['social_google_publisher'] = isset( $_POST['social_google_publisher'] ) ? trim($_POST['social_google_publisher']) : NULL;
      $fvseop_options['social_google_author'] = isset( $_POST['social_google_author'] ) ? trim($_POST['social_google_author']) : NULL;
      $fvseop_options['social_twitter_creator'] = isset( $_POST['social_twitter_creator'] ) ? trim($_POST['social_twitter_creator']) : NULL;
      $fvseop_options['social_twitter_site'] = isset( $_POST['social_twitter_site'] ) ? trim($_POST['social_twitter_site']) : NULL;
      $fvseop_options['social_meta_facebook'] = isset( $_POST['social_meta_facebook'] ) ? true : false;
      $fvseop_options['social_meta_twitter'] = isset( $_POST['social_meta_twitter'] ) ? true : false;

			update_option('aioseop_options', $fvseop_options);

			if (function_exists('wp_cache_flush'))
			{
				wp_cache_flush();
			}
		}
		
		// TODO: Important, I can't change the four textareas for the additional headers until I change the whole concept in this fields. I need to do it.
?>
<?php if ($message) : ?>
  <div id="message" class="updated fade">
    <p>
      <?php echo $message; ?>
    </p>
  </div>
<?php endif; ?>
  <div id="dropmessage" class="updated" style="display:none;"></div>
  	<style type="text/css">
		.postbox-container { min-width: 100% !important; }
	</style>
  <div class="wrap">
      <div style="position: absolute; top: 10px; right: 10px;">
          <a href="https://foliovision.com/seo-tools/wordpress/plugins/fv-all-in-one-seo-pack" target="_blank" title="Documentation"><img alt="visit foliovision" src="http://foliovision.com/shared/fv-logo.png" /></a>
      </div>
      <div>
          <div id="icon-options-general" class="icon32"><br /></div>
          <h2>
          <?php _e('FV Simpler SEO Options', 'fv_seo'); ?>
          </h2>
      </div>
    <div style="clear:both;"></div>
<script type="text/javascript">
function toggleVisibility(id)
{
  var e = document.getElementById(id);

  if(e.style.display == 'block')
    e.style.display = 'none';
  else
    e.style.display = 'block';
}
</script>
    <form name="dofollow" action="" method="post">

<?php

$fvseop_options = get_option('aioseop_options');

add_meta_box( 'fv_simpler_seo_basic', 'Basic Options', array( $this, 'admin_settings_basic' ), 'fv_simpler_seo_settings', 'normal' );
add_meta_box( 'fv_simpler_seo_social', 'Social Networks', array( $this, 'admin_settings_social' ), 'fv_simpler_seo_settings', 'normal' );
add_meta_box( 'fv_simpler_seo_interface_options', 'Extra Interface Options', array( $this, 'admin_settings_interface' ), 'fv_simpler_seo_settings', 'normal' );
add_meta_box( 'fv_simpler_seo_advanced', 'Advanced Options', array( $this, 'admin_settings_advanced' ), 'fv_simpler_seo_settings', 'normal' );
?>            

		<div id="dashboard-widgets" class="metabox-holder columns-1">
			<div id='postbox-container-1' class='postbox-container'>    
				<?php
				do_meta_boxes( 'fv_simpler_seo_settings', 'normal', false );
				wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false );
				wp_nonce_field( 'meta-box-order-nonce', 'meta-box-order-nonce', false );
				?>
			</div>
		</div>  
		
                <div style="border-left: 1px solid #ddd; padding-left: 10px; margin-left: 20px; text-align:left; 
                <?php if( !$fvseop_options['aiosp_show_keywords'] && !$fvseop_options['aiosp_show_custom_canonical'] && !$fvseop_options['aiosp_show_titleattribute'] && !$fvseop_options['aiosp_show_disable'] && !$fvseop_options['aiosp_show_short_title_post'] ) echo 'display: none;' ?>" id="fvseo_user_interface_options">
                            
                </div>

            


      <p class="submit">        
        <input type="hidden" name="action" value="fvseo_update" />
        <input type="hidden" name="nonce-fvseop" value="<?php echo esc_attr(wp_create_nonce('fvseopnonce')); ?>" />
        <input type="hidden" name="page_options" value="fvseo_home_description" />
        <input type="submit" class='button-primary' name="Submit" value="<?php _e('Update Options', 'fv_seo')?> &raquo;" />
        <input type="submit" class='button-primary' name="Submit_Default" value="<?php _e('Reset Settings to Defaults', 'fv_seo')?> &raquo;" />        
      </p>
    </form>
		<script type="text/javascript">
			//<![CDATA[
			jQuery(document).ready( function($) {
				// close postboxes that should be closed
				$('.if-js-closed').removeClass('if-js-closed').addClass('closed');
				// postboxes setup
				postboxes.add_postbox_toggles('fv_simpler_seo_settings');
			});
			//]]>
		</script>    
  </div>
  <?php
	} // options_panel
	
	
	
	function get_adjacent_post_where( $sql ) {
		global $post;
		
		$affected_post_types = apply_filters( 'fv_get_adjacent_post_where_post_types', array( 'page' ) );
		
		if( array_search( $post->post_type, $affected_post_types ) !== FALSE && $ids = $this->get_noindex_posts() ) {
			$ids = implode( ',', $ids );
			$sql .= ' AND p.ID NOT IN ('.$ids.')';
		}
		
		return $sql;
	}
	
	
	
	function get_noindex_posts() {
		global $wpdb;
		$res = $wpdb->get_col( "SELECT ID FROM $wpdb->posts AS p JOIN $wpdb->postmeta AS m ON p.ID = m.post_id WHERE meta_key = '_aioseop_noindex' AND meta_value = '1' " );
		//echo '<!--res '.var_export($res, true).'-->';
		return $res;
	}
  
	

	function pre_get_posts($query) {
    if ( !$query->is_admin && $query->is_search) {    	
    		if( $ids = $this->get_noindex_posts() ) {
        	$query->set('post__not_in', $ids ); // id of page or post
        }
    }
    return $query;
	}
	
  
  
  function initiate_the_title_change() {
    global $fvseop_options;
    if( isset($fvseop_options['aiosp_sidebar_short_title']) && $fvseop_options['aiosp_sidebar_short_title'] ) {
        add_filter( 'the_title', array( $this, 'the_title' ) );
    }
  }
  
  
    
  function the_title( $title ) {
    global $fvseop_options;
    if( $fvseop_options['aiosp_show_short_title_post'] ) {
      global $post;
      if( $short_title = get_post_meta( $post->ID, '_aioseop_menulabel', true ) ) {
        return __( $short_title );
      }
    } 
    return $title;    
  }  
	
	

	function wp_list_pages_excludes( $exclude_array ) {
		if( $ids = $this->get_noindex_posts() ) {
			$exclude_array = array_merge( $exclude_array, $ids );
		}
		return $exclude_array;
	}
	
	
	function yarpp_results( $posts ) {	
		
		if( !function_exists( 'yarpp_related' ) ) {
			return $posts;
		}
		
		global $fvseop_options;
		if( !$fvseop_options['aiosp_show_noindex'] ) {			
			return $posts;
		}
				
		global $wpdb;
		$no_index = $wpdb->get_col( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_aioseop_noindex' " );
		if( $no_index ) {
			$new_posts = array();
         if ( !empty($posts) ) {
            foreach( $posts AS $key => $item ) {
               $found = false;
               foreach( $no_index AS $id ) {
                  if( $id == $item->ID ) {
                     $found = true;
                     break;
                  }
               }
               if( !$found ) {
                  $new_posts[] = $item;
               }
            }
         }         
			
			global $wp_query;
			$wp_query->post_count = count( $new_posts );			
			$posts = $new_posts;
		}
		
		return $posts;
	}	
	
	
	
	
	function google_authorship() {
    $strGooglePlusLink = false;
    
    global $fvseop_options;
    if( isset($fvseop_options['social_google_author']) && strlen(trim($fvseop_options['social_google_author'])) > 0 ) {
      $strGooglePlusLink = $fvseop_options['social_google_author'];
    }

    if ( is_singular() ) {
      global $post;
      if( $post->post_type == 'post' ) {
        $meta = get_the_author_meta( 'googleplus', $post->post_author );
        if( strlen(trim($meta)) > 0 ) {
          $strGooglePlusLink = $meta;
        }
      }
    }

    $strGooglePlusLink = apply_filters( 'fvseo_googlepluslink', $strGooglePlusLink );
    if( $strGooglePlusLink ) {
      echo '<link rel="author" href="'.esc_attr($strGooglePlusLink).'" />' . "\n";
    }
    
    if( isset($fvseop_options['social_google_publisher']) && strlen(trim($fvseop_options['social_google_publisher'])) > 0 ) {
      echo '<link rel="publisher" href="'.esc_attr($fvseop_options['social_google_publisher']).'" />' . "\n";
    }
	}
  
  
  
  
	function social_meta_tags() {
    $strGooglePlusLink = false;
    
    global $fvseop_options;

    if ( is_singular() ) {
      global $post;
      if( !$description = esc_attr(htmlspecialchars(stripcslashes( get_post_meta($post->ID, '_aioseop_description', true) ))) ) {
        $description = wp_trim_words(strip_shortcodes(strip_tags($post->post_content)), 20, ' &helip;');
      }
      $description = __($this->internationalize(strip_tags($description)));
      
      if( !$title = esc_attr(htmlspecialchars(stripcslashes( get_post_meta($post->ID, '_aioseop_title', true) ))) ) {
        $title = get_the_title();
      }
      $title = __($this->internationalize(strip_tags($title)));
      
      $sImage = false;
      if( !isset($fvseop_options['social_meta_facebook']) || $fvseop_options['social_meta_facebook'] || !isset($fvseop_options['social_meta_twitter']) || $fvseop_options['social_meta_twitter'] ) {
        if( $sImage = get_the_post_thumbnail($post->ID,'large') ) {
          $sTwitterCard = 'summary_large_image';
        } else {
          $sImage = get_the_post_thumbnail($post->ID,'thumbnail');
          $sTwitterCard = 'summary';
        }
        
        if( $sImage ) {
          $sImage = preg_replace( '~^[\s\S]*src=["\'](.*?)["\'][\s\S]*$~', '$1', $sImage );
          if( preg_match('~^/[^/]~', $sImage) ) {
            $sImage = home_url($sImage); 
          }          
        }
      }
      
      if( !isset($fvseop_options['social_meta_facebook']) || $fvseop_options['social_meta_facebook'] ) :
?>
  <meta property="og:title" content="<?php echo $title; ?>" />
  <meta property="og:type" content="blog" />
  <meta property="og:description" content="<?php echo $description; ?>" />
  <?php if($sImage) : ?><meta property="og:image" content="<?php echo $sImage; ?>" />
<?php endif; ?>
  <meta property="og:url" content="<?php the_permalink(); ?>" />
  <meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>" />
<?php
      endif;  //  social_meta_facebook
      
      if( !isset($fvseop_options['social_meta_twitter']) || $fvseop_options['social_meta_twitter'] ) :
?>
  <meta name="twitter:title" content="<?php echo $title; ?>" />
  <meta name="twitter:card" content="<?php echo $sTwitterCard; ?>" />
  <meta name="twitter:description" content="<?php echo $description; ?>" />
  <?php if($sImage) : ?><meta name="twitter:image" content="<?php echo $sImage; ?>" />
<?php endif; ?>
  <meta name="twitter:url" content="<?php the_permalink(); ?>" />
  <?php if( isset($fvseop_options['social_twitter_creator']) && strlen(trim($fvseop_options['social_twitter_creator'])) > 0 ) : ?>
    <meta name="twitter:creator" content="<?php echo trim($fvseop_options['social_twitter_creator']); ?>" />
  <?php endif; ?>
  <?php if( isset($fvseop_options['social_twitter_site']) && strlen(trim($fvseop_options['social_twitter_site'])) > 0 ) : ?>
    <meta name="twitter:site" content="<?php echo trim($fvseop_options['social_twitter_site']); ?>" />
  <?php endif; ?>  
<?php
      endif;  //  social_meta_twitter
      
    }

	}	  
	
	
	
	
	function update_contactmethods( $aContactMethods ) {
    $aContactMethods['googleplus'] = __( "Google+", 'fv_seo' );
    return $aContactMethods;
  }
  
  
	
	
} // end fv_seo class

global $fvseop_options;

if (!get_option('aioseop_options'))
{
	fvseop_mrt_mkarry();
}

$fvseop_options = get_option('aioseop_options');

global $fvseop_default_options;
$fvseop_default_options = array(
  "aiosp_can"=>0,
  "aiosp_home_title"=>null,
  "aiosp_home_description"=>'',
  "aiosp_home_keywords"=>null,
  "aiosp_max_words_excerpt"=>'something',
  "aiosp_rewrite_titles"=>0,
  "aiosp_post_title_format"=>'%post_title% | %blog_title%',
  "aiosp_page_title_format"=>'%page_title% | %blog_title%',
  "aiosp_category_title_format"=>'%category_title% | %blog_title%',
  "aiosp_archive_title_format"=>'%date% | %blog_title%',
  "aiosp_tag_title_format"=>'%tag% | %blog_title%',
  "aiosp_search_title_format"=>'%search% | %blog_title%',
  "aiosp_custom_taxonomy_title_format"=>'%tax_title% | %blog_title%',
  "aiosp_description_format"=>'%description%',
  "aiosp_404_title_format"=>'Nothing found for %request_words%',
  "aiosp_paged_format"=>' - Part %page%',
  "aiosp_use_categories"=>1,
  "aiosp_dynamic_postspage_keywords"=>1,
  "aiosp_remove_category_rel"=>1,
  "aiosp_category_noindex"=>0,
  "aiosp_archive_noindex"=>0,
  "aiosp_tags_noindex"=>0,
  "aiosp_cap_cats"=>0,
  "aiosp_generate_descriptions"=>0,
  "aiosp_debug_info"=>null,
  "aiosp_post_meta_tags"=>'',
  "aiosp_page_meta_tags"=>'',
  "aiosp_home_meta_tags"=>'',
  'home_google_site_verification_meta_tag' => '',
  'aiosp_use_tags_as_keywords' => 1,
  'aiosp_search_noindex'=>1,
  'aiosp_dont_use_excerpt'=>0,
  'aiosp_show_keywords'=>0,
  'aiosp_show_titleattribute'=>0,
  'aiosp_show_short_title_post'=>0,
  'aiosp_sidebar_short_title'=>0,
  'aiosp_show_disable'=>0,
  'aiosp_show_custom_canonical'=>0,
  'aiosp_shorten_slugs'=>1,
  'fvseo_publ_warnings'=>1,
  'social_google_publisher'=>'',
  'social_google_author'=>'',
  'social_twitter_site'=>'',
  'social_twitter_creator'=>'',
  'social_meta_facebook'=>true,
  'social_meta_twitter'=>true
  );
  

function fvseop_mrt_mkarry()
{

  global $fvseop_default_options;
  $nfvseop_options = $fvseop_default_options;
	if (get_option('aiosp_post_title_format'))
	{
		foreach ($nfvseop_options as $fvseop_opt_name => $value )
		{
			if ($fvseop_oldval = get_option($fvseop_opt_name))
			{
				$nfvseop_options[$fvseop_opt_name] = $fvseop_oldval;
			}
			
			if ($fvseop_oldval == '')
			{
				$nfvseop_options[$fvseop_opt_name] = '';
			}
        
			delete_option($fvseop_opt_name);
		}
	}

	add_option('aioseop_options',$nfvseop_options);

  /// this displays a warning message in WP 3.0
	//echo "<div class='updated fade' style='background-color:green;border-color:green;'><p><strong>Updating FV All in One SEO Pack configuration options in database</strong></p></div>";
}

function fvseop_nav_menu($content)
{
	$url = preg_replace(array('/\//', '/\./', '/\-/'), array('\/', '\.', '\-'), get_option('siteurl'));
	$pattern = '/<li id=\"menu-item-(\d+)\" class="menu-item(.*?)menu-item-(\d+)([^\"]*)"><a href=\"([^\"]+)"[^>]*?>([^<]+)<\/a>/i';
  
  /// db optimization, only process what's a menu item for post type
  preg_match_all( '~id=\"menu-item-(\d+)\" class=\"[^"]*?menu-item-type-post_type[^"]*?\"~', $content, $ids );
  if( function_exists( 'update_meta_cache' ) && count( $ids[1] ) > 0 ) { update_meta_cache( 'post', $ids[1] ); }
  
  $menu_ids = array();
  foreach ($ids[1] as $id) {    
    $menu_ids[] = get_post_meta($id, '_menu_item_object_id', true); 
  }
  if( function_exists( 'update_meta_cache' ) && count( $menu_ids ) > 0 ) { update_meta_cache( 'post', $menu_ids ); }
  
  return preg_replace_callback($pattern, "fvseop_filter_menu_callback", $content);  
}

function fvseop_filter_menu_callback($matches)
{      
  // only process menu items for pages!
  if( strpos( $matches[0], 'menu-item-type-post_type' ) === FALSE ) {
    return $matches[0];
  } 	
	
  $postID = get_post_meta($matches[1], '_menu_item_object_id', true);      
  $my_post = get_post( $postID );      
           	
	if (empty($postID))
		$postID = get_option("page_on_front");
				       
  if ( wptexturize($my_post->post_title) == $matches[6]) {
    $menulabel = stripslashes(get_post_meta($postID, '_aioseop_menulabel', true));
  }    
	
	if (empty($menulabel))
		$menulabel = $matches[6];    
                          
  $menulabel = __( $menulabel );  
  
  $filtered = '<li id="menu-item-' . $matches[1] . '" class="menu-item ' . $matches[2] . 'menu-item-' . $matches[1] . '"><a href="' . esc_attr($matches[5]) . '">' . esc_html($menulabel) . '</a>';	
	
	return $filtered;
}

function fvseop_list_pages($content)
{
	$url = preg_replace(array('/\//', '/\./', '/\-/'), array('\/', '\.', '\-'), get_option('siteurl'));
	$pattern = '/<li class="page_item page-item-(\d+)([^\"]*)"><a href=\"([^\"]+)"[^>]*?>([^<]+)<\/a>/i';
  /// db optimization
  preg_match_all( '~page-item-(\d+)~', $content, $ids );
  if( function_exists( 'update_meta_cache' ) && count( $ids[1] ) > 0 ) { update_meta_cache( 'post', $ids[1] ); }
  ///
	return preg_replace_callback($pattern, "fvseop_filter_callback", $content);
}

function fvseop_filter_callback($matches)
{
  preg_match( '~title="([^\"]+)"~', $matches[0], $match_title );
  if( $match_title ) {
    $matches[4] = $match_title[1];
  }
  
	if ($matches[1] && !empty($matches[1]))
		$postID = $matches[1];
		
	if (empty($postID))
		$postID = get_option("page_on_front");
		
	$title_attrib = stripslashes(get_post_meta($postID, '_aioseop_titleatr', true));
	$menulabel = stripslashes(get_post_meta($postID, '_aioseop_menulabel', true));
	
	if (empty($menulabel))
		$menulabel = $matches[4];
               
  /// Addition
  $longtitle = stripslashes(get_post_meta($postID, '_aioseop_title', true));
            
  $menulabel = __( $menulabel );  
  $longtitle = __( $longtitle );  
  $title_attrib = __( $title_attrib );       
  if( isset($matches[4]) ) {
    $matches[4] = __( $matches[4] );
  }
		
	if (!empty($title_attrib)){
		$filtered = '<li class="page_item page-item-' . $postID.$matches[2] . '"><a href="' . esc_attr($matches[3]) . '" title="' . esc_attr($title_attrib) . '">' . esc_html($menulabel) . '</a>';
  /// Addition
  }elseif (!empty($longtitle)){
          $filtered = '<li class="page_item page-item-' . $postID.$matches[2] . '"><a href="' . esc_attr($matches[3]) . '" title="' . esc_attr($longtitle) . '">' . esc_html($menulabel) . '</a>';
  /// End of addition
	}else{
    	$filtered = '<li class="page_item page-item-' . $postID.$matches[2] . '"><a href="' . esc_attr($matches[3]) . '" title="' . esc_attr($matches[4]) . '">' . esc_html($menulabel) . '</a>';
	}    
	
	return $filtered;
}

function fvseo_meta()
{
	global $post;
	global $fvseo;
	
	$post_id = $post;
	
	if (is_object($post_id))
	{
		$post_id = $post_id->ID;
	}
	$url = str_replace('http://','',get_permalink());
 	$keywords = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_keywords', true))));
	$title = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_title', true))));
	$custom_canonical = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_custom_canonical', true))));
	$description = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_description', true))));
	$fvseo_meta = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_meta', true))));
	$fvseo_disable = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_disable', true))));
	$fvseo_titleatr = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_titleatr', true))));
	$fvseo_menulabel = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_menulabel', true))));
	$noindex = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_noindex', true))));	
	$nofollow = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_nofollow', true))));	
	
	if( $title ) {
	  $title_preview = 	$title;
	} elseif( $title_preview = get_the_title( $post_id ) ) {
	} else {
	  $title_preview = __("Fill in your title", 'fv_seo');
	}
	
	$fvseop_options = get_option('aioseop_options');
	
?>
<script type="text/javascript">
var fvseop_language = '<?php if (function_exists("qtrans_getLanguage")) echo qtrans_getLanguage(); else echo "default"; ?>';
var fvseop_languages;
var fvseop_active_lang = fvseop_language;
<?php if (function_exists("qtrans_getSortedLanguages")) { ?>
fvseop_languages =  <?php echo json_encode(qtrans_getSortedLanguages()); ?>;
<?php } ?>

function countChars(field, cntfield, lang)
{
  if( !field.value ) return;
  
  cntfield.value = field.value.length;

  if( field.name == 'fvseo_description' || field.name == 'fvseo_description' + '_' + lang ) {
	  if( field.value.length > <?php echo $fvseo->maximum_description_length; ?> ) {
	  	if (lang == 'default') {
        jQuery('#lengthD').css('background', 'red').css('color', 'black');
      }
      else {
        jQuery('#lengthD' + '_' + lang).css('background', 'red').css('color', 'black');
      }
	  }
	  else if( field.value.length > <?php echo $fvseo->maximum_description_length_yellow; ?> ) {
	  	if (lang == 'default') {
        jQuery('#lengthD').css('background', 'yellow').css('color', 'black');
      }
      else {
        jQuery('#lengthD' + '_' + lang).css('background', 'yellow').css('color', 'black');
      }
	  }
	  else {
	  	if (lang == 'default') {
        jQuery('#lengthD').css('background', 'white').css('color', 'black');
      }
      else {
        jQuery('#lengthD' + '_' + lang).css('background', 'white').css('color', 'black');
      }
	  }
  }
  else if( field.name == 'fvseo_title' || field.name == 'fvseo_title' + '_' + lang ) {
	  if( field.value.length > <?php echo $fvseo->maximum_title_length; ?> ) {
	  	if (lang == 'default') {
        jQuery('#lengthT').css('background', 'red').css('color', 'black');
      }
      else {
        jQuery('#lengthT' + '_' + lang).css('background', 'red').css('color', 'black');
      }
	  }
	  else {
      if (lang == 'default') {
        jQuery('#lengthT').css('background', 'white').css('color', 'black');
      }
      else {
        jQuery('#lengthT' + '_' + lang).css('background', 'white').css('color', 'black');
      }
	  }
  }
}
function fvseo_timeout() {
  FVSimplerSEO_updateTitle();
  FVSimplerSEO_updateTitleFromWPTitle();
  FVSimplerSEO_updateMeta();
  FVSimplerSEO_updateLink();
  window.setTimeout("fvseo_timeout();", 100);
}
function FVSimplerSEO_noindex_toggle() {
	jQuery('.fvseo-noindex').toggle();
	return true;
}
function FVSimplerSEO_updateLink()
{
  if( jQuery( "#sample-permalink" ).length > 0 ) {
    url = jQuery("#sample-permalink").text();
    url = url.replace( 'http://', '' );
    jQuery("#fvseo_href").html(url);
  }
}
function FVSimplerSEO_updateTitleFromWPTitle()
{  
  if (fvseop_language == 'default') {
    if( jQuery( "#fvseo_title_input" ).hasClass( 'linked-to-wp-title' ) ) {
      jQuery( "#fvseo_title_input" ).val( jQuery( "#title" ).val() );
    }
  }
  else {
    for (i = 0; i < fvseop_languages.length; i++) {
      if (jQuery( "#fvseo_title_input_" + fvseop_languages[i] ).hasClass( 'linked-to-wp-title') ) {
        jQuery( "#fvseo_title_input_" + fvseop_languages[i] ).val( jQuery( "#qtrans_title_" + fvseop_languages[i] ).val() );
      }  
    }
  }
}
function FVSimplerSEO_updateMeta()
{
  meta = FVSimplerSEO_getLocalized('fvseo_description_input');
  <?php if( !$fvseop_options['aiosp_dont_use_excerpt'] ) : ?>
  if( meta.replace(/^\s\s*/, '').replace(/\s\s*$/, '').length == 0 && jQuery("#excerpt").length > 0 ) {
  	meta = jQuery("#excerpt").val().replace(/<\/?([a-z][a-z0-9]*)\b[^>]*>?/gi, '');  
  }
  <?php endif; ?>
  meta_add_dots = '';
  if( meta.length > <?php echo $fvseo->maximum_description_length; ?> ) {
    meta_add_dots = ' ...';
  }
  meta = meta.substr(0, <?php echo $fvseo->maximum_description_length; ?>) + meta_add_dots;
  if(meta == ''){
    meta = 'Fill in your meta description';
  }
  jQuery("p#fvseo_meta").html(meta);
}
function FVSimplerSEO_updateTitle()
{
  title = FVSimplerSEO_getLocalized('fvseo_title_input');
  title_add_dots = '';
  if( title.length > <?php echo $fvseo->maximum_title_length; ?> ) {
    title_add_dots = ' ...';
  }
  title = title.substr(0, <?php echo $fvseo->maximum_title_length; ?>) + title_add_dots;
  if (title == ''){
    if( jQuery("#title").val() ) {
      title = jQuery("#title").val();
    } else {
      title = '<?php echo __('Fill in your title', 'fv_seo'); ?>';
    }
  }
  url = jQuery("#sample-permalink").text();
  jQuery("h2#fvseo_title").html( '<a href="'+url+'">'+title+'</a>');
}
function FVSimplerSEO_getLocalized(input)
{
  if (fvseop_language == 'default') {
  	if( !jQuery("#" + input).hasClass('fvseo_disabled') ) {
    	string = jQuery("#" + input).val();    
    } else {
    	string = '';
    }
  }
  else {
  	if( !jQuery('#' + input + '_' + fvseop_active_lang).hasClass('fvseo_disabled') ) {
    	string = jQuery('#' + input + '_' + fvseop_active_lang).val();
    } else {
    	string = '';
    }
  }    
  return string;
}
jQuery(document).ready(function($) {
  window.setTimeout("fvseo_timeout();", 500);  
  if (fvseop_language == 'default') {
    <?php if( !$title ) : ?>
    if( jQuery( "#title" ).length > 0 ) {
      //jQuery( "#fvseo_title_input" ).val( jQuery( "#title" ).val() );
      jQuery( "#fvseo_title_input" ).css( 'color', '#bbb' );
      jQuery( "#fvseo_title_input" ).addClass( 'linked-to-wp-title' );
    }
    jQuery( "#fvseo_title_input" ).focus( function() {
      jQuery( this ).removeClass( 'linked-to-wp-title' );
      jQuery( this ).css( 'color', '#000' );
    } );
    <?php endif; ?>
  }
  else {
    for (i = 0; i < fvseop_languages.length; i++) {
      if( jQuery( "#qtrans_title_" + fvseop_languages[i] ).val() == jQuery( "#fvseo_title_input_" + fvseop_languages[i] ).val() ) {
        jQuery( "#fvseo_title_input_" + fvseop_languages[i] ).css( 'color', '#bbb' );
        jQuery( "#fvseo_title_input_" + fvseop_languages[i] ).addClass( 'linked-to-wp-title' );
      }
      jQuery( "#fvseo_title_input_" + fvseop_languages[i] ).focus( function() {
        jQuery( this ).removeClass( 'linked-to-wp-title' ); jQuery( this ).css( 'color', '#000' );
        fvseop_active_lang = jQuery( this ).attr("id").substr('fvseo_title_input_'.length);
      } );
      jQuery( "#fvseo_description_input_" + fvseop_languages[i] ).focus( function() {
        fvseop_active_lang = jQuery( this ).attr("id").substr('fvseo_description_input_'.length);
      } );      
    }
  }  
});
</script>
<style type="text/css">
#fvsimplerseopack th { font-size: 90%; } 
#fvsimplerseopack .inputcounter { font-size: 85%; padding: 0px; text-align: center; background: white; color: #000;  }
#fvsimplerseopack .input { width: 99%; }
#fvsimplerseopack .input[type=checkbox] { width: auto; }
#fvsimplerseopack small { color: #999; }
#fvsimplerseopack abbr { color: #999; margin-right: 10px;}
#fvsimplerseopack small.link {color:#36C;font-size:13px;cursor:pointer;}
#fvsimplerseopack small#fvseo_href { color: #0E774A !important; margin-left:15px; font-family:arial, sans-serif;font-style:normal;font-size:13px;}
#fvsimplerseopack small.link:hover {text-decoration:underline;}
#fvsimplerseopack p#fvseo_meta {margin:0;padding:0; margin-left:15px; font-family:arial, sans-serif;font-style:normal;font-size:13px;max-width:546px;}
#fvsimplerseopack h2 {margin:0;padding:0; color:#2200c1; font-family:arial, sans-serif; font-style:normal; font-size:16px; text-decoration:underline; margin-left:15px; display:inline; padding-bottom:0px; cursor:pointer; line-height: 18px; }
#fvsimplerseopack h2 a { color:#2200c1; }
#fvsimplerseopack .fvseo_disabled { color:#aaa; }
</style>
  <input value="fvseo_edit" type="hidden" name="fvseo_edit" />
  <input type="hidden" name="nonce-fvseopedit" value="<?php echo esc_attr(wp_create_nonce('edit-fvseopnonce')) ?>" />

			<div class="fvseo-noindex" <?php if( $noindex ) echo 'style="display:none;"'; ?>>
        <?php if (function_exists('qtrans_getSortedLanguages')) { ?>
        <?php
          $languages = qtrans_getSortedLanguages();          
          foreach($languages as $language) { ?>
            <?php            
              $localized_title = fvseo_get_localized_string($title, $language); 
            ?>
            <p>
                <?php _e('Long Title:', 'fv_seo') ?> (<?php echo qtrans_getLanguageName($language); ?>) <abbr title="<?php _e('Displayed in browser toolbar and search engine results. It will replace your post title format defined by your template on this single post/page. For advanced customization use Rewrite Titles in Advanced Options.', 'fv_seo') ?> ">(?)</abbr>
                <input id="s<?php echo $language; ?>" class="input" value="<?php echo $localized_title ?>" type="text" name="fvseo_title_<?php echo $language; ?>" onkeydown="countChars(document.post.fvseo_title_<?php echo $language; ?>,document.post.lengthT_<?php echo $language; ?>, '<?php echo $language ?>');" onkeyup="countChars(document.post.fvseo_title_<?php echo $language; ?>,document.post.lengthT_<?php echo $language; ?>, '<?php echo $language ?>');" />
                <br />
                <input id="lengthT_<?php echo $language; ?>" class="inputcounter" readonly="readonly" type="text" name="lengthT_<?php echo $language; ?>" size="3" maxlength="3" value="<?php echo strlen($localized_title);?>" />
                <small><?php printf(__(' characters. Most search engines use a maximum of %s chars for the title.', 'fv_seo'), intval($fvseo->maximum_title_length)) ?></small>
            </p>
                    
        <?php } ?>
        <?php
          $languages = qtrans_getSortedLanguages();
          foreach($languages as $language) { ?>
            <?php            
              $localized_description = fvseo_get_localized_string($description, $language);
            ?>
            <p>
                <?php _e('Meta Description:', 'fv_seo') ?> (<?php echo qtrans_getLanguageName($language); ?>) <abbr title="<?php _e('Displayed in search engine results. Can be called inside of template file with', 'fv_seo') ?>&lt;?php echo get_post_meta('_aioseop_description',$post->ID); ?&gt;">(?)</abbr>
                <textarea id="fvseo_description_input_<?php echo $language; ?>" class="input" name="fvseo_description_<?php echo $language; ?>" rows="2" onkeydown="countChars(document.post.fvseo_description_<?php echo $language; ?>,document.post.lengthD_<?php echo $language; ?>, '<?php echo $language ?>')" onkeyup="countChars(document.post.fvseo_description_<?php echo $language; ?>,document.post.lengthD_<?php echo $language; ?>, '<?php echo $language ?>');"><?php echo $localized_description ?></textarea>
                <br />
                <input id="lengthD_<?php echo $language; ?>" class="inputcounter" readonly="readonly" type="text" name="lengthD_<?php echo $language; ?>" size="3" maxlength="3" value="<?php echo strlen($localized_description);?>" />
                <small><?php printf(__(' characters. Most search engines use a maximum of %s chars for the description.', 'fv_seo'), $fvseo->maximum_description_length) ?></small>
            </p>
        <?php } ?>
        <?php } else { ?>
        <p>
            <?php _e('Long Title:', 'fv_seo') ?> <abbr title="<?php _e('Displayed in browser toolbar and search engine results. It will replace your post title format defined by your template on this single post/page. For advanced customization use Rewrite Titles in Advanced Options.', 'fv_seo') ?>">(?)</abbr>
            <input id="fvseo_title_input" class="input" value="<?php echo $title ?>" type="text" name="fvseo_title" onkeydown="countChars(document.post.fvseo_title,document.post.lengthT, 'default');" onkeyup="countChars(document.post.fvseo_title,document.post.lengthT, 'default');" />
            <br />
            <input id="lengthT" class="inputcounter" readonly="readonly" type="text" name="lengthT" size="3" maxlength="3" value="<?php echo strlen($title);?>" />
            <small><?php printf(__(' characters. Most search engines use a maximum of %d chars for the title.', 'fv_seo'), $fvseo->maximum_title_length) ?></small>
        </p>
        <p>
        		<?php
        		$fvseo_description_input_disabled = false;
        		if( strlen( trim($post->post_excerpt) ) > 0 && strlen( trim($description) ) == 0 && !$fvseop_options['aiosp_dont_use_excerpt'] ) {
            	$meta_description_excerpt = 'Using post excerpt, type your SEO meta description here.';
             	$fvseo_description_input_description = $meta_description_excerpt;
             	$fvseo_description_input_disabled = true;
            } else {
              $meta_description_excerpt = false;
            	$fvseo_description_input_description = $description;
            }
            ?>
            <?php _e('Meta Description:', 'fv_seo') ?> <abbr title="<?php _e('Displayed in search engine results. Can be called inside of template file with', 'fv_seo') ?> &lt;?php echo get_post_meta('_aioseop_description',$post->ID); ?&gt;">(?)</abbr>
            <textarea id="fvseo_description_input" class="input <?php if($fvseo_description_input_disabled) echo 'fvseo_disabled'; ?>" name="fvseo_description" rows="2" onkeydown="countChars(document.post.fvseo_description,document.post.lengthD, 'default')"
              onkeyup="countChars(document.post.fvseo_description,document.post.lengthD, 'default');" onclick="if(this.value == '<?php echo $meta_description_excerpt; ?>' ) { this.value = ''; jQuery(this).removeClass('fvseo_disabled'); }"><?php echo $fvseo_description_input_description ?></textarea>
            <br />
            <input id="lengthD" class="inputcounter" readonly="readonly" type="text" name="lengthD" size="3" maxlength="3" value="<?php echo strlen($description);?>" />
            <small><?php printf(__(' characters. Most search engines use a maximum of %d chars for the description.', 'fv_seo'), $fvseo->maximum_description_length) ?></small>
        </p>
        <?php } ?>
        <div>
            <p><?php _e('SERP Preview:', 'fv_seo') ?> <abbr title="<?php _e('Preview of Search Engine Results Page', 'fv_seo') ?> ">(?)</abbr></p>        
            <h2 id="fvseo_title"><a href="<?php the_permalink(); ?>" target="_blank"><?php echo $title_preview; ?></a></h2>
            <p id="fvseo_meta"><?php echo ($description) ? $description : __("Fill in your meta description", "fv_seo") ?></p>
            <small id="fvseo_href"><?php echo $url; ?></small> - <small class="link"><?php _e('Cached', 'fv_seo') ?></small> - <small class="link"><?php _e('Similar', 'fv_seo') ?></small>
            <br />
        </div>

    <?php if ($fvseop_options['aiosp_show_keywords']) : ?>
        <p>
            <?php _e('Keywords:', 'fv_seo') ?> <small>(comma separated)</small>
            <input class="input" value="<?php echo $keywords ?>" type="text" name="fvseo_keywords" />
        </p>    
    <?php endif; ?>

    
    <?php if (isset($fvseop_options['aiosp_show_custom_canonical']) && $fvseop_options['aiosp_show_custom_canonical']) : ?>
        <p>
            <?php _e('Custom Canonical URL:', 'fv_seo') ?> <abbr title="<?php _e('WARNING - Google will index the URL you enter here instead of the post. Leave empty if you don\'t want to use it.', 'fv_seo') ?>">(?)</abbr>
            <input class="input" value="<?php echo $custom_canonical ?>" type="text" name="fvseo_custom_canonical" />
        </p>    
    <?php endif; ?>    
    
    </div><!--	.fvseo-noindex	-->
		<?php if ( (isset($fvseop_options['aiosp_show_noindex']) && $fvseop_options['aiosp_show_noindex']) || $noindex ) : ?>
			<div class="fvseo-noindex" <?php if( $noindex ) { echo 'style="display:block;"'; } else { echo 'style="display:none;"'; } ?>>
				<strong>Post won't be indexed by Search Engines and it won't show up in internal site search.</strong>
			</div>
		<?php endif; ?>    

<?php if($post->post_type == 'page') { ?>
    
    <?php if ($fvseop_options['aiosp_show_titleattribute']) : ?>
        <p>
            <?php _e('Title Attribute:', 'fv_seo') ?> <abbr title="<?php _e('Displayed in search engine results', 'fv_seo') ?>">(?)</abbr>
            <input class="input" value="<?php echo $fvseo_titleatr ?>" type="text" name="fvseo_titleatr" size="62"/>
        </p>
    <?php endif; ?>
    
<?php } ?>    

<?php if($post->post_type == 'page' || (isset($fvseop_options['aiosp_show_short_title_post']) && $fvseop_options['aiosp_show_short_title_post']) ) { ?>
        
        <p>
            <?php _e('Short title | Menu Label:', 'fv_seo') ?> <abbr title="<?php
            if( $post->post_type == 'page' ) : ?> 
            <?php _e('Used in all your page menus. Long Title or Post Title will be used for mouse rollover. Can be called inside of template file with','fv_seo') ?> &lt;?php echo get_post_meta('_aioseop_menulabel',$post->ID); ?&gt;
            <?php else : ?>
            <?php _e('This will automatically replace post title in sidebar. Can be called inside of template file with', 'fv_seo') ?> &lt;?php echo get_post_meta('_aioseop_menulabel',$post->ID); ?&gt;
            <?php endif; ?>">(?)</abbr>
            <input class="input" value="<?php echo $fvseo_menulabel ?>" type="text" name="fvseo_menulabel" size="62"/>
        </p>

<?php } ?>
    
    <?php if ($fvseop_options['aiosp_show_disable']) : ?>
        <p>
            <?php _e('Disable on this page/post:', 'fv_seo')?>
            <input type="checkbox" name="fvseo_disable" <?php if ($fvseo_disable) echo 'checked="checked"'; ?>/>
        </p>
    <?php endif; ?>
    
    
    <?php if ( (isset($fvseop_options['aiosp_show_noindex']) && $fvseop_options['aiosp_show_noindex']) || $noindex || $nofollow) : ?>
        <p>
            <?php _e('Disable post indexing:', 'fv_seo') ?> <abbr title="<?php _e('Only use if you are sure you don\'t want this post to be indexed in search engines!','fv_seo')?>">(<?php _e('Warning','fv_seo') ?>)</abbr><br />
            <input id="fvseo_noindex" class="input" value="1" <?php if( $noindex ) echo 'checked="checked"'; ?> type="checkbox" name="fvseo_noindex" onclick="FVSimplerSEO_noindex_toggle(); return true" />
            <label for="fvseo_noindex">Add noindex</label><br />
            <input id="fvseo_nofollow" class="input" value="1" <?php if( $nofollow ) echo 'checked="checked"'; ?> type="checkbox" name="fvseo_nofollow" />
            <label for="fvseo_nofollow">Add nofollow</label>
        </p>    
    <?php endif; ?>       
    
    <?php if (!function_exists('qtrans_getSortedLanguages')) { ?>
      <script type="text/javascript">
      countChars(document.post.fvseo_description,document.post.lengthD, 'default');
      countChars(document.post.fvseo_title,document.post.lengthT, 'default');
      </script>
    <?php } ?>
<?php
}

function fvseo_get_localized_string($string, $language)
{
  $strings_array = explode('&lt;!--:--&gt;', $string);
  $language_code =  '&lt;!--:' . $language . '--&gt;';
  foreach($strings_array as $string) {
    if (substr($string, 0, strlen($language_code)) == $language_code) {
      return substr($string, strlen($language_code)); 
    }  
  }
}

function fvseo_meta_box_add()
{
	add_meta_box('fvsimplerseopack',__('FV Simpler SEO', 'fv_seo'), 'fvseo_meta', 'post');
	add_meta_box('fvsimplerseopack',__('FV Simpler SEO', 'fv_seo'), 'fvseo_meta', 'page');
   
   global $fvseop_options;
   if ( $fvseop_options['fvseo_publ_warnings'] == 1 ) {
      add_action('admin_head', 'fvseo_check_empty_clientside', 1);
   } else {
      fvseo_removetitlechecker();
   }

if( false === get_option( 'aiosp-shorten-link-install' ) )
      add_option( 'aiosp-shorten-link-install', date( 'Y-m-d H:i:s' ) );
}

if( isset($fvseop_options['aiosp_can']) && ( $fvseop_options['aiosp_can'] == '1' || $fvseop_options['aiosp_can'] === 'on') ) {
	remove_action('wp_head', 'rel_canonical');
}

add_action('admin_menu', 'fvseo_meta_box_add');
add_action('wp_list_pages', 'fvseop_list_pages');
add_action('wp_nav_menu', 'fvseop_nav_menu');

$fvseo = new FV_Simpler_SEO_Pack();

add_action('admin_init', array($fvseo, 'admin_init') );
add_action('init', array($fvseo, 'init'));
add_action('template_redirect', array($fvseo, 'template_redirect'));
add_action('wp_head', array($fvseo, 'wp_head'));
add_action('wp_head', array($fvseo, 'remove_canonical'), 0 );
add_action('wp_head', array($fvseo, 'google_authorship') );
add_action('wp_head', array($fvseo, 'social_meta_tags') );
add_action('edit_post', array($fvseo, 'post_meta_tags'));
add_action('publish_post', array($fvseo, 'post_meta_tags'));
add_action('save_post', array($fvseo, 'post_meta_tags'));
add_action('edit_page_form', array($fvseo, 'post_meta_tags'));
add_action('admin_menu', array($fvseo, 'admin_menu'));

add_filter( 'get_user_option_closedpostboxes_fv_simpler_seo_settings', array($fvseo, 'fv_simpler_seo_settings_closed_meta_boxes' ) );

add_filter( 'wp_unique_post_slug', array( $fvseo, 'EditPostSlug' ), 99, 5 );
add_filter( 'wp_insert_post_data', array( $fvseo, 'SavePostSlug' ), 99, 2 );
add_filter( 'sanitize_title', array( $fvseo, 'SanitizeTitleForShortening' ), 99, 3 );

add_filter( 'get_previous_post_where', array( $fvseo, 'get_adjacent_post_where' ) );	//	make sure noindex posts don't turn up in the search
add_filter( 'get_next_post_where', array( $fvseo, 'get_adjacent_post_where' ) );	//	make sure noindex posts don't turn up in the search
add_filter( 'pre_get_posts', array( $fvseo, 'pre_get_posts' ) );	//	make sure noindex posts don't turn up in the search
add_filter( 'wp_list_pages_excludes', array( $fvseo, 'wp_list_pages_excludes' ) );	//	make sure noindex pages don't get into automated wp menus

add_filter( 'get_sidebar', array( $fvseo, 'initiate_the_title_change' ) );
add_filter( 'yarpp_results', array( $fvseo, 'yarpp_results' ), 10, 2 );


//this function removes final periods from post slugs as such urls don't work with nginx; it only gets applied if the "Slugs with periods" plugin has replaced the original sanitize_title function
function sanitize_title_no_final_period ($title) {
        $title = strip_tags($title);
        // Preserve escaped octets.
        $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
        // Remove percent signs that are not part of an octet.
        $title = str_replace('%', '', $title);
        // Restore octets.
        $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

        $title = remove_accents($title);
        if (seems_utf8($title)) {
                if (function_exists('mb_strtolower')) {
                        $title = mb_strtolower($title, 'UTF-8');
                }
                $title = utf8_uri_encode($title);
        }

        $title = strtolower($title);
        $title = preg_replace('/&.+?;/', '', $title); // kill entities
        $title = preg_replace('/[^%a-z0-9\. _-]/', '', $title);
        $title = preg_replace('/\s+/', '-', $title);
        $title = preg_replace('|-+|', '-', $title);
        $title = trim($title, '-\.');

        return $title;
}

function replace_title_sanitization() {
	if ( has_filter( 'sanitize_title', 'sanitize_title_with_dashes_and_period' ) ) {
		remove_filter ('sanitize_title', 'sanitize_title_with_dashes_and_period');
		add_filter ('sanitize_title', 'sanitize_title_no_final_period');
	}
}

replace_title_sanitization();
add_action( 'plugins_loaded', 'replace_title_sanitization' );

function fvseo_check_empty_clientside() {
?>
<script language="javascript" type="text/javascript">
jQuery(document).ready(function() {
   var target = null;
    jQuery('#post :input, #post-preview').focus(function() {
        target = this;
        // console.log(target);
    });
      
   jQuery("#post").submit(function(){
    
      if(jQuery(target).is(':input') && ( jQuery(target).val() == 'Publish' || jQuery(target).val() == 'Update' ) && jQuery("#title").val() == '') {
         //console.log(target);
         alert("<?php _e('Your post\'s TITLE is empty, so it cannot be published!', 'fv_seo')  ?>");
         
         jQuery('#ajax-loading').removeAttr('style');
         jQuery('#save-post').removeClass('button-disabled');
         jQuery('#publish').removeClass('button-primary-disabled');
         return false;
      } 
   });
   
   jQuery("#publish").hover( function() {// Publish button
      if (jQuery("#title").val() == '') {
         jQuery("#major-publishing-actions").append(jQuery(
            "<div class=\"hovered-warning\" style=\"text-align: left;\"><b><span style=\"color:red;\"><?php _e('Warning', 'fv_seo') ?></span>: <?php _e('Your post\'s TITLE is empty!', 'fv_seo') ?></b></div>"
         ));
      } 
      if (jQuery("#fvseo_description_input").val() == '') {
         jQuery("#major-publishing-actions").append(jQuery(
            "<div class=\"hovered-warning\" style=\"text-align: left;\"><b><span style=\"color:red;\"><?php _e('Warning', 'fv_seo') ?></span>: <?php _e('Your post\'s DESCRIPTION is empty!', 'fv_seo') ?></b></div>"
         ));
      }
   }, function() {
      jQuery(".hovered-warning").remove();
   });
   
   jQuery("#minor-publishing-actions").hover( function() {// Draft, Preview
      if (jQuery("#title").val() == '') {
         jQuery(this).append(jQuery(
            "<div class=\"hovered-warning\" style=\"text-align: left;\"><b><span style=\"color:red;\"><?php _e('Warning', 'fv_seo') ?></span>: <?php _e('Your post\'s TITLE is empty!', 'fv_seo') ?></b></div>"
         ));
      }
      if (jQuery("#fvseo_description_input").val() == '') {
         jQuery(this).append(jQuery(
            "<div class=\"hovered-warning\" style=\"text-align: left;\"><b><span style=\"color:red;\"><?php _e('Warning', 'fv_seo') ?></span>: <?php _e('Your post\'s DESCRIPTION is empty!', 'fv_seo') ?></b></div>"
         ));
      }
   }, function() {
      jQuery(".hovered-warning").remove();
   });
});
</script>
<?php
}

function fvseo_removetitlechecker() {
   if ( has_action( 'admin_head', 'fvseo_check_empty_clientside' ) ) {
      remove_action( 'admin_head', 'fvseo_check_empty_clientside' );
   }
}

if( is_admin() ){
   register_deactivation_hook( __FILE__, 'fvseo_removetitlechecker' );
}

function fvseo_remove_category_list_rel( $output ) {
    // Remove rel attribute from the category list
    return str_replace( ' rel="category tag"', '', $output );
}

if( isset($fvseop_options['aiosp_remove_category_rel']) && $fvseop_options['aiosp_remove_category_rel'] ) {  
    add_filter( 'wp_list_categories', 'fvseo_remove_category_list_rel' );
    add_filter( 'the_category', 'fvseo_remove_category_list_rel' );
}

add_action( 'activate_' .plugin_basename(__FILE__), array( $fvseo, 'activate' ) );
