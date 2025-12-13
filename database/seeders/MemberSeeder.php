<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $memberData = array(
	0 => array('number' => '1', 'name' => 'JOSE LUIS', 'surname' => 'PARDO LOZANA', 'phone' => '649407806', 'nif' => '10751459Y', 'email' => null),
	1 => array('number' => '2', 'name' => 'MARCELINO', 'surname' => 'PARDO LOZANA', 'phone' => '686331990', 'nif' => '10749060X', 'email' => null),
	2 => array('number' => '3', 'name' => 'SILVINO ALVAREZ OTERO', 'surname' => 'ALVAREZ OTERO', 'phone' => '650144777', 'nif' => '10460449A', 'email' => null),
	3 => array('number' => '5', 'name' => 'ALFREDO', 'surname' => 'MEANA GARCIA', 'phone' => '606449696', 'nif' => '10738950C', 'email' => 'ameanagarcia@gmail.com'),
	4 => array('number' => '7', 'name' => 'JOSE L.', 'surname' => 'ALVARGONZALEZ JUNQUERA', 'phone' => '606512610', 'nif' => '10757654W', 'email' => 'alvarjun@hotmail.com'),
	5 => array('number' => '9', 'name' => 'BASILIO', 'surname' => 'TELEÑA GONZALEZ', 'phone' => '679198584', 'nif' => '10770468M', 'email' => 'telegonpa@yahoo.es'),
	6 => array('number' => '10', 'name' => 'ALFREDO', 'surname' => 'GONZALEZ PANIZO', 'phone' => '619518797', 'nif' => '10479431X', 'email' => 'neumogp@gmail.com'),
	7 => array('number' => '11', 'name' => 'ROBERTO', 'surname' => 'SUAREZ CANAL', 'phone' => '686540145', 'nif' => '10848425S', 'email' => 'rosuca66@gmail.com'),
	8 => array('number' => '13', 'name' => 'JOSE LUIS', 'surname' => 'RODRIGUEZ MARTINEZ', 'phone' => '652877125', 'nif' => '32332715M', 'email' => 'romarjl2015@gmail.com'),
	9 => array('number' => '14', 'name' => 'CESAR', 'surname' => 'ANTUÑA DIAZ', 'phone' => '620156887', 'nif' => '10475373T', 'email' => null),
	10 => array('number' => '15', 'name' => 'ENRIQUE', 'surname' => 'LAMADRID GONZALEZ', 'phone' => '666497183', 'nif' => '10768340Q', 'email' => 'lamadridgonzalez@gmail.com'),
	11 => array('number' => '16', 'name' => 'LUIS MIGUEL', 'surname' => 'GARCIA SILVA', 'phone' => '616925145', 'nif' => '09372957C', 'email' => 'luigimgsilva@gmail.com'),
	12 => array('number' => '17', 'name' => 'JOSE ANTONIO', 'surname' => 'FERNANDEZ IGLESIAS', 'phone' => '649510542', 'nif' => '10752016E', 'email' => 'jafi@telecable.es'),
	13 => array('number' => '18', 'name' => 'MIGUEL', 'surname' => 'PRADILLA VIÑAS', 'phone' => '667921494', 'nif' => '14504214E', 'email' => 'miguel-laarena@telecable.es'),
	14 => array('number' => '19', 'name' => 'RAFAEL', 'surname' => 'FERNÁNDEZ GARCIA', 'phone' => '670655467', 'nif' => '71590588Y', 'email' => 'rafasalmon@gmail.com'),
	15 => array('number' => '20', 'name' => 'LUIS', 'surname' => 'LENCE PINIELLA', 'phone' => '619372787', 'nif' => '10786669Z', 'email' => null),
	16 => array('number' => '23', 'name' => 'LUIS', 'surname' => 'HUERTA CASTRO', 'phone' => '654462068', 'nif' => '10853680A', 'email' => 'luis.huercas@gmail.com'),
	17 => array('number' => '24', 'name' => 'MANUEL ANTONIO', 'surname' => 'GONZALEZ ORDIZ', 'phone' => '687819120', 'nif' => '71614946F', 'email' => 'gonzalezordiz@hotmail.com'),
	18 => array('number' => '26', 'name' => 'JULIO', 'surname' => 'URIA CASTAÑON', 'phone' => '617645361', 'nif' => '10749150P', 'email' => null),
	19 => array('number' => '27', 'name' => 'ANGEL', 'surname' => 'CUESTA GARCIA', 'phone' => '649469928', 'nif' => '11357631R', 'email' => null),
	20 => array('number' => '29', 'name' => 'EMILIO', 'surname' => 'GONZALEZ GARCIA', 'phone' => '609083100', 'nif' => '10818074R', 'email' => 'emilio@inmobiliariatucasa.es'),
	21 => array('number' => '30', 'name' => 'JOSE RAMON', 'surname' => 'GONZALEZ GARCIA', 'phone' => '686471102', 'nif' => '10803183Z', 'email' => 'jr-gg@hotmail.com'),
	22 => array('number' => '31', 'name' => 'ADOLFO', 'surname' => 'GARCIA DIAZ', 'phone' => '609474075', 'nif' => '10487249P', 'email' => null),
	23 => array('number' => '32', 'name' => 'DAVID', 'surname' => 'GARCIA FERNANDEZ', 'phone' => '670278120', 'nif' => '10891920V', 'email' => 'David@adober.es'),
	24 => array('number' => '33', 'name' => 'ANGEL', 'surname' => 'PEREDA MARTINEZ', 'phone' => '608181086', 'nif' => '10798456W', 'email' => 'angelperedamartinez@gmail.com'),
	25 => array('number' => '34', 'name' => 'MARTIN FERMIN', 'surname' => 'MENDEZ MEJICA', 'phone' => '630018077', 'nif' => '10791568Z', 'email' => 'martin-fermin@hotmail.com'),
	26 => array('number' => '36', 'name' => 'SAMUEL', 'surname' => 'MENENDEZ TRABANCO', 'phone' => '658813733', 'nif' => '10823483M', 'email' => null),
	27 => array('number' => '37', 'name' => 'FRANCISCO ANTONIO', 'surname' => 'MARTIN ROMERO', 'phone' => '664590000', 'nif' => '31175795P', 'email' => 'paco.martinromero@gmail.com'),
	28 => array('number' => '38', 'name' => 'DAVID', 'surname' => 'OBAYA ESPINA', 'phone' => '667416274', 'nif' => '10819057H', 'email' => 'info@davidobaya.com'),
	29 => array('number' => '39', 'name' => 'CANDIDO', 'surname' => 'PÉREZ ÁLVAREZ', 'phone' => '661558560', 'nif' => '10883530E', 'email' => 'candido.perezalvarez@gmail.com'),
	30 => array('number' => '40', 'name' => 'ALFONSO', 'surname' => 'PALACIO GARCIA', 'phone' => '679818428', 'nif' => '10784774M', 'email' => 'alpagar170350@hotmail.es'),
	31 => array('number' => '41', 'name' => 'EUGENIO', 'surname' => 'SUAREZ ROCES', 'phone' => '669131084', 'nif' => '10166312J', 'email' => 'eusuro@gmail.com'),
	32 => array('number' => '42', 'name' => 'MIGUEL ANGEL', 'surname' => 'PEREZ ALVAREZ', 'phone' => '670736970', 'nif' => '10883927M', 'email' => null),
	33 => array('number' => '43', 'name' => 'IGNACIO', 'surname' => 'GARCIA SUAREZ', 'phone' => '646461201', 'nif' => '32882574A', 'email' => 'nacho@eco-modular.es'),
	34 => array('number' => '44', 'name' => 'JOAQUIN', 'surname' => 'COSTALES CASO', 'phone' => '660180785', 'nif' => '10771544T', 'email' => 'xuacu2015@gmail.com'),
	35 => array('number' => '46', 'name' => 'JOSE CARLOS', 'surname' => 'HUERGO COLUNGA', 'phone' => '616427966', 'nif' => '10813864T', 'email' => 'jcarlos.huergo@gmail.com'),
	36 => array('number' => '48', 'name' => 'JOSE LUIS', 'surname' => 'BERICUA MEANA', 'phone' => '670559700', 'nif' => '10833951P', 'email' => 'jlgbericua@hotmail.com'),
	37 => array('number' => '49', 'name' => 'JAIME', 'surname' => 'CANAL ALONSO', 'phone' => '620000792', 'nif' => '17994787R', 'email' => 'mjcanal@telefonica.net'),
	38 => array('number' => '51', 'name' => 'FCO. JESUS', 'surname' => 'HERNANDEZ BERASALUCE', 'phone' => '618729669', 'nif' => '10795263Y', 'email' => 'fjhbera@hotmail.com'),
	39 => array('number' => '53', 'name' => 'JOSE MANUEL', 'surname' => 'IGLESIAS ORDOÑEZ', 'phone' => '670654854', 'nif' => '10784652K', 'email' => 'jmio@telecable.es'),
	40 => array('number' => '54', 'name' => 'LUIS ANTONIO', 'surname' => 'FLOREZ ORDOÑEZ', 'phone' => '633468033', 'nif' => '10814687H', 'email' => 'florez.aparejador@gmail.com'),
	41 => array('number' => '55', 'name' => 'JULIO', 'surname' => 'CRESPO CRESPO', 'phone' => '630912175', 'nif' => '51904897S', 'email' => 'crespobis@gmail.com'),
	42 => array('number' => '56', 'name' => 'AMADOR', 'surname' => 'MIGUEL ALVAREZ', 'phone' => '629609574', 'nif' => '10795035P', 'email' => 'amarquel@hotmail.com'),
	43 => array('number' => '57', 'name' => 'LUIS BERNARDO', 'surname' => 'VARELA MARTINEZ', 'phone' => '678369252', 'nif' => '10797083D', 'email' => 'luisbvm@gmail.com'),
	44 => array('number' => '58', 'name' => 'MINERVINO', 'surname' => 'GARCIA SUAREZ', 'phone' => '669051291', 'nif' => '11043516C', 'email' => null),
	45 => array('number' => '59', 'name' => 'JAVIER IVAN', 'surname' => 'GONZALEZ MATEO', 'phone' => '647735372', 'nif' => '32870908K', 'email' => 'javivan2@gmail.com'),
	46 => array('number' => '60', 'name' => 'JUAN MARIANO', 'surname' => 'CARNICERO PRIETO', 'phone' => '677511903', 'nif' => '10794972Z', 'email' => 'juancarnicero@asturias.pro'),
	47 => array('number' => '61', 'name' => 'RUBEN', 'surname' => 'SUAREZ ALVAREZ', 'phone' => '620945243', 'nif' => '10884227Y', 'email' => 'suarezruben@me.com'),
	48 => array('number' => '62', 'name' => 'DAVID', 'surname' => 'QUIROS GONZALEZ', 'phone' => '661946542', 'nif' => '02544497F', 'email' => 'david@norabogados.com'),
	49 => array('number' => '63', 'name' => 'JUAN CARLOS', 'surname' => 'MUÑOZ SANCHEZ', 'phone' => '652732732', 'nif' => '9396467R', 'email' => 'juancarmusa@gmail.com'),
	50 => array('number' => '64', 'name' => 'JUAN', 'surname' => 'FOMBELLA VILLAVERDE', 'phone' => '687947835', 'nif' => '53542505T', 'email' => 'jfombella@hotmail.com'),
	51 => array('number' => '65', 'name' => 'GUILLERMO', 'surname' => 'MADERA ALVAREZ', 'phone' => '648159496', 'nif' => '10801935P', 'email' => 'guillermomadera@hotmail.com'),
	52 => array('number' => '66', 'name' => 'MANUEL', 'surname' => 'SARIEGO COLLADA', 'phone' => '625684332', 'nif' => '10864139C', 'email' => 'manuelsariego@gmail.com'),
	53 => array('number' => '67', 'name' => 'BORJA', 'surname' => 'AJUBITA DIAZ', 'phone' => '609832331', 'nif' => '30662049J', 'email' => 'bajubita@iberdrola.es'),
	54 => array('number' => '68', 'name' => 'JUAN', 'surname' => 'CIFUENTES RODRIGUEZ', 'phone' => '639179113', 'nif' => '09783944C', 'email' => 'juancifu@icloud.com'),
	55 => array('number' => '69', 'name' => 'ESTEBAN', 'surname' => 'APARICIO BAUSILI', 'phone' => '609615157', 'nif' => '10835882F', 'email' => 'apariciobausili@gmail.com'),
	56 => array('number' => '70', 'name' => 'MANUEL MARIO', 'surname' => 'VIGIL PICO', 'phone' => '670803438', 'nif' => '11060141Q', 'email' => 'mario@vigil.es'),
	57 => array('number' => '71', 'name' => 'LUIS RAMON', 'surname' => 'MENENDEZ ALVAREZ', 'phone' => '670462119', 'nif' => '11395808K', 'email' => 'luismenendez61@gmail.com'),
	58 => array('number' => '72', 'name' => 'ENRIQUE', 'surname' => 'LAMADRID SOLARES', 'phone' => '670235732', 'nif' => '10878178Y', 'email' => 'lamadrid@garaya12.es'),
	59 => array('number' => '74', 'name' => 'MIGUEL', 'surname' => 'MONTORO RODRIGUEZ', 'phone' => '609678276', 'nif' => '00792634P', 'email' => 'miguelmmr@me.com'),
	60 => array('number' => '75', 'name' => 'EMILIO J', 'surname' => 'CEÑAL FERNANDEZ', 'phone' => '667505521', 'nif' => '10861713D', 'email' => 'emilio@cenalabogados.com'),
);

  foreach($memberData as $data){
    Member::updateOrCreate(
      ['number' => (int) $data['number']],
      ['name' => $data['name'], 'surname' => $data['surname'], 'phone' => $data['phone'], 'nif' => $data['nif'], 'email' => $data['email']]
    );
  }

    }
}
