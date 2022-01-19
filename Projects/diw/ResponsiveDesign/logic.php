<?php
session_start();

$componentes = [
    array(
        "nombre" => "GigaByte GA-B360M DS3H",
        "precio" => "77",
        "foto1" => "img/comp/1/1.jpg",
        "foto2" => "img/comp/1/2.jpg",
        "foto3" => "img/comp/1/3.jpg",
        "car1" => "Admite procesadores  Intel® Core ™ de octava generación. Nuevo diseño híbrido de PWM digital",
        "car2" => "Memoria Intel® Optane ™. Dual Channel Non-ECC Unbuffered DDR4. M.2 ultra rápida con PCIe Gen3 x4 y 
                    interfaz SATA.",
        "car3" => "GIGABYTE Exclusive 8118 Gaming LAN con gestión de ancho de banda",
        "car4" => "Smart Fan 5 con sensores de múltiple temperatura y cabezales de ventilación híbrida con FAN STOP.",
        "car5" => "Protección de sobretensión Ultra Durable ™ 15KV Surge LAN",
        "car6" => "GIGABYTE UEFI DualBIOS ™"

    ),
    array(
        "nombre" => "Gigabyte GA-B250M-DS3H",
        "precio" => "65,99",
        "foto1" => "img/comp/2/1.jpg",
        "foto2" => "img/comp/2/2.jpg",
        "foto3" => "img/comp/2/3.jpg",
        "car1" => "Support for 7th and 6th generation Intel® Core™ i7 processors/ Intel® Core™ i5 processors/Intel® 
                    Core™ i3 processors/ Intel® Pentium® processors/Intel® Celeron® processors in the LGA1151 package",
        "car2" => "L3 cache varies with CPU",
        "car3" => "Intel® B250 Express Chipset",
        "car4" => "4 x DDR4 DIMM sockets supporting up to 64 GB of system memory
                    * Due to a Windows 32-bit operating system limitation, when more than 4 GB of physical memory is 
                    installed, the actual memory size displayed will be less than the size of the physical memory installed",
        "car5" => "Realtek® ALC887 codec, High Definition Audio, 2/4/5.1/7.1-channel",
        "car6" => "6 x USB 3.1 Gen 1 ports (4 ports on the back panel, 2 ports available through the internal USB header)"
    ),
    array(
        "nombre" => "MSI Z370 Gaming Plus",
        "precio" => "129,90",
        "foto1" => "img/comp/3/1.jpg",
        "foto2" => "img/comp/3/2.jpg",
        "foto3" => "img/comp/3/3.jpg",
        "car1" => "Supports 8th Generation Intel® Core™ Processors, and Intel® Pentium® and Celeron® Processors for 
                    Socket LGA1151",
        "car2" => "Intel® Z370 Chipset",
        "car3" => "4 x DDR4 memory slots, support up to 64GB",
        "car4" => "Supports DDR4 4000+(OC)/ 3866(OC)/ 3733(OC)/ 3600(OC)/ 3466(OC)/ 3400(OC)/ 3333(OC)/ 3300(OC)/ 
                    3200(OC)/ 3000(OC) / 2800(OC)/ 2667/ 2400/ 2133 MHz",
        "car5" => "Dual channel memory architecture",
        "car6" => "Supports non-ECC UDIMM memory"
    ),
    array(
        "nombre" => "Intel Core i7-8700K 3.7Ghz BOX",
        "precio" => "459,90",
        "foto1" => "img/comp/4/1.jpg",
        "foto2" => "img/noFoto.jpg",
        "foto3" => "img/noFoto.jpg",
        "car1" => "Microarchitecture Coffee Lake",
        "car2" => "Socket Socket 1151 / H4 / LGA1151",
        "car3" => "The number of CPU cores 6",
        "car4" => "Manufacturing process 0.014 micron",
        "car5" => "Physical memory 64 GB",
        "car6" => "Level 3 cache size 12 MB shared cache"
    ),
    array(
        "nombre" => "Intel Core i5-7400 3.0GHz BOX",
        "precio" => "207,90",
        "foto1" => "img/comp/5/1.jpg",
        "foto2" => "img/noFoto.jpg",
        "foto3" => "img/noFoto.jpg",
        "car1" => "Microarchitecture Kaby Lake",
        "car2" => "Socket Socket 1151 / H4 / LGA1151",
        "car3" => "Manufacturing process 0.014 micron",
        "car4" => "The number of CPU cores 4",
        "car5" => "The number of threads 4",
        "car6" => "Level 3 cache size 6 MB shared cache"
    ),
    array(//6
        "nombre" => "Procesador AMD Ryzen 5 2600 3.9 Ghz",
        "precio" => "179,90",
        "foto1" => "img/comp/6/1.jpg",
        "foto2" => "img/noFoto.jpg",
        "foto3" => "img/noFoto.jpg",
        "car1" => "Frecuencia máxima del procesador: 3900 MHz",
        "car2" => "Número de núcleos de procesador: 6",
        "car3" => "Socket de procesador: Socket AM4",
        "car4" => "Número de filamentos de procesador: 12",
        "car5" => "Modo de procesador operativo: 64 bits",
        "car6" => "Caché del procesador: 19 MB"
    ),
    array(
        "nombre" => "Intel Core i9-9900K 3.6Ghz",
        "precio" => "639,90",
        "foto1" => "img/comp/7/1.jpg",
        "foto2" => "img/noFoto.jpg",
        "foto3" => "img/noFoto.jpg",
        "car1" => "Sólo compatible con sus placas base basadas en chipset de la serie 300, el procesador Intel Core 
                    i9-9900K 3.6 GHz Eight-Core LGA 1151 está diseñado para juegos, creación y productividad",
        "car2" => "Tiene una velocidad de reloj base de 3.6 GHz y viene con características como la compatibilidad con 
                    Intel Optane Memory, el cifrado AES-NI, la tecnología Intel vPro, Intel TXT",
        "car3" => "Con la tecnología Intel Turbo Boost Max 3.0, la frecuencia máxima de turbo que este procesador
                    puede alcanzar es de 5.0 GHz",
        "car4" => "Este procesador también admite memoria RAM DDR4-2666 de doble canal y utiliza tecnología de novena generación",
        "car5" => "Tiene 8 núcleos que permite que el procesador ejecute varios programas simultáneamente sin ralentizar 
                    el sistema, mientras que los 16 subprocesos permiten que una secuencia de instrucciones ordenada 
                    básica pase o sea procesada por un solo núcleo de CPU",
        "car6" => "Tecnología de virtualización Intel VT-d para E / S dirigida y tecnología Intel Hyper-Threading 
                    para tareas múltiples de 16 vías"
    )
];

$perifericos = [
    array(
        "nombre" => "BenQ GL2580H 24.5\" LED FHD",
        "precio" => "129",
        "foto1" => "img/perif/1/1.jpg",
        "foto2" => "img/perif/1/2.jpg",
        "foto3" => "img/noFoto.jpg",
        "car1" => "Impresionante pantalla Full HD",
        "car2" => "RÁPIDO tiempo de respuesta GAG de 2 ms",
        "car3" => "Diseño de bisel estrecho sin marco",
        "car4" => "Cuidado ocular avanzado",
        "car5" => "Diagonal de la pantalla: 62,2 cm (24.5\")",
        "car6" => "Resolución de la pantalla: 1920 x 1080 Pixeles"
    ),
    array(
        "nombre" => "Philips 243V5LHSB 23.6\" LED",
        "precio" => "115",
        "foto1" => "img/perif/2/1.jpg",
        "foto2" => "img/perif/2/2.jpg",
        "foto3" => "img/perif/2/3.jpg",
        "car1" => "Los LED blancos son dispositivos de estado sólido que se iluminan completamente,",
        "car2" => "SmartContrast es la tecnología de Philips que analiza los contenidos que visualizas",
        "car3" => "La calidad de imagen importa. Las pantallas habituales ofrecen buena calidad",
        "car4" => "SmartControl Lite es la siguiente generación de software que controla la interfaz de usuario del monitor",
        "car5" => "Un dispositivo HDMI-ready tiene todo el hardware necesario para admitir una entrada de interfaz 
                    multimedia de alta definición (HDMI)",
        "car6" => "Los monitores de Philips con retroiluminación LED no contienen mercurio, una de las sustancias 
                    naturales más tóxicas que afectan a los seres humanos y a los animales"
    ),
    array(
        "nombre" => "Acer ED242QR 23.6\" LED FullHD Curvo FreeSync Blanco",
        "precio" => "149",
        "foto1" => "img/perif/3/1.jpg",
        "foto2" => "img/perif/3/2.jpg",
        "foto3" => "img/perif/3/3.jpg",
        "car1" => "Ángulo de visión horizontal: 178 °",
        "car2" => "Resolución de la pantalla: 1920 x 1080 píxeles",
        "car3" => "Brillo de pantalla: 250 cd / m²",
        "car4" => "Tamaño de pixel: 0,27 x 0,27 mm",
        "car5" => "Consumo de energía (apagado): 0,5 W",
        "car6" => "Formatos gráficos soportados: 1920 x 1080 (HD 1080)"
    ),
    array(
        "nombre" => "Corsair K70 RGB MK.2 RapidFire Teclado Mecánico Gaming Retroiluminado Cherry MX Speed Negro",
        "precio" => "139,99",
        "foto1" => "img/perif/4/1.jpg",
        "foto2" => "img/perif/4/2.jpg",
        "foto3" => "img/perif/4/3.jpg",
        "car1" => "La ventaja Rapidfire: Los interruptores mecánicos CHERRY MX Speed le proporcionan una actuación 
                    extraordinariamente rápida de 1,2 mm para que sus pulsaciones se registren con mayor rapidez",
        "car2" => "Estructura de aluminio cepillado anodizado de calidad aeroespacial: diseñada para soportar toda una 
                    vida de juegos. Durabilidad ligera y resistente, diseñada para soportar miles de horas de juego",
        "car3" => "Interruptores mecánicos 100 % Cherry MX: los interruptores Cherry MX de fabricación alemana le ofrecen 
                    la fiabilidad y la precisión que necesita",
        "car4" => "Programación con el software CORSAIR iCUE: permite controlar la iluminación RGB viva y dinámica, 
                    con una sofisticada programación de macros y la posibilidad de sincronizar toda la iluminación del 
                    sistema, gracias a su compatibilidad con multitud de productos CORSAIR",
        "car5" => "Modo de bloqueo de teclas de Windows: mantenga la concentración y evite pulsar accidentalmente la 
                    tecla de menú contextual y de Windows",
        "car6" => "Conjuntos de teclas para FPS y MOBA: las teclas contorneadas y de textura especial permiten un 
                    agarre máximo y un tacto mejorado"
    ),
    array(
        "nombre" => "Logitech G213 Prodigy Teclado Gaming",
        "precio" => "44,99",
        "foto1" => "img/perif/5/1.jpg",
        "foto2" => "img/perif/5/2.jpg",
        "foto3" => "img/perif/5/3.jpg",
        "car1" => "Uso simultáneo de teclas para mayor rendimiento. Cuatro veces más rápido que los teclados estándar. 
                    Cada tecla de G213 está optimizada para mejorar la experiencia táctil y ofrecer una respuesta 
                    superrápida, hasta 4 veces superior a la de los teclados estándar. La matriz de prevención de efecto 
                    fantasma para juegos está programada para dominar el control al pulsar simultáneamente varias teclas 
                    de juego",
        "car2" => "Zonas de iluminación RGB brillantes y nítidas. Elige entre 16,8 millones de colores. Añade un toque 
                    personal con cinco zonas de iluminación individuales con un espectro de hasta 16,8 millones de 
                    colores",
        "car3" => "Resistente a salpicaduras y duradero. Diseñado para la vida de verdad. Los accidentes ocurren, por 
                    eso G213 Prodigy se ha creado para la vida de verdad",
        "car4" => "Reposamanos integrado y patas ajustables. Juega más tiempo. El ajuste de ángulo en dos niveles te 
                    permite colocar el teclado en la posición ideal, mientras el reposamanos integrado alivia la 
                    incomodidad o la fatiga, para que puedas seguir jugando cómodamente ronda tras ronda",
        "car5" => "Controles multimedia específicos. Reproducir, pausa, omitir, ajustar. Controla tu pista de fondo sin 
                    detener la acción. G213 posee controles multimedia específicos que se pueden usar para reproducir, 
                    poner en pausa y silenciar música y vídeos al instante",
        "car6" => "Ajusta el volumen o salta a la siguiente canción con sólo pulsar un botón. Personaliza con 
                    Logitech Gaming Software"
    ),
    array(
        "nombre" => "Logitech G203 Prodigy Ratón Gaming",
        "precio" => "23,90",
        "foto1" => "img/perif/6/1.jpg",
        "foto2" => "img/perif/6/2.jpg",
        "foto3" => "img/perif/6/3.jpg",
        "car1" => "Hasta ocho veces más rápido: G203 Prodigy puede comunicarse a 1.000 señales por segundo, una 
                    velocidad 8 veces superior a la de los ratones estándar. Por eso al moverlo o hacer clic, la 
                    respuesta en pantalla es casi instantánea.",
        "car2" => "Cómodo y familiar: Igual que el ratón Logitech G Pro Gaming, el G203 se inspira en el diseño clásico 
                    del legendario Logitech G100S Gaming Mouse",
        "car3" => "Aumenta tu precisión: Juega hasta el máximo con más acierto que nunca. El G203 tiene un nuevo sensor 
                    de 200-6.000 dpi que ofrece increíble precisión, velocidad de seguimiento y uniformidad de respuesta. 
                    Esto permite un mejor control, sea cual sea tu estilo de juego",
        "car4" => "Clics fiables y definidos: El sistema de tensión de botones avanzado aporta una experiencia de clic 
                    más exacta. Con esta tecnología, un resorte metálico mantiene los botones izquierdo y derecho siempre 
                    a punto para el clic, lo que reduce la fuerza requerida para la acción de clic y ofrece una respuesta, 
                    sensación y uniformidad excepcionales",
        "car5" => "Legendaria calidad Logitech: Logitech lleva más de 30 años al frente de iniciativas innovadoras de 
                    tecnología de audio, ofimática y gaming",
        "car6" => "Personalización para mayor control: Logitech G203 Prodigy Gaming Mouse se puede usar tal cual o después 
                    de configurarlo con Logitech Gaming Software. Los usuarios expertos pueden configurar 6 botones para 
                    simplificar acciones de juego"
    ),
];

$smartphones = [
    array(
        "nombre" => "Xiaomi Redmi S2 32Gb Gris Libre",
        "precio" => "165,99",
        "foto1" => "img/smart/1/1.jpg",
        "foto2" => "img/smart/1/2.jpg",
        "foto3" => "img/smart/1/3.jpg",
        "car1" => "Sistema operativo: MIUI V9.5 (Android 8.1 Oreo)",
        "car2" => "Procesador: Octa Core , Qualcomm Snapdragon 625 MSM8953 ARM Cortex-A53 a 1.95 GHz",
        "car3" => "Gráfica: Qualcomm Adreno 506, a 650 MHz",
        "car4" => "Memoria interna: 32 GB, Ampliable mediante SD hasta 128 GB",
        "car5" => "SIM: DualSim",
        "car6" => "Tipo tarjeta: Nano SIM / Nano SIM"
    ),
    array(
        "nombre" => "Apple iPhone XS Max 64Gb Dorado Libre",
        "precio" => "1259",
        "foto1" => "img/smart/2/1.jpg",
        "foto2" => "img/smart/2/2.jpg",
        "foto3" => "img/smart/2/3.jpg",
        "car1" => "Pantalla Super Retina en dos tamaños: grande y grandioso",
        "car2" => "Materiales extraordinarios. El vidrio más resistente usado nunca en un smartphone",
        "car3" => "Face ID avanzado. No hay contraseña más fácil de recordar que tu propia cara",
        "car4" => "Chip inteligente A12 Bionic. El Neural Engine de última generación convierte este chip en el más 
                    inteligente y con mayor potencia que ha tenido un smartphone",
        "car5" => "Un revolucionario sistema de cámara dual. La cámara más popular del mundo abre paso a una nueva era 
                    de la fotografía",
        "car6" => "Y además esto. El iPhone XS viene con 4G LTE Advanced para darte velocidades de descarga supersónicas"
    ),
    array(
        "nombre" => "Huawei P20 Pro Dual Sim Negro Libre",
        "precio" => "799",
        "foto1" => "img/smart/3/1.jpg",
        "foto2" => "img/smart/3/2.jpg",
        "foto3" => "img/smart/3/3.jpg",
        "car1" => "Cámara triple Leica Recrea tus fotografías gracias al sensor de imagen de gran tamaño, los píxeles 
                    Light Fusion y el zoom híbrido. Haz fotos perfectas en todo momento",
        "car2" => "Una nueva cámara con tecnología de IA Saca el máximo partido a tu creatividad con una cámara que 
                    incorpora tecnología de IA",
        "car3" => "De la oscuridad a la luz La tecnología Light Fusion produce fotografías sorprendentes en condiciones 
                    de muy poca luz. Imágenes con menos ruido, menos grano, mayor definición y contraste",
        "car4" => "De la distancia al detalle Con el zoom 5x de Huawei P20 Pro, ahora podrás captar más desde lejos, si 
                    así lo deseas. Acerca el objeto fotografiado sin perder ningún detalle",
        "car5" => "Más inteligente y rápido durante más tiempo Experimenta el poder de la IA con la unidad de procesamiento 
                    neuronal del Kirin 970. La extraordinaria duración de su batería y su impresionante velocidad suponen 
                    un gran avance para la serie P",
        "car6" => "Batería de 4000 mAh Dura más y se carga más rápido"
    ),
    array(
        "nombre" => "OnePlus 6T 8GB/256Gb Midnight Black Libre",
        "precio" => "629",
        "foto1" => "img/smart/4/1.jpg",
        "foto2" => "img/smart/4/2.jpg",
        "foto3" => "img/smart/4/3.jpg",
        "car1" => "Captura cada detalle, ya sea de día o de noche, con la Estabilización Óptica de Omagen (OIS, por
                    sus siglas en inglés) y nuestra nueva función Paisaje nocturno. Las fotos son más espectaculares 
                    gracias a la nueva Luz de estudio y un sensor de cámara puntero para conseguir mejores imágenes",
        "car2" => "Haz más cosas con hasta 8 GB de RAM, la plataforma móvil Qualcomm® Snapdragon™ 845 y 256 GB de
                    almacenaje. El hardware y el software trabajan juntos para ofrecerte una experiencia rápida,
                    fluida y uniforme.",
        "car3" => "Con una batería de 3700 mAh, el OnePlus 6T te ofrece más energía que nunca, mientras que nuestra 
                    tecnología Fast Charge recarga tu teléfono en solo media hora",
        "car4" => "El objetivo de nuestro sistema operativo es garantizar que tu teléfono está a tu servicio, y no al 
                    revés. El OnePlus 6T está equipado con Android Pie y ofrece más funcionalidades que nunca gracias 
                    a la versión más rápida y fluida de OxygenOS hasta la fecha",
        "car5" => "Ya sea que esté escuchando música, viendo un video o disfrutando de su podcast favorito, los Bullets 
                    Type-C ofrecen una calidad de sonido y una comodidad superiores. Descubra por qué los Bullets Type-C 
                    son el compañero perfecto para su OnePlus 6T",
        "car6" => "Lo último en rapidez y fluidez gracias al procesador Qualcomm Snapdragon 845 y la GPU Adreno 630"
    ),
    array(
        "nombre" => "Apple iPad 2018 Wifi 32GB Plata",
        "precio" => "338,81",
        "foto1" => "img/smart/5/1.jpg",
        "foto2" => "img/smart/5/2.jpg",
        "foto3" => "img/smart/5/3.jpg",
        "car1" => "Chip A10 Fusion. Nacido para la velocidad: Arquitectura de 64 bits. Diseño de cuatro núcleos. Más de
                    3.300 millones de transistores",
        "car2" => "La multitarea es lo suyo. Y lo tuyo: El iPad te da potencia de sobra para usar varias apps a la vez.
                    Por ejemplo, puedes trabajar en un informe mientras haces búsquedas en Internet y hablas con un 
                    compañero por FaceTime. Verás lo fácil que es eso de multiplicarse",
        "car3" => "La mejor manera de sumergirte en la realidad aumentada: La realidad aumentada (AR) es una nueva
                    tecnología que lleva objetos virtuales al mundo real",
        "car4" => "Apple Pencil. Imagínalo. Anótalo: El iPad siempre ha sido una herramienta genial para plasmar tus
                    ideas, y ahora con más motivos",
        "car5" => "Dos grandes cámaras que hacen más que grandes fotos: Con las cámaras frontal y trasera integradas, no
                    solo podrás disfrutar de fotos y vídeos alucinantes, también escanear documentos, llamar por FaceTime
                     o incluso crear el plano de una casa con realidad aumentada",
        "car6" => "Lleno de potentes apps integradas: Toca un temazo con GarageBand, márcate una presentación de nivel con
                    Keynote o graba y edita un cortometraje con iMovie"
    ),
];

$ordenadores = [
    array(
        "nombre" => "Xiaomi Mi Air 13.3\"",
        "precio" => "899",
        "foto1" => "img/ordena/1/1.jpg",
        "foto2" => "img/ordena/1/2.jpg",
        "foto3" => "img/ordena/1/3.jpg",
        "car1" => "Xiaomi Mi Air es el primero de los portátiles de Xiaomi en llegar a España, y lo hace con una 
                    configuración a la última al utilizar un procesador i5 de octava generación y gráficos MX150 de NVIDIA",
        "car2" => "El Xiaomi Mi Notebook Air es ligero, es compacto, y podrás llevarlo fácilmente a cualquier lugar sin 
                    darte cuenta de que lo llevas encima",
        "car3" => "El SSD de 256 GB con interfaz PCIe es tan rápido que vuela. Inicia sesión en segundos, ejecuta 
                    múltiples herramientas al instante y olvídate para siempre de los tiempos de carga",
        "car4" => "Por fin un Mi Notebook Air con teclado y Windows en español. El lanzamiento en España del portátil 
                    de Xiaomi viene acompañado del layout español con ñ incluida",
        "car5" => "Este portátil Xiaomi cuenta con un diseño ultra delgado de 14.8mm y ligero de tan solo 1.3kg, y un 
                    cuerpo totalmente metálico (aleación de magnesio) con pantalla de vidrio",
        "car6" => "Este nuevo Mi Laptop Air 13\" utiliza el último procesador Intel Core Kaby Lake i5-8250U. A 3,4 GHz, 
                    el procesador de cuatro núcleos tiene un rendimiento de aumento del 40% en comparación con la 
                    séptima generación anterior"
    ),
    array(
        "nombre" => "HP NoteBook 15-DA0085NS Intel Core i3-7020/8GB/256GB SSD/15.6\"",
        "precio" => "549",
        "foto1" => "img/ordena/2/1.jpg",
        "foto2" => "img/ordena/2/2.jpg",
        "foto3" => "img/ordena/2/3.jpg",
        "car1" => "Procesador Intel® Core™ i3-7020U (2,3 GHz, 3 MB de caché, 2 núcleos)",
        "car2" => "Memoria RAM SDRAM de 8 GB DDR4-2133 (1 x 8 GB)",
        "car3" => "Almacenamiento SSD de 256 GB PCIe® NVMe™ M.2",
        "car4" => "Display Pantalla con retroiluminación WLED HD SVA BrightView de 39,6 cm (15,6 pulgadas) en diagonal 
                    (1366 x 768)",
        "car5" => "Controlador gráfico Gráficos Intel® UHD 620",
        "car6" => "Batería Batería de ion-litio de 3 celdas 41 Wh"
    ),
    array(
        "nombre" => "ibahía Custom Intel Core i7-8700K/32GB/500GB M.2+4TB/RTX 2080",
        "precio" => "3386,78",
        "foto1" => "img/ordena/3/1.jpg",
        "foto2" => "img/ordena/3/2.jpg",
        "foto3" => "img/ordena/3/3.jpg",
        "car1" => "Los tubos rígidos PETG son cortados y moldeados a medida por nuestros técnicos ofreciendo un aspecto
                    limpio y ordenado, que junto al cableado e iluminación dan un acabado y diseño espectacular",
        "car2" => "Procesador: Intel Core i7-8700K 3.7Ghz BOX",
        "car3" => "Memoria RAM: G.Skill Trident Z RGB DDR4 3200 PC4-25600 32GB 4x8GB CL16",
        "car4" => "Tarjeta gráfica: Asus Dual GeForce RTX 2080 8GB OC GDDR6",
        "car5" => "SSD: Samsung SSD 970 EVO PCI-E NVMe M.2 500 GB",
        "car6" => "Refrigeración líquida: Thermaltake Pacific M360 D5 Hard Tube Water Cooling Kit"
    ),
    array(
        "nombre" => "ibahía Custom Bronze Intel Pentium G4560/8GB/1TB/GT 1030",
        "precio" => "448,49",
        "foto1" => "img/ordena/4/1.jpg",
        "foto2" => "img/ordena/4/2.jpg",
        "foto3" => "img/ordena/4/3.jpg",
        "car1" => "Entra en el mundo Gaming del PC con este equipo de relación calidad/precio inigualable. Con este equipo
                    disfrutarás de los juegos Online de más exito del momento como LOL, PUBG, Rocket League, CSGO,
                    GTAV...con un rendimiento excelente gracias a su procesador Intel Pentium G4560 , sus 8GB de RAM DDR4
                     y la tarjeta gráfica Nvidia GT 1030 de 2GB..",
        "car2" => "Procesador: Intel Pentium G4560 3.5GHz",
        "car3" => "Disco Duro: 1TB SATA3",
        "car4" => "Tarjeta gráfica: GT 1030 2GB GDDR5",
        "car5" => "Memoria RAM: G.Skill Aegis DDR4 8GB ",
        "car6" => "Torre: L-Link Kazumi USB 3.0 con Ventana"
    ),
];


if (!isset($_SESSION["numero"])){//Inicialización de variables
    $_SESSION["numero"] = "";
    $_SESSION["seleccion"] = $componentes;
}

if (isset($_POST["componentes"])){//Si se hace click en componentes
    $_SESSION["seleccion"] = $componentes;
}
if (isset($_POST["perifericos"])){//Si se hace click en periféricos
    $_SESSION["seleccion"] = $perifericos;
}
if (isset($_POST["smartphones"])){//Si se hace click en smartphones
    $_SESSION["seleccion"] = $smartphones;
}
if (isset($_POST["ordenadores"])){//Si se hace click en ordenadores
    $_SESSION["seleccion"] = $ordenadores;
}

if (isset($_POST["articulo"])){//Si se hace click en un articulo
    $_SESSION["numero"] = $_POST["articulo"];
    header( "Location: producto.php");
}


?>