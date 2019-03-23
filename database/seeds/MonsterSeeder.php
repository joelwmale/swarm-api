<?php

use Illuminate\Database\Seeder;
use Swarm\Monsters\Monster;

class MonsterSeeder extends Seeder
{
    /**
     * Seed the monsters table.
     *
     * @return void
     */
    public function run()
    {
        $monsters = $this->getMonsters();

        foreach ($monsters as $monster) {
            Monster::create($monster);
        }
    }

    protected function getMonsters(): array
    {
        return [
            ['id' => 101, 'name' => 'Fairy'],
            ['id' => 10111, 'name' => 'Elucia'],
            ['id' => 10112, 'name' => 'Iselia'],
            ['id' => 10113, 'name' => 'Aeilene'],
            ['id' => 10114, 'name' => 'Neal'],
            ['id' => 10115, 'name' => 'Sorin'],

            ['id' => 102, 'name' => 'Imp'],
            ['id' => 10211, 'name' => 'Fynn'],
            ['id' => 10212, 'name' => 'Cogma'],
            ['id' => 10213, 'name' => 'Ralph'],
            ['id' => 10214, 'name' => 'Taru'],
            ['id' => 10215, 'name' => 'Garok'],

            ['id' => 103, 'name' => 'Pixie'],
            ['id' => 10311, 'name' => 'Kacey'],
            ['id' => 10312, 'name' => 'Tatu'],
            ['id' => 10313, 'name' => 'Shannon'],
            ['id' => 10314, 'name' => 'Cheryl'],
            ['id' => 10315, 'name' => 'Camaryn'],

            ['id' => 104, 'name' => 'Yeti'],
            ['id' => 10411, 'name' => 'Kunda'],
            ['id' => 10412, 'name' => 'Tantra'],
            ['id' => 10413, 'name' => 'Rakaja'],
            ['id' => 10414, 'name' => 'Arkajan'],
            ['id' => 10415, 'name' => 'Kumae'],

            ['id' => 105, 'name' => 'Harpy'],
            ['id' => 10511, 'name' => 'Ramira'],
            ['id' => 10512, 'name' => 'Lucasha'],
            ['id' => 10513, 'name' => 'Prilea'],
            ['id' => 10514, 'name' => 'Kabilla'],
            ['id' => 10515, 'name' => 'Hellea'],

            ['id' => 106, 'name' => 'Hellhound'],
            ['id' => 10611, 'name' => 'Tarq'],
            ['id' => 10612, 'name' => 'Sieq'],
            ['id' => 10613, 'name' => 'Gamir'],
            ['id' => 10614, 'name' => 'Shamar'],
            ['id' => 10615, 'name' => 'Shumar'],

            ['id' => 107, 'name' => 'Warbear'],
            ['id' => 10711, 'name' => 'Dagora'],
            ['id' => 10712, 'name' => 'Ursha'],
            ['id' => 10713, 'name' => 'Ramagos'],
            ['id' => 10714, 'name' => 'Lusha'],
            ['id' => 10715, 'name' => 'Gorgo'],

            ['id' => 108, 'name' => 'Elemental'],
            ['id' => 10811, 'name' => 'Daharenos'],
            ['id' => 10812, 'name' => 'Bremis'],
            ['id' => 10813, 'name' => 'Taharus'],
            ['id' => 10814, 'name' => 'Priz'],
            ['id' => 10815, 'name' => 'Camules'],

            ['id' => 109, 'name' => 'Garuda'],
            ['id' => 10911, 'name' => 'Konamiya'],
            ['id' => 10912, 'name' => 'Cahule'],
            ['id' => 10913, 'name' => 'Lindermen'],
            ['id' => 10914, 'name' => 'Teon'],
            ['id' => 10915, 'name' => 'Rizak'],

            ['id' => 110, 'name' => 'Inugami'],
            ['id' => 11011, 'name' => 'Icaru'],
            ['id' => 11012, 'name' => 'Raoq'],
            ['id' => 11013, 'name' => 'Ramahan'],
            ['id' => 11014, 'name' => 'Belladeon'],
            ['id' => 11015, 'name' => 'Kro'],

            ['id' => 111, 'name' => 'Salamander'],
            ['id' => 11111, 'name' => 'Kaimann'],
            ['id' => 11112, 'name' => 'Krakdon'],
            ['id' => 11113, 'name' => 'Lukan'],
            ['id' => 11114, 'name' => 'Sharman'],
            ['id' => 11115, 'name' => 'Decamaron'],

            ['id' => 112, 'name' => 'Nine-tailed Fox'],
            ['id' => 11211, 'name' => 'Soha'],
            ['id' => 11212, 'name' => 'Shihwa'],
            ['id' => 11213, 'name' => 'Arang'],
            ['id' => 11214, 'name' => 'Chamie'],
            ['id' => 11215, 'name' => 'Kamiya'],

            ['id' => 113, 'name' => 'Serpent'],
            ['id' => 11311, 'name' => 'Shailoq'],
            ['id' => 11312, 'name' => 'Fao'],
            ['id' => 11313, 'name' => 'Ermeda'],
            ['id' => 11314, 'name' => 'Elpuria'],
            ['id' => 11315, 'name' => 'Mantura'],

            ['id' => 114, 'name' => 'Golem'],
            ['id' => 11411, 'name' => 'Kuhn'],
            ['id' => 11412, 'name' => 'Kugo'],
            ['id' => 11413, 'name' => 'Ragion'],
            ['id' => 11414, 'name' => 'Groggo'],
            ['id' => 11415, 'name' => 'Maggi'],

            ['id' => 115, 'name' => 'Griffon'],
            ['id' => 11511, 'name' => 'Kahn'],
            ['id' => 11512, 'name' => 'Spectra'],
            ['id' => 11513, 'name' => 'Bernard'],
            ['id' => 11514, 'name' => 'Shamann'],
            ['id' => 11515, 'name' => 'Varus'],

            ['id' => 116, 'name' => 'Undine'],
            ['id' => 11611, 'name' => 'Mikene'],
            ['id' => 11612, 'name' => 'Atenai'],
            ['id' => 11613, 'name' => 'Delphoi'],
            ['id' => 11614, 'name' => 'Icasha'],
            ['id' => 11615, 'name' => 'Tilasha'],

            ['id' => 117, 'name' => 'Inferno'],
            ['id' => 11711, 'name' => 'Purian'],
            ['id' => 11712, 'name' => 'Tagaros'],
            ['id' => 11713, 'name' => 'Anduril'],
            ['id' => 11714, 'name' => 'Eludain'],
            ['id' => 11715, 'name' => 'Drogan'],

            ['id' => 118, 'name' => 'Sylph'],
            ['id' => 11811, 'name' => 'Tyron'],
            ['id' => 11812, 'name' => 'Baretta'],
            ['id' => 11813, 'name' => 'Shimitae'],
            ['id' => 11814, 'name' => 'Eredas'],
            ['id' => 11815, 'name' => 'Aschubel'],

            ['id' => 119, 'name' => 'Sylphid'],
            ['id' => 11911, 'name' => 'Lumirecia'],
            ['id' => 11912, 'name' => 'Fria'],
            ['id' => 11913, 'name' => 'Acasis'],
            ['id' => 11914, 'name' => 'Mihael'],
            ['id' => 11915, 'name' => 'Icares'],

            ['id' => 120, 'name' => 'High Elemental'],
            ['id' => 12011, 'name' => 'Ellena'],
            ['id' => 12012, 'name' => 'Kahli'],
            ['id' => 12013, 'name' => 'Moria'],
            ['id' => 12014, 'name' => 'Shren'],
            ['id' => 12015, 'name' => 'Jumaline'],

            ['id' => 121, 'name' => 'Harpu'],
            ['id' => 12111, 'name' => 'Sisroo'],
            ['id' => 12112, 'name' => 'Colleen'],
            ['id' => 12113, 'name' => 'Seal'],
            ['id' => 12114, 'name' => 'Sia'],
            ['id' => 12115, 'name' => 'Seren'],

            ['id' => 122, 'name' => 'Slime'],
            ['id' => 12211, 'name' => ''],
            ['id' => 12212, 'name' => ''],
            ['id' => 12213, 'name' => ''],
            ['id' => 12214, 'name' => ''],
            ['id' => 12215, 'name' => ''],

            ['id' => 123, 'name' => 'Forest Keeper'],
            ['id' => 12311, 'name' => ''],
            ['id' => 12312, 'name' => ''],
            ['id' => 12313, 'name' => ''],
            ['id' => 12314, 'name' => ''],
            ['id' => 12315, 'name' => ''],

            ['id' => 124, 'name' => 'Mushroom'],
            ['id' => 12411, 'name' => ''],
            ['id' => 12412, 'name' => ''],
            ['id' => 12413, 'name' => ''],
            ['id' => 12414, 'name' => ''],
            ['id' => 12415, 'name' => ''],

            ['id' => 125, 'name' => 'Maned Boar'],
            ['id' => 12511, 'name' => ''],
            ['id' => 12512, 'name' => ''],
            ['id' => 12513, 'name' => ''],
            ['id' => 12514, 'name' => ''],
            ['id' => 12515, 'name' => ''],

            ['id' => 126, 'name' => 'Monster Flower'],
            ['id' => 12611, 'name' => ''],
            ['id' => 12612, 'name' => ''],
            ['id' => 12613, 'name' => ''],
            ['id' => 12614, 'name' => ''],
            ['id' => 12615, 'name' => ''],

            ['id' => 127, 'name' => 'Ghost'],
            ['id' => 12711, 'name' => ''],
            ['id' => 12712, 'name' => ''],
            ['id' => 12713, 'name' => ''],
            ['id' => 12714, 'name' => ''],
            ['id' => 12715, 'name' => ''],

            ['id' => 128, 'name' => 'Low Elemental'],
            ['id' => 12811, 'name' => 'Tigresse'],
            ['id' => 12812, 'name' => 'Lamor'],
            ['id' => 12813, 'name' => 'Samour'],
            ['id' => 12814, 'name' => 'Varis'],
            ['id' => 12815, 'name' => 'Havana'],

            ['id' => 129, 'name' => 'Mimick'],
            ['id' => 12911, 'name' => ''],
            ['id' => 12912, 'name' => ''],
            ['id' => 12913, 'name' => ''],
            ['id' => 12914, 'name' => ''],
            ['id' => 12915, 'name' => ''],

            ['id' => 130, 'name' => 'Horned Frog'],
            ['id' => 13011, 'name' => ''],
            ['id' => 13012, 'name' => ''],
            ['id' => 13013, 'name' => ''],
            ['id' => 13014, 'name' => ''],
            ['id' => 13015, 'name' => ''],

            ['id' => 131, 'name' => 'Sandman'],
            ['id' => 13111, 'name' => ''],
            ['id' => 13112, 'name' => ''],
            ['id' => 13113, 'name' => ''],
            ['id' => 13114, 'name' => ''],
            ['id' => 13115, 'name' => ''],

            ['id' => 132, 'name' => 'Howl'],
            ['id' => 13211, 'name' => 'Lulu'],
            ['id' => 13212, 'name' => 'Lala'],
            ['id' => 13213, 'name' => 'Chichi'],
            ['id' => 13214, 'name' => 'Shushu'],
            ['id' => 13215, 'name' => 'Chacha'],

            ['id' => 133, 'name' => 'Succubus'],
            ['id' => 13311, 'name' => 'Izaria'],
            ['id' => 13312, 'name' => 'Akia'],
            ['id' => 13313, 'name' => 'Selena'],
            ['id' => 13314, 'name' => 'Aria'],
            ['id' => 13315, 'name' => 'Isael'],

            ['id' => 134, 'name' => 'Joker'],
            ['id' => 13411, 'name' => 'Sian'],
            ['id' => 13412, 'name' => 'Jojo'],
            ['id' => 13413, 'name' => 'Lushen'],
            ['id' => 13414, 'name' => 'Figaro'],
            ['id' => 13415, 'name' => 'Liebli'],

            ['id' => 135, 'name' => 'Ninja'],
            ['id' => 13511, 'name' => 'Susano'],
            ['id' => 13512, 'name' => 'Garo'],
            ['id' => 13513, 'name' => 'Orochi'],
            ['id' => 13514, 'name' => 'Gin'],
            ['id' => 13515, 'name' => 'Han'],

            ['id' => 136, 'name' => 'Surprise Box'],
            ['id' => 13611, 'name' => ''],
            ['id' => 13612, 'name' => ''],
            ['id' => 13613, 'name' => ''],
            ['id' => 13614, 'name' => ''],
            ['id' => 13615, 'name' => ''],

            ['id' => 137, 'name' => 'Bearman'],
            ['id' => 13711, 'name' => 'Gruda'],
            ['id' => 13712, 'name' => 'Kungen'],
            ['id' => 13713, 'name' => 'Dagorr'],
            ['id' => 13714, 'name' => 'Ahman'],
            ['id' => 13715, 'name' => 'Haken'],

            ['id' => 138, 'name' => 'Valkyrja'],
            ['id' => 13811, 'name' => 'Camilla'],
            ['id' => 13812, 'name' => 'Vanessa'],
            ['id' => 13813, 'name' => 'Katarina'],
            ['id' => 13814, 'name' => 'Akroma'],
            ['id' => 13815, 'name' => 'Trinity'],

            ['id' => 139, 'name' => 'Pierret'],
            ['id' => 13911, 'name' => 'Julie'],
            ['id' => 13912, 'name' => 'Clara'],
            ['id' => 13913, 'name' => 'Sophia'],
            ['id' => 13914, 'name' => 'Eva'],
            ['id' => 13915, 'name' => 'Luna'],

            ['id' => 140, 'name' => 'Werewolf'],
            ['id' => 14011, 'name' => 'Vigor'],
            ['id' => 14012, 'name' => 'Garoche'],
            ['id' => 14013, 'name' => 'Shakan'],
            ['id' => 14014, 'name' => 'Eshir'],
            ['id' => 14015, 'name' => 'Jultan'],

            ['id' => 141, 'name' => 'Phantom Thief'],
            ['id' => 14111, 'name' => 'Luer'],
            ['id' => 14112, 'name' => 'Jean'],
            ['id' => 14113, 'name' => 'Julien'],
            ['id' => 14114, 'name' => 'Louis'],
            ['id' => 14115, 'name' => 'Guillaume'],

            ['id' => 142, 'name' => 'Angelmon'],
            ['id' => 14211, 'name' => 'Blue Angelmon'],
            ['id' => 14212, 'name' => 'Red Angelmon'],
            ['id' => 14213, 'name' => 'Gold Angelmon'],
            ['id' => 14214, 'name' => 'White Angelmon'],
            ['id' => 14215, 'name' => 'Dark Angelmon'],

            ['id' => 144, 'name' => 'Dragon'],
            ['id' => 14411, 'name' => 'Verad'],
            ['id' => 14412, 'name' => 'Zaiross'],
            ['id' => 14413, 'name' => 'Jamire'],
            ['id' => 14414, 'name' => 'Zerath'],
            ['id' => 14415, 'name' => 'Grogen'],

            ['id' => 145, 'name' => 'Phoenix'],
            ['id' => 14511, 'name' => 'Sigmarus'],
            ['id' => 14512, 'name' => 'Perna'],
            ['id' => 14513, 'name' => 'Teshar'],
            ['id' => 14514, 'name' => 'Eludia'],
            ['id' => 14515, 'name' => 'Jaara'],

            ['id' => 146, 'name' => 'Chimera'],
            ['id' => 14611, 'name' => 'Taor'],
            ['id' => 14612, 'name' => 'Rakan'],
            ['id' => 14613, 'name' => 'Lagmaron'],
            ['id' => 14614, 'name' => 'Shan'],
            ['id' => 14615, 'name' => 'Zeratu'],

            ['id' => 147, 'name' => 'Vampire'],
            ['id' => 14711, 'name' => 'Liesel'],
            ['id' => 14712, 'name' => 'Verdehile'],
            ['id' => 14713, 'name' => 'Argen'],
            ['id' => 14714, 'name' => 'Julianne'],
            ['id' => 14715, 'name' => 'Cadiz'],

            ['id' => 148, 'name' => 'Viking'],
            ['id' => 14811, 'name' => 'Huga'],
            ['id' => 14812, 'name' => 'Geoffrey'],
            ['id' => 14813, 'name' => 'Walter'],
            ['id' => 14814, 'name' => 'Jansson'],
            ['id' => 14815, 'name' => 'Janssen'],

            ['id' => 149, 'name' => 'Amazon'],
            ['id' => 14911, 'name' => 'Ellin'],
            ['id' => 14912, 'name' => 'Ceres'],
            ['id' => 14913, 'name' => 'Hina'],
            ['id' => 14914, 'name' => 'Lyn'],
            ['id' => 14915, 'name' => 'Mara'],

            ['id' => 150, 'name' => 'Martial Cat'],
            ['id' => 15011, 'name' => 'Mina'],
            ['id' => 15012, 'name' => 'Mei'],
            ['id' => 15013, 'name' => 'Naomi'],
            ['id' => 15014, 'name' => 'Xiao Ling'],
            ['id' => 15015, 'name' => 'Miho'],

            ['id' => 152, 'name' => 'Vagabond'],
            ['id' => 15211, 'name' => 'Allen'],
            ['id' => 15212, 'name' => "Kai'en"],
            ['id' => 15213, 'name' => 'Roid'],
            ['id' => 15214, 'name' => 'Darion'],
            ['id' => 15215, 'name' => 'Jubelle'],

            ['id' => 153, 'name' => 'Epikion Priest'],
            ['id' => 15311, 'name' => 'Rina'],
            ['id' => 15312, 'name' => 'Chloe'],
            ['id' => 15313, 'name' => 'Michelle'],
            ['id' => 15314, 'name' => 'Iona'],
            ['id' => 15315, 'name' => 'Rasheed'],

            ['id' => 154, 'name' => 'Magical Archer'],
            ['id' => 15411, 'name' => 'Sharron'],
            ['id' => 15412, 'name' => 'Cassandra'],
            ['id' => 15413, 'name' => 'Ardella'],
            ['id' => 15414, 'name' => 'Chris'],
            ['id' => 15415, 'name' => 'Bethony'],

            ['id' => 155, 'name' => 'Rakshasa'],
            ['id' => 15511, 'name' => 'Su'],
            ['id' => 15512, 'name' => 'Hwa'],
            ['id' => 15513, 'name' => 'Yen'],
            ['id' => 15514, 'name' => 'Pang'],
            ['id' => 15515, 'name' => 'Ran'],

            ['id' => 156, 'name' => 'Bounty Hunter'],
            ['id' => 15611, 'name' => 'Wayne'],
            ['id' => 15612, 'name' => 'Randy'],
            ['id' => 15613, 'name' => 'Roger'],
            ['id' => 15614, 'name' => 'Walkers'],
            ['id' => 15615, 'name' => 'Jamie'],

            ['id' => 157, 'name' => 'Oracle'],
            ['id' => 15711, 'name' => 'Praha'],
            ['id' => 15712, 'name' => 'Juno'],
            ['id' => 15713, 'name' => 'Seara'],
            ['id' => 15714, 'name' => 'Laima'],
            ['id' => 15715, 'name' => 'Giana'],

            ['id' => 158, 'name' => 'Imp Champion'],
            ['id' => 15811, 'name' => 'Yaku'],
            ['id' => 15812, 'name' => 'Fairo'],
            ['id' => 15813, 'name' => 'Pigma'],
            ['id' => 15814, 'name' => 'Shaffron'],
            ['id' => 15815, 'name' => 'Loque'],

            ['id' => 159, 'name' => 'Mystic Witch'],
            ['id' => 15911, 'name' => 'Megan'],
            ['id' => 15912, 'name' => 'Rebecca'],
            ['id' => 15913, 'name' => 'Silia'],
            ['id' => 15914, 'name' => 'Linda'],
            ['id' => 15915, 'name' => 'Gina'],

            ['id' => 160, 'name' => 'Grim Reaper'],
            ['id' => 16011, 'name' => 'Hemos'],
            ['id' => 16012, 'name' => 'Sath'],
            ['id' => 16013, 'name' => 'Hiva'],
            ['id' => 16014, 'name' => 'Prom'],
            ['id' => 16015, 'name' => 'Thrain'],

            ['id' => 161, 'name' => 'Occult Girl'],
            ['id' => 16111, 'name' => 'Anavel'],
            ['id' => 16112, 'name' => 'Rica'],
            ['id' => 16113, 'name' => 'Charlotte'],
            ['id' => 16114, 'name' => 'Lora'],
            ['id' => 16115, 'name' => 'Nicki'],

            ['id' => 162, 'name' => 'Death Knight'],
            ['id' => 16211, 'name' => 'Fedora'],
            ['id' => 16212, 'name' => 'Arnold'],
            ['id' => 16213, 'name' => 'Briand'],
            ['id' => 16214, 'name' => 'Conrad'],
            ['id' => 16215, 'name' => 'Dias'],

            ['id' => 163, 'name' => 'Lich'],
            ['id' => 16311, 'name' => 'Rigel'],
            ['id' => 16312, 'name' => 'Antares'],
            ['id' => 16313, 'name' => 'Fuco'],
            ['id' => 16314, 'name' => 'Halphas'],
            ['id' => 16315, 'name' => 'Grego'],

            ['id' => 164, 'name' => 'Skull Soldier'],
            ['id' => 16411, 'name' => ''],
            ['id' => 16412, 'name' => ''],
            ['id' => 16413, 'name' => ''],
            ['id' => 16414, 'name' => ''],
            ['id' => 16415, 'name' => ''],

            ['id' => 165, 'name' => 'Living Armor'],
            ['id' => 16511, 'name' => 'Nickel'],
            ['id' => 16512, 'name' => 'Iron'],
            ['id' => 16513, 'name' => 'Copper'],
            ['id' => 16514, 'name' => 'Silver'],
            ['id' => 16515, 'name' => 'Zinc'],

            ['id' => 166, 'name' => 'Dragon Knight'],
            ['id' => 16611, 'name' => 'Chow'],
            ['id' => 16612, 'name' => 'Laika'],
            ['id' => 16613, 'name' => 'Leo'],
            ['id' => 16614, 'name' => 'Jager'],
            ['id' => 16615, 'name' => 'Ragdoll'],

            ['id' => 167, 'name' => 'Magical Archer Promo'],
            ['id' => 16711, 'name' => ''],
            ['id' => 16712, 'name' => ''],
            ['id' => 16713, 'name' => ''],
            ['id' => 16714, 'name' => 'Fami'],
            ['id' => 16715, 'name' => ''],

            ['id' => 168, 'name' => 'Monkey King'],
            ['id' => 16811, 'name' => 'Shi Hou'],
            ['id' => 16812, 'name' => 'Mei Hou Wang'],
            ['id' => 16813, 'name' => 'Xing Zhe'],
            ['id' => 16814, 'name' => 'Qitian Dasheng'],
            ['id' => 16815, 'name' => 'Son Zhang Lao'],

            ['id' => 169, 'name' => 'Samurai'],
            ['id' => 16911, 'name' => 'Kaz'],
            ['id' => 16912, 'name' => 'Jun'],
            ['id' => 16913, 'name' => 'Kaito'],
            ['id' => 16914, 'name' => 'Tosi'],
            ['id' => 16915, 'name' => 'Sige'],

            ['id' => 170, 'name' => 'Archangel'],
            ['id' => 17011, 'name' => 'Ariel'],
            ['id' => 17012, 'name' => 'Velajuel'],
            ['id' => 17013, 'name' => 'Eladriel'],
            ['id' => 17014, 'name' => 'Artamiel'],
            ['id' => 17015, 'name' => 'Fermion'],

            ['id' => 172, 'name' => 'Drunken Master'],
            ['id' => 17211, 'name' => 'Mao'],
            ['id' => 17212, 'name' => 'Xiao Chun'],
            ['id' => 17213, 'name' => 'Huan'],
            ['id' => 17214, 'name' => 'Tien Qin'],
            ['id' => 17215, 'name' => 'Wei Shin'],

            ['id' => 173, 'name' => 'Kung Fu Girl'],
            ['id' => 17311, 'name' => 'Xiao Lin'],
            ['id' => 17312, 'name' => 'Hong Hua'],
            ['id' => 17313, 'name' => 'Ling Ling'],
            ['id' => 17314, 'name' => 'Liu Mei'],
            ['id' => 17315, 'name' => 'Fei'],

            ['id' => 174, 'name' => 'Beast Monk'],
            ['id' => 17411, 'name' => 'Chandra'],
            ['id' => 17412, 'name' => 'Kumar'],
            ['id' => 17413, 'name' => 'Ritesh'],
            ['id' => 17414, 'name' => 'Shazam'],
            ['id' => 17415, 'name' => 'Rahul'],

            ['id' => 175, 'name' => 'Mischievous Bat'],
            ['id' => 17511, 'name' => ''],
            ['id' => 17512, 'name' => ''],
            ['id' => 17513, 'name' => ''],
            ['id' => 17514, 'name' => ''],
            ['id' => 17515, 'name' => ''],

            ['id' => 176, 'name' => 'Battle Scorpion'],
            ['id' => 17611, 'name' => ''],
            ['id' => 17612, 'name' => ''],
            ['id' => 17613, 'name' => ''],
            ['id' => 17614, 'name' => ''],
            ['id' => 17615, 'name' => ''],

            ['id' => 177, 'name' => 'Minotauros'],
            ['id' => 17711, 'name' => 'Urtau'],
            ['id' => 17712, 'name' => 'Burentau'],
            ['id' => 17713, 'name' => 'Eintau'],
            ['id' => 17714, 'name' => 'Grotau'],
            ['id' => 17715, 'name' => 'Kamatau'],

            ['id' => 178, 'name' => 'Lizardman'],
            ['id' => 17811, 'name' => 'Kernodon'],
            ['id' => 17812, 'name' => 'Igmanodon'],
            ['id' => 17813, 'name' => 'Velfinodon'],
            ['id' => 17814, 'name' => 'Glinodon'],
            ['id' => 17815, 'name' => 'Devinodon'],

            ['id' => 179, 'name' => 'Hell Lady'],
            ['id' => 17911, 'name' => 'Beth'],
            ['id' => 17912, 'name' => 'Raki'],
            ['id' => 17913, 'name' => 'Ethna'],
            ['id' => 17914, 'name' => 'Asima'],
            ['id' => 17915, 'name' => 'Craka'],

            ['id' => 180, 'name' => 'Brownie Magician'],
            ['id' => 18011, 'name' => 'Orion'],
            ['id' => 18012, 'name' => 'Draco'],
            ['id' => 18013, 'name' => 'Aquila'],
            ['id' => 18014, 'name' => 'Gemini'],
            ['id' => 18015, 'name' => 'Korona'],

            ['id' => 181, 'name' => 'Kobold Bomber'],
            ['id' => 18111, 'name' => 'Malaka'],
            ['id' => 18112, 'name' => 'Zibrolta'],
            ['id' => 18113, 'name' => 'Taurus'],
            ['id' => 18114, 'name' => 'Dover'],
            ['id' => 18115, 'name' => 'Bering'],

            ['id' => 182, 'name' => 'King Angelmon'],
            ['id' => 18211, 'name' => 'Blue King Angelmon'],
            ['id' => 18212, 'name' => 'Red King Angelmon'],
            ['id' => 18213, 'name' => 'Gold King Angelmon'],
            ['id' => 18214, 'name' => 'White King Angelmon'],
            ['id' => 18215, 'name' => 'Dark King Angelmon'],

            ['id' => 183, 'name' => 'Sky Dancer'],
            ['id' => 18311, 'name' => 'Mihyang'],
            ['id' => 18312, 'name' => 'Hwahee'],
            ['id' => 18313, 'name' => 'Chasun'],
            ['id' => 18314, 'name' => 'Yeonhong'],
            ['id' => 18315, 'name' => 'Wolyung'],

            ['id' => 184, 'name' => 'Taoist'],
            ['id' => 18411, 'name' => 'Gildong'],
            ['id' => 18412, 'name' => 'Gunpyeong'],
            ['id' => 18413, 'name' => 'Woochi'],
            ['id' => 18414, 'name' => 'Hwadam'],
            ['id' => 18415, 'name' => 'Woonhak'],

            ['id' => 185, 'name' => 'Beast Hunter'],
            ['id' => 18511, 'name' => 'Gangchun'],
            ['id' => 18512, 'name' => 'Nangrim'],
            ['id' => 18513, 'name' => 'Suri'],
            ['id' => 18514, 'name' => 'Baekdu'],
            ['id' => 18515, 'name' => 'Hannam'],

            ['id' => 186, 'name' => 'Pioneer'],
            ['id' => 18611, 'name' => 'Woosa'],
            ['id' => 18612, 'name' => 'Chiwu'],
            ['id' => 18613, 'name' => 'Pungbaek'],
            ['id' => 18614, 'name' => 'Nigong'],
            ['id' => 18615, 'name' => 'Woonsa'],

            ['id' => 187, 'name' => 'Penguin Knight'],
            ['id' => 18711, 'name' => 'Toma'],
            ['id' => 18712, 'name' => 'Naki'],
            ['id' => 18713, 'name' => 'Mav'],
            ['id' => 18714, 'name' => 'Dona'],
            ['id' => 18715, 'name' => 'Kuna'],

            ['id' => 188, 'name' => 'Barbaric King'],
            ['id' => 18811, 'name' => 'Aegir'],
            ['id' => 18812, 'name' => 'Surtr'],
            ['id' => 18813, 'name' => 'Hraesvelg'],
            ['id' => 18814, 'name' => 'Mimirr'],
            ['id' => 18815, 'name' => 'Hrungnir'],

            ['id' => 189, 'name' => 'Polar Queen'],
            ['id' => 18911, 'name' => 'Alicia'],
            ['id' => 18912, 'name' => 'Brandia'],
            ['id' => 18913, 'name' => 'Tiana'],
            ['id' => 18914, 'name' => 'Elenoa'],
            ['id' => 18915, 'name' => 'Lydia'],

            ['id' => 190, 'name' => 'Battle Mammoth'],
            ['id' => 19011, 'name' => 'Talc'],
            ['id' => 19012, 'name' => 'Granite'],
            ['id' => 19013, 'name' => 'Olivine'],
            ['id' => 19014, 'name' => 'Marble'],
            ['id' => 19015, 'name' => 'Basalt'],

            ['id' => 191, 'name' => 'Fairy Queen'],
            ['id' => 19111, 'name' => ''],
            ['id' => 19112, 'name' => ''],
            ['id' => 19113, 'name' => ''],
            ['id' => 19114, 'name' => 'Fran'],
            ['id' => 19115, 'name' => ''],

            ['id' => 192, 'name' => 'Ifrit'],
            ['id' => 19211, 'name' => 'Theomars'],
            ['id' => 19212, 'name' => 'Tesarion'],
            ['id' => 19213, 'name' => 'Akhamamir'],
            ['id' => 19214, 'name' => 'Elsharion'],
            ['id' => 19215, 'name' => 'Veromos'],

            ['id' => 193, 'name' => 'Cow Girl'],
            ['id' => 19311, 'name' => 'Sera'],
            ['id' => 19312, 'name' => 'Anne'],
            ['id' => 19313, 'name' => 'Hannah'],
            ['id' => 19314, 'name' => 'Loren'],
            ['id' => 19315, 'name' => 'Cassie'],

            ['id' => 194, 'name' => 'Pirate Captain'],
            ['id' => 19411, 'name' => 'Galleon'],
            ['id' => 19412, 'name' => 'Carrack'],
            ['id' => 19413, 'name' => 'Barque'],
            ['id' => 19414, 'name' => 'Brig'],
            ['id' => 19415, 'name' => 'Frigate'],

            ['id' => 195, 'name' => 'Charger Shark'],
            ['id' => 19511, 'name' => 'Aqcus'],
            ['id' => 19512, 'name' => 'Ignicus'],
            ['id' => 19513, 'name' => 'Zephicus'],
            ['id' => 19514, 'name' => 'Rumicus'],
            ['id' => 19515, 'name' => 'Calicus'],

            ['id' => 196, 'name' => 'Mermaid'],
            ['id' => 19611, 'name' => 'Tetra'],
            ['id' => 19612, 'name' => 'Platy'],
            ['id' => 19613, 'name' => 'Cichlid'],
            ['id' => 19614, 'name' => 'Molly'],
            ['id' => 19615, 'name' => 'Betta'],

            ['id' => 197, 'name' => 'Sea Emperor'],
            ['id' => 19711, 'name' => 'Poseidon'],
            ['id' => 19712, 'name' => 'Okeanos'],
            ['id' => 19713, 'name' => 'Triton'],
            ['id' => 19714, 'name' => 'Pontos'],
            ['id' => 19715, 'name' => 'Manannan'],

            ['id' => 198, 'name' => 'Magic Knight'],
            ['id' => 19811, 'name' => 'Lapis'],
            ['id' => 19812, 'name' => 'Astar'],
            ['id' => 19813, 'name' => 'Lupinus'],
            ['id' => 19814, 'name' => 'Iris'],
            ['id' => 19815, 'name' => 'Lanett'],

            ['id' => 199, 'name' => 'Assassin'],
            ['id' => 19911, 'name' => 'Stella'],
            ['id' => 19912, 'name' => 'Lexy'],
            ['id' => 19913, 'name' => 'Tanya'],
            ['id' => 19914, 'name' => 'Natalie'],
            ['id' => 19915, 'name' => 'Isabelle'],

            ['id' => 200, 'name' => 'Neostone Fighter'],
            ['id' => 20011, 'name' => 'Ryan'],
            ['id' => 20012, 'name' => 'Trevor'],
            ['id' => 20013, 'name' => 'Logan'],
            ['id' => 20014, 'name' => 'Lucas'],
            ['id' => 20015, 'name' => 'Karl'],

            ['id' => 201, 'name' => 'Neostone Agent'],
            ['id' => 20111, 'name' => 'Emma'],
            ['id' => 20112, 'name' => 'Lisa'],
            ['id' => 20113, 'name' => 'Olivia'],
            ['id' => 20114, 'name' => 'Illiana'],
            ['id' => 20115, 'name' => 'Sylvia'],

            ['id' => 202, 'name' => 'Martial Artist'],
            ['id' => 20211, 'name' => 'Luan'],
            ['id' => 20212, 'name' => 'Sin'],
            ['id' => 20213, 'name' => 'Lo'],
            ['id' => 20214, 'name' => 'Hiro'],
            ['id' => 20215, 'name' => 'Jackie'],

            ['id' => 203, 'name' => 'Mummy'],
            ['id' => 20311, 'name' => 'Nubia'],
            ['id' => 20312, 'name' => 'Sonora'],
            ['id' => 20313, 'name' => 'Namib'],
            ['id' => 20314, 'name' => 'Sahara'],
            ['id' => 20315, 'name' => 'Karakum'],

            ['id' => 204, 'name' => 'Anubis'],
            ['id' => 20411, 'name' => 'Avaris'],
            ['id' => 20412, 'name' => 'Khmun'],
            ['id' => 20413, 'name' => 'Iunu'],
            ['id' => 20414, 'name' => 'Amarna'],
            ['id' => 20415, 'name' => 'Thebae'],

            ['id' => 205, 'name' => 'Desert Queen'],
            ['id' => 20511, 'name' => 'Bastet'],
            ['id' => 20512, 'name' => 'Sekhmet'],
            ['id' => 20513, 'name' => 'Hathor'],
            ['id' => 20514, 'name' => 'Isis'],
            ['id' => 20515, 'name' => 'Nephthys'],

            ['id' => 206, 'name' => 'Horus'],
            ['id' => 20611, 'name' => 'Qebehsenuef'],
            ['id' => 20612, 'name' => 'Duamutef'],
            ['id' => 20613, 'name' => 'Imesety'],
            ['id' => 20614, 'name' => 'Wedjat'],
            ['id' => 20615, 'name' => 'Amduat'],

            ['id' => 207, 'name' => "Jack-o'-lantern"],
            ['id' => 20711, 'name' => 'Chilling'],
            ['id' => 20712, 'name' => 'Smokey'],
            ['id' => 20713, 'name' => 'Windy'],
            ['id' => 20714, 'name' => 'Misty'],
            ['id' => 20715, 'name' => 'Dusky'],

            ['id' => 208, 'name' => 'Frankenstein'],
            ['id' => 20811, 'name' => 'Tractor'],
            ['id' => 20812, 'name' => 'Bulldozer'],
            ['id' => 20813, 'name' => 'Crane'],
            ['id' => 20814, 'name' => 'Driller'],
            ['id' => 20815, 'name' => 'Crawler'],

            ['id' => 209, 'name' => 'Elven Ranger'],
            ['id' => 20911, 'name' => 'Eluin'],
            ['id' => 20912, 'name' => 'Adrian'],
            ['id' => 20913, 'name' => 'Erwin'],
            ['id' => 20914, 'name' => 'Lucien'],
            ['id' => 20915, 'name' => 'Isillen'],

            ['id' => 210, 'name' => 'Harg'],
            ['id' => 21011, 'name' => 'Remy'],
            ['id' => 21012, 'name' => 'Racuni'],
            ['id' => 21013, 'name' => 'Raviti'],
            ['id' => 21014, 'name' => 'Dova'],
            ['id' => 21015, 'name' => 'Kroa'],

            ['id' => 211, 'name' => 'Fairy King'],
            ['id' => 21111, 'name' => 'Psamathe'],
            ['id' => 21112, 'name' => 'Daphnis'],
            ['id' => 21113, 'name' => 'Ganymede'],
            ['id' => 21114, 'name' => 'Oberon'],
            ['id' => 21115, 'name' => 'Nyx'],

            ['id' => 212, 'name' => 'Panda Warrior'],
            ['id' => 21211, 'name' => 'Mo Long'],
            ['id' => 21212, 'name' => 'Xiong Fei'],
            ['id' => 21213, 'name' => 'Feng Yan'],
            ['id' => 21214, 'name' => 'Tian Lang'],
            ['id' => 21215, 'name' => 'Mi Ying'],

            ['id' => 213, 'name' => 'Dice Magician'],
            ['id' => 21311, 'name' => 'Reno'],
            ['id' => 21312, 'name' => 'Ludo'],
            ['id' => 21313, 'name' => 'Morris'],
            ['id' => 21314, 'name' => 'Tablo'],
            ['id' => 21315, 'name' => 'Monte'],

            ['id' => 214, 'name' => 'Harp Magician'],
            ['id' => 21411, 'name' => 'Sonnet'],
            ['id' => 21412, 'name' => 'Harmonia'],
            ['id' => 21413, 'name' => 'Triana'],
            ['id' => 21414, 'name' => 'Celia'],
            ['id' => 21415, 'name' => 'Vivachel'],

            ['id' => 215, 'name' => 'Unicorn'],
            ['id' => 21511, 'name' => 'Amelia'],
            ['id' => 21512, 'name' => 'Helena'],
            ['id' => 21513, 'name' => 'Diana'],
            ['id' => 21514, 'name' => 'Eleanor'],
            ['id' => 21515, 'name' => 'Alexandra'],
            ['id' => 21611, 'name' => 'Amelia'],
            ['id' => 21612, 'name' => 'Helena'],
            ['id' => 21613, 'name' => 'Diana'],
            ['id' => 21614, 'name' => 'Eleanor'],
            ['id' => 21615, 'name' => 'Alexandra'],

            ['id' => 218, 'name' => 'Paladin'],
            ['id' => 21811, 'name' => 'Josephine'],
            ['id' => 21812, 'name' => 'Ophilia'],
            ['id' => 21813, 'name' => 'Louise'],
            ['id' => 21814, 'name' => 'Jeanne'],
            ['id' => 21815, 'name' => 'Leona'],

            ['id' => 219, 'name' => 'Chakram Dancer'],
            ['id' => 21911, 'name' => 'Talia'],
            ['id' => 21912, 'name' => 'Shaina'],
            ['id' => 21913, 'name' => 'Melissa'],
            ['id' => 21914, 'name' => 'Deva'],
            ['id' => 21915, 'name' => 'Belita'],

            ['id' => 220, 'name' => 'Boomerang Warrior'],
            ['id' => 22011, 'name' => 'Sabrina'],
            ['id' => 22012, 'name' => 'Maruna'],
            ['id' => 22013, 'name' => 'Zenobia'],
            ['id' => 22014, 'name' => 'Bailey'],
            ['id' => 22015, 'name' => 'Martina'],

            ['id' => 221, 'name' => 'Dryad'],
            ['id' => 22111, 'name' => 'Herne'],
            ['id' => 22112, 'name' => 'Nisha'],
            ['id' => 22113, 'name' => 'Mellia'],
            ['id' => 22114, 'name' => 'Felleria'],
            ['id' => 22115, 'name' => 'Hyanes'],

            ['id' => 222, 'name' => 'Druid'],
            ['id' => 22211, 'name' => 'Abellio'],
            ['id' => 22212, 'name' => 'Bellenus'],
            ['id' => 22213, 'name' => 'Taranys'],
            ['id' => 22214, 'name' => 'Valantis'],
            ['id' => 22215, 'name' => 'Pater'],
            ['id' => 22311, 'name' => 'Abellio'],
            ['id' => 22312, 'name' => 'Bellenus'],
            ['id' => 22313, 'name' => 'Taranys'],
            ['id' => 22314, 'name' => 'Valantis'],
            ['id' => 22315, 'name' => 'Pater'],

            ['id' => 224, 'name' => 'Giant Warrior'],
            ['id' => 22411, 'name' => 'Bagir'],
            ['id' => 22412, 'name' => 'Vidurr'],
            ['id' => 22413, 'name' => 'Skogul'],
            ['id' => 22414, 'name' => 'Einheri'],
            ['id' => 22415, 'name' => 'Trasar'],
            ['id' => 22513, 'name' => 'Skogul'],
            ['id' => 22515, 'name' => 'Trasar'],

            ['id' => 226, 'name' => 'Lightning Emperor'],
            ['id' => 22611, 'name' => 'Bolverk'],
            ['id' => 22612, 'name' => 'Baleygr'],
            ['id' => 22613, 'name' => 'Odin'],
            ['id' => 22614, 'name' => 'Geldnir'],
            ['id' => 22615, 'name' => 'Herteit'],

            ['id' => 227, 'name' => 'Sniper Mk.I'],
            ['id' => 22711, 'name' => 'Covenant'],
            ['id' => 22712, 'name' => 'Carcano'],
            ['id' => 22713, 'name' => 'Carbine'],
            ['id' => 22714, 'name' => 'Magnum'],
            ['id' => 22715, 'name' => 'Dragunov'],
            ['id' => 228, 'name' => 'Sniper Mk.I'],
            ['id' => 22812, 'name' => 'Carcano'],
            ['id' => 22813, 'name' => 'Carbine'],
            ['id' => 22815, 'name' => 'Dragunov'],

            ['id' => 229, 'name' => 'Cannon Girl'],
            ['id' => 22911, 'name' => 'Abigail'],
            ['id' => 22912, 'name' => 'Scarlett'],
            ['id' => 22913, 'name' => 'Christina'],
            ['id' => 22914, 'name' => 'Emily'],
            ['id' => 22915, 'name' => 'Bella'],

            ['id' => 15105, 'name' => 'Devilmon'],
            ['id' => 14314, 'name' => 'Rainbowmon'],

            ['id' => 1000111, 'name' => 'Homunculus - Attack (Water)'],
            ['id' => 1000112, 'name' => 'Homunculus - Attack (Fire)'],
            ['id' => 1000113, 'name' => 'Homunculus - Attack (Wind)'],

            ['id' => 1000214, 'name' => 'Homunculus - Support (Light)'],
            ['id' => 1000215, 'name' => 'Homunculus - Support (Dark)'],
        ];
    }
}
