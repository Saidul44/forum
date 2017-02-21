<?php

use App\Models\Thread\Thread;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ThreadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Thread::insert(array(
  array('id' => '1','user_id' => '3','topic_id' => '1','title' => 'New imaging technique catches DNA ‘blinking’ on','body' => 'A new imaging technique takes advantage of DNA’s natural ability to “blink” in response to stimulating light.  The new approach will allow unprecedented views of genetic material and other cellular players. It’s the first method to resolve features smaller than 10 nanometers, biomedical engineer Vadim Backman said February 17 at the annual meeting of the American Association for the Advancement of Science.','photo' => '1487698400.jpg','created_at' => '2017-02-21 15:16:38','updated_at' => '2017-02-21 17:33:20'),
  array('id' => '2','user_id' => '3','topic_id' => '1','title' => 'Microbes survived inside giant cave crystals for up to 50,000 years','body' => 'The microbes found inside the crystals appear to be similar but not identical to those living outside, on the cave walls and other nearby areas, Boston said. That leaves Boston and her team fairly confident that the samples were not contaminated with other microbes and that their age estimates for the crystal-trapped microbes is solid. The team has not yet published the result. If confirmed, the microbes would represent some of the toughest extremophiles on the planet — dwelling at depths 100 to 400 meters below Earth’s surface and enduring temperatures of 45° to 65° Celsius.','photo' => '1487698412.jpg','created_at' => '2017-02-21 15:20:59','updated_at' => '2017-02-21 17:33:32'),
  array('id' => '3','user_id' => '2','topic_id' => '2','title' => 'How hydras know where to regrow their heads','body' => 'Hydras, petite pond polyps known for their seemingly eternal youth, exemplify the art of bouncing back. The animals’ cellular scaffolding, or cytoskeleton, can regrow from a slice of tissue that’s just 5 percent of its full body size. Researchers thought that molecular signals told cells where and how to rebuild, but new evidence suggests there are other forces at play','photo' => '1487698323.jpg','created_at' => '2017-02-21 15:24:55','updated_at' => '2017-02-21 17:32:03'),
  array('id' => '4','user_id' => '2','topic_id' => '2','title' => 'When a nearby star goes supernova','body' => 'Almost every night that the constellation Orion is visible, physicist Mark Vagins steps outside to peer at a reddish star at the right shoulder of the mythical figure. “You can see the color of Betelgeuse with the naked eye. It’s very striking, this red, red star,” he says. “It may not be in my lifetime, but one of these days, that star is going to explode','photo' => '1487698335.jpg','created_at' => '2017-02-21 15:28:39','updated_at' => '2017-02-21 17:32:15'),
  array('id' => '5','user_id' => '2','topic_id' => '3','title' => 'Cow carved in stone paints picture of Europe’s early human culture','body' => 'This stone engraving of an aurochs, or wild cow, found in a French rock-shelter in 2012, provides glimpses of an ancient human culture’s spread across Central and Western Europe, researchers say.

Rows of dots partly cover the aurochs. A circular depression cut into the center of the animal’s body may have caused the limestone to split in two, says Stone Age art specialist Raphaëlle.','photo' => '1487698350.jpg','created_at' => '2017-02-21 15:30:11','updated_at' => '2017-02-21 17:32:30'),
  array('id' => '6','user_id' => '2','topic_id' => '4','title' => 'Ancient otter of unusual size unearthed in China','body' => 'Fossils of a giant otter have emerged from the depths of an open-pit mine in China.

The crushed cranium, jaw bone and partial skeletons of at least three animals belong to a now-extinct species of otter that lived some 6.2 million years ago, scientists report January 23 in the Journal of Systematic Palaeontology.

At roughly 50 kilograms in weight, the otter would have outclassed','photo' => '1487698367.jpg','created_at' => '2017-02-21 15:30:48','updated_at' => '2017-02-21 17:32:47')
));
    }
}
