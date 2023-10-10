<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('posts')->delete();

        \DB::table('posts')->insert(array (
            0 =>
            array (
                'id' => 2,
                'titulo' => 'Restaurante Bom Almoço',
                'descricao_breve' => 'Desvende os mistérios culinários que tornam o "Restaurante Bom Almoço" uma experiência inesquecível!',
                'descricao_1' => '<p style="font-size: 18px; text-align: justify;"><em>Abra o apetite para uma jornada gastronômica como nenhuma outra!</em><br><br> Imagine-se caminhando por uma pitoresca rua de paralelepípedos, quando, de repente, os aromas deliciosos vindos de um lugar especial capturam a sua atenção.Você segue o irresistível aroma que parece conduzi-lo por uma viagem através do tempo e das culturas, até chegar ao "Restaurante Bom Almoço".<br><br> Com um ambiente acolhedor e charmoso, este local encantador oferece mais do que apenas comida excepcional - aqui, você é recebido com calorosas boas-vindas e um toque de tradição familiar que envolve cada detalhe.<br><br> cardápio, meticulosamente elaborado, é uma verdadeira ode à diversidade culinária. Desde clássicos reinventados até sabores exóticos que surpreenderão seu paladar, cada prato é uma obra-prima cuidadosamente preparada pela talentosa equipe de chefs.<br><br> Mas o que torna o "Restaurante Bom Almoço" tão especial além de sua comida deliciosa? A resposta está na paixão e dedicação de sua equipe em proporcionar uma experiência inesquecível a cada cliente. Cada prato conta uma história de sabores, resgatando tradições antigas e unindo culturas ao redor da mesa.<br><br>As opções de almoço são variadas, desde opções saudáveis e leves para aqueles que buscam uma refeição rápida, até banquetes completos para os que desejam explorar a riqueza de sabores em cada garfada. Seja você um amante da gastronomia ou um viajante curioso, o "Restaurante Bom Almoço" é o lugar ideal para satisfazer todos os gostos.</p>',
                'descricao_2' => '<p style="font-size: 18px; text-align: justify;">Além disso, o atendimento atencioso e cortês fará você se sentir como parte da família. Os sorrisos genuínos e a dedicação em agradar criam uma atmosfera acolhedora que o convida a voltar sempre que quiser desfrutar de um momento especial.<br><br>Se você busca mais do que uma simples refeição, mas sim uma experiência gastronômica envolvente, venha ao "Restaurante Bom Almoço". Deleite-se com a magia de sabores, aromas e histórias, e descubra um universo culinário que deixará uma marca eterna em sua memória.<br><br>Avalie-nos e permita-se fazer parte de sua jornada gastronômica, onde a comida e a felicidade se encontram em uma explosão de sabor no "Restaurante Bom Almoço"!</p>',
                'slug' => 'restaurante_bom_almoco',
                'filename' => 'restaurante_bom_almoco.jpg',
                'img_card' => 'restaurante_bom_almoco.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 3,
                'titulo' => 'Lanchonete Terra Carente',
                'descricao_breve' => 'Do sertão para o seu paladar: conheça as iguarias únicas da Lanchonete Terra Carente. Clique aqui para se deliciar!',
                'descricao_1' => '<p style="font-size: 18px; text-align: justify;"> Descubra a Lanchonete Terra Carente: Uma Jornada Culinária Pelos Sabores Autênticos do Brasil!<br><br> Ao atravessar a porta modesta da Lanchonete Terra Carente, você é transportado para um mundo onde as raízes da culinária brasileira são celebradas com paixão e dedicação. Cada prato tem uma história, cada ingrediente carrega consigo o sabor autêntico de terras pouco exploradas, mas ricas em tradição.<br><br> O aroma das especiarias dança no ar, convidando-o a explorar o cardápio cheio de surpresas. De um simples pão de queijo recheado com queijo minas quentinho a um suculento sanduíche de pernil com toque especial de ervas locais, a Lanchonete Terra Carente sabe como acariciar o seu paladar e nutrir sua alma.<br><br> A equipe é composta por verdadeiros artistas culinários, cuja dedicação e amor pela comida transparecem em cada detalhe. Os sorrisos calorosos e o atendimento afetuoso tornam sua visita ainda mais acolhedora, como se você estivesse sendo recebido em um lar de sabores inesquecíveis.<br><br> </p>',
                'descricao_2' => '<p style=\'font-size: 18px; text-align: justify;\'>Além disso, a Lanchonete Terra Carente valoriza sua comunidade. Com uma preocupação genuína com as áreas mais defasadas do Brasil, eles se envolvem em projetos sociais, apoiando famílias locais e promovendo o desenvolvimento da região.<br><br>Nesta jornada culinária única, a Lanchonete Terra Carente não é apenas um lugar para satisfazer a fome, mas também para saciar a sede por histórias, culturas e tradições. Cada prato conta uma narrativa rica e emocionante, capaz de conectar você à riqueza e à diversidade do Brasil.<br><br>Então, se você é um aventureiro gastronômico, apaixonado por descobertas e quer sentir a verdadeira essência do Brasil em cada garfada, não hesite! Venha à Lanchonete Terra Carente, onde a carência é apenas de lugares como este, onde a autenticidade e o sabor se encontram em perfeita harmonia.<br><br>Seja parte dessa história, venha avaliar e saborear a Lanchonete Terra Carente!</p>',
                'slug' => 'lachonete_terra_carente',
                'filename' => 'lanchonete_terra_carente.jpg',
                'img_card' => 'restaurante_bom_almoco.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 4,
                'titulo' => 'Da Vinci\'s Pizza Spot',
                'descricao_breve' => 'Embarque em uma Aventura Gastronômica - Descubra o "Da Vinci\'s Pizza Spot"!',
                'descricao_1' => '<p style="font-size: 18px; text-align: justify; line-height: 1.6;">
Descubra a Lenda do "Da Vinci\'s Pizza Spot!

Adentre um mundo de maravilhas culinárias no "Da Vinci\'s Pizza Spot", onde sabores ancestrais italianos se mesclam perfeitamente com maestria artística, criando uma experiência gastronômica inesquecível! Embarque em uma jornada gastronômica como nenhuma outra, enquanto desvendamos a cativante história por trás desta extraordinária pizzaria.

A lenda conta que há séculos, nas pitorescas ruas de Florença, na Itália, viveu um habilidoso pizzaiolo chamado Leonardo Da Vinci. Conhecido não apenas por sua genialidade artística, mas também por sua perícia culinária, Da Vinci foi rumorado por ter criado as mais deliciosas receitas de pizza que o mundo já conheceu. Dizem que suas pizzas eram tão divinas que inspiraram artistas como Michelangelo, Botticelli e Raphael!
</p>',
                'descricao_2' => '<p style="font-size: 18px; text-align: justify; line-height: 1.6;">
Avançando para os dias atuais, as sagradas receitas das pizzas de Da Vinci encontraram seu caminho até o coração do Brasil. O legado vive no "Da Vinci\'s Pizza Spot", onde uma equipe apaixonada de artesãos culinários se dedica a preservar o espírito dessa tradição ancestral.

Cada pizza no "Da Vinci\'s" é uma obra de arte, feita à mão com amor e precisão, assim como os traços do grande artista em suas telas. Saboreie a harmoniosa sinfonia de ingredientes frescos e de origem local, e permita que os sabores ricos conduzam você por uma jornada culinária pelas colinas da Toscana.

Ao adentrar a atmosfera rústica, porém acolhedora, você será transportado para uma era de fervor artístico. As paredes adornadas com esboços de Da Vinci, o aroma dos fornos à lenha e as melodias italianas dançando no ar contribuem para uma atmosfera verdadeiramente única.

No "Da Vinci\'s Pizza Spot", valorizamos mais do que apenas a arte de preparar pizzas; celebramos a essência do convívio e dos momentos compartilhados. Nosso estilo de refeição familiar incentiva que você traga seus entes queridos e desfrute da alegria de partilhar uma refeição juntos.

Portanto, se você é um amante de cultura, arte e, acima de tudo, de uma pizza excepcional, venha vivenciar a magia atemporal do "Da Vinci\'s Pizza Spot". Embarque em uma aventura culinária inspirada no grande Leonardo, e saia com o coração cheio de alegria e o estômago satisfeito com a melhor pizza da cidade!

Experimente a arte dos sabores no "Da Vinci\'s Pizza Spot" - Onde a Tradição Encontra a Inovação!
</p>',
                'slug' => 'da_vincis_pizza_spot',
                'filename' => 'da_vincis_pizza_spot.jpg',
                'img_card' => 'restaurante_bom_almoco.png',
                'created_at' => '2023-08-13 21:05:58',
                'updated_at' => '2023-08-13 21:05:58',
            ),
            3 =>
            array (
                'id' => 5,
                'titulo' => 'Sushi Samba',
                'descricao_breve' => 'Clique aqui para explorar as combinações inusitadas de sabores no Sushi Samba.',
                'descricao_1' => '<p style="font-size: 18px; text-align: justify;">
"Sushi Samba" - O Encontro de Sabores Nipo-Brasileiros
<br>
<br>
Em uma encantadora esquina do Brasil, onde a brisa tropical se mistura com a essência da cultura japonesa, nasceu o "Sushi Samba" - um refúgio gastronômico onde a tradição nipônica se encontra com a energia contagiante do Brasil! Prepare-se para uma viagem única pelos sabores mais exuberantes que irão encantar seu paladar e aquecer seu coração.
<br>
<br>
Ao cruzar a porta do "Sushi Samba", você será imerso em um ambiente acolhedor e sofisticado, onde a cultura japonesa se entrelaça harmoniosamente com a vibrante alma brasileira. Sinta a energia pulsante que enche o espaço, enquanto as cores e texturas cativantes dos nossos pratos se desenrolam diante de seus olhos curiosos.
<br>
<br>
Nossa equipe, composta por talentosos sushimen e sushigirls, traz consigo a arte milenar de preparar os mais frescos e saborosos sushis, sashimis e temakis, mas com um toque exclusivo do Brasil. Cada peça de sushi é uma verdadeira obra-prima, uma fusão de ingredientes inesperados que despertará seus sentidos em um autêntico espetáculo culinário.
<br>
<br>
Nossos chefs dominam a arte do "nikkei", uma deliciosa mistura da culinária japonesa com a paixão brasileira. Do tradicional sabor do Japão ao calor das especiarias tropicais, cada mordida é uma surpresa e um convite para embarcar em uma jornada gastronômica como nenhuma outra.
</p>',
                'descricao_2' => '<p style="font-size: 18px; text-align: justify;">
Mas o "Sushi Samba" não é apenas um lugar para satisfazer o paladar. É uma experiência completa que celebra a união das culturas. À medida que nossas taças de saquê e caipirinha se erguem em brindes alegres, o som envolvente da música brasileira se mescla com as melodias suaves do Japão, criando uma sinfonia de sabores e emoções.
<br>
<br>
Agora, queremos que você se junte a nós nesta celebração dos sentidos e compartilhe sua experiência única no "Sushi Samba". Cada cliente é uma parte valiosa dessa história, e seu feedback é o combustível que alimenta nossa busca incansável pela excelência.
<br>
<br>
Deixe-nos saber o que achou da nossa fusão de sabores, do atendimento caloroso e da atmosfera que criamos com tanto carinho. Suas palavras nos inspiram a crescer e nos aperfeiçoar a cada dia, e juntos, continuaremos a escrever essa história mágica de encontros culturais.
<br>
<br>
Não perca tempo, venha se deliciar com a autêntica experiência nipo-brasileira do "Sushi Samba" e seja parte dessa jornada que une o melhor dos dois mundos em um único lugar. Sua avaliação é nosso maior presente, e estamos ansiosos para compartilhar esse capítulo inesquecível da nossa história com você! 🍣🎉
</p>',
                'slug' => 'sushi_samba',
                'filename' => 'sushi_samba.jpg',
                'img_card' => 'restaurante_bom_almoco.png',
                'created_at' => '2023-08-13 21:10:25',
                'updated_at' => '2023-08-13 21:10:25',
            ),
        ));


    }
}
