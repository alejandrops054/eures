CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre_completo` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `Empresa` text COLLATE utf8_spanish_ci NOT NULL,
  `logotipo` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre_completo` text COLLATE utf8_spanish_ci NOT NULL,
  `rfc` text COLLATE utf8_spanish_ci NOT NULL,
  `municipio` text COLLATE utf8_spanish_ci NOT NULL,
  `calle` text COLLATE utf8_spanish_ci NOT NULL,
  `region` text COLLATE utf8_spanish_ci NOT NULL,
  `colonia` text COLLATE utf8_spanish_ci NOT NULL,
  `pais` text COLLATE utf8_spanish_ci NOT NULL,
  `cp` text COLLATE utf8_spanish_ci NOT NULL,
  `tel` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `auditorias` (
  `id` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo_auditoria` text COLLATE utf8_spanish_ci NOT NULL,
  `pregunta` text COLLATE utf8_spanish_ci NOT NULL,
  `calificacion` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre_completo` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_envio_inprocess` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_envio_inreview` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_envio_completd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;