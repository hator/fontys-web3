<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
          'title' => "Polsa stronka webowa",
          'content' => "raz dwa trzy",
          'author' => "Jan Michalski"
        ]);

        DB::table('articles')->insert([
          'title' => "Lorem Ipsum is the best",
          'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean facilisis lorem ac elit sagittis, eu tincidunt justo tempor. Curabitur gravida tellus nec risus bibendum auctor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed convallis ac odio vitae rutrum. Integer quis vestibulum risus. Etiam venenatis pellentesque purus non rutrum. Fusce placerat nisl sit amet eros porttitor ornare. Maecenas efficitur lectus eget mauris tempor rutrum. Pellentesque vitae velit non risus sodales cursus egestas sit amet ex.

Phasellus efficitur, felis non sagittis pretium, mauris arcu faucibus nunc, non laoreet ex sapien sit amet nunc. Praesent ac pellentesque neque, et suscipit leo. Morbi ornare convallis commodo. Donec consectetur, massa a blandit egestas, turpis ante placerat neque, sit amet dictum nibh nulla non orci. Integer vehicula libero diam. Phasellus felis justo, volutpat nec condimentum in, accumsan sed diam. Nullam fermentum mauris ut massa lacinia, in sagittis leo consequat. In mauris orci, gravida id lorem sed, pellentesque rhoncus elit. Quisque non purus in sapien suscipit vulputate. Cras luctus sem urna, in varius sem faucibus vitae. Aenean quis diam a ante lacinia porta sed vitae arcu. Aenean a est risus.

Vestibulum non aliquam quam. Mauris nec quam eu leo tristique pharetra eu eu odio. Maecenas egestas justo a malesuada tempus. Donec lobortis sollicitudin lacus, at pharetra elit elementum in. Praesent dapibus risus sem, eget sodales diam venenatis eget. Sed efficitur, orci id vestibulum cursus, lacus ipsum consequat felis, ut posuere sapien nulla non urna. Integer vel odio justo. Cras aliquet metus arcu, sodales rhoncus orci tincidunt eget. Nullam non bibendum ex. In condimentum nisl vel libero tincidunt venenatis. Nam non finibus quam, in lacinia dolor. Nam commodo tempor arcu vel pretium. Praesent elit massa, euismod a est quis, posuere volutpat augue. Donec vel ex lobortis, commodo elit quis, dictum quam. Suspendisse dolor augue, suscipit feugiat magna a, viverra tempor erat.

Vestibulum dictum tempor eros, sit amet venenatis dolor. Maecenas dui tortor, convallis in pretium pulvinar, commodo quis purus. In tellus urna, pretium a mattis vitae, accumsan porttitor nisl. Proin quis tristique metus, ut tempus risus. Donec gravida turpis eu turpis imperdiet, et egestas nibh volutpat. Vivamus eu suscipit erat. Phasellus sodales neque et gravida semper. Quisque ornare, metus vitae condimentum bibendum, nisi sem consectetur massa, et placerat sem ante non erat. Donec id mi dui. Vivamus euismod justo nec risus dapibus pellentesque. Integer quis egestas urna, quis mattis est. In at pretium erat.

Praesent vulputate augue at metus condimentum, ut sodales urna lobortis. Pellentesque interdum vestibulum dolor id luctus. Aliquam bibendum id dui eu mattis. Proin sit amet ligula dui. Praesent diam nisi, luctus ut laoreet sed, congue sit amet lorem. Integer semper ipsum ac orci molestie venenatis. Cras ut velit nec libero imperdiet fringilla. Mauris eget nulla metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse non urna malesuada, porttitor diam maximus, tristique mi. Cras vitae urna vestibulum, euismod tellus quis, tempor ipsum.",
          'author' => "Aleksander Rurarz"
        ]);
    }
}
