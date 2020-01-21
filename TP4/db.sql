CREATE TABLE IF NOT EXISTS turnos (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre char(255) NOT NULL,
  email char(255) NOT NULL,
  telefono char(255) NOT NULL,
  nacimiento date NOT NULL,
  calzado int(11) NOT NULL,
  altura int(11) NOT NULL,
  pelo int(11) NOT NULL,
  turno date NOT NULL,
  horario time NOT NULL,
  diagnostico char(4) NOT NULL,
  image longblob,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;