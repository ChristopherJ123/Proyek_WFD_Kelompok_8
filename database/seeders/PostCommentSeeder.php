<?php

namespace Database\Seeders;

use App\Models\PostComment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostComment::upsert([
            [
                'post_id' => 1,
                'author_id' => User::all()->random()['id'],
                'message' => 'Knights, castles, and honor duels — it’s hard not to romanticize it all.',
                'share_count' => 2,
            ],
            [
                'post_id' => 1,
                'author_id' => User::all()->random()['id'],
                'message' => 'Don’t forget the vassal drama. Makes for good storytelling!',
                'share_count' => 1,
            ],
            [
                'post_id' => 2,
                'author_id' => User::all()->random()['id'],
                'message' => 'Episode 20 was art. No fight scene could top that quiet walk.',
                'share_count' => 4,
            ],
            [
                'post_id' => 2,
                'author_id' => User::all()->random()['id'],
                'message' => 'The music, the pacing, the emotional payoff — peak anime.',
                'share_count' => 3,
            ],
            [
                'post_id' => 3,
                'author_id' => User::all()->random()['id'],
                'message' => 'Omelette with spinach, cheese, and leftover rice = fast + legit!',
                'share_count' => 1,
            ],
            [
                'post_id' => 3,
                'author_id' => User::all()->random()['id'],
                'message' => 'FRFR :< 15-minute meals got me through finals week.',
                'share_count' => 1,
            ],
            [
                'post_id' => 4,
                'author_id' => User::all()->random()['id'],
                'message' => 'Noa, no contest not even King or Legend, Noa is literally multiversal in power level.',
                'share_count' => 0,
            ],
            [
                'post_id' => 4,
                'author_id' => User::all()->random()['id'],
                'message' => 'Noa and King seems like a good choice BUT people are absolutely sleeping on Max look at what he did in the final episode',
                'share_count' => 2,
            ],
            [
                'post_id' => 5,
                'author_id' => User::all()->random()['id'],
                'message' => 'I personally think so It is simpler compared to java and is becoming more used than it is before.',
                'share_count' => 2,
            ],
            [
                'post_id' => 5,
                'author_id' => User::all()->random()['id'],
                'message' => 'sure but i would suggest try to learn java, it’s still is the most widely used programming language so knowing it would be better for you.',
                'share_count' => 1,
            ],
            [
                'post_id' => 6,
                'author_id' => User::all()->random()['id'],
                'message' => '“I think it can I mean it is called MINIMAL living after all, that would include minimal spending too',
                'share_count' => 2,
            ],
            [
                'post_id' => 6,
                'author_id' => User::all()->random()['id'],
                'message' => 'not if the minimal things you buy are hella expensive .',
                'share_count' => 1,
            ],
            [
                'post_id' => 7,
                'author_id' => User::all()->random()['id'],
                'message' => 'My parents were victims of the war, i was an orphan. I had to learn the hard way.',
                'share_count' => 0,
            ],
            [
                'post_id' => 7,
                'author_id' => User::all()->random()['id'],
                'message' => 'My parents taught me a lot but the most important thing in regards to habits that they thought me is to always sleep before 11 pm.',
                'share_count' => 1,
            ],
            [
                'post_id' => 8,
                'author_id' => User::all()->random()['id'],
                'message' => 'just be honest with each other, communication is key.',
                'share_count' => 3,
            ],
            [
                'post_id' => 8,
                'author_id' => User::all()->random()['id'],
                'message' => 'balance i guess, you need to love your gf but never forget about yourself.',
                'share_count' => 2,
            ],
            [
                'post_id' => 9,
                'author_id' => User::all()->random()['id'],
                'message' => 'I use a time-block app. Helps me remember things.',
                'share_count' => 1,
            ],
            [
                'post_id' => 9,
                'author_id' => User::all()->random()['id'],
                'message' => 'Phone goes to grayscale after 10PM. Forces me to log off.',
                'share_count' => 0,
            ],
            [
                'post_id' => 10,
                'author_id' => User::all()->random()['id'],
                'message' => 'a bed duh, pick a good one btw i suggest the mat1000 by marco’s bedroom comfy and cozy.',
                'share_count' => 3,
            ],
            [
                'post_id' => 10,
                'author_id' => User::all()->random()['id'],
                'message' => 'that’s a big aahh bedroom that’s like a whole classroom',
                'share_count' => 2,
            ],
            [
                'post_id' => 11,
                'author_id' => User::all()->random()['id'],
                'message' => 'Just saw someone wearing Jelly sandals again 😭 nostalgia hit hard.',
                'share_count' => 0,
            ],
            [
                'post_id' => 11,
                'author_id' => User::all()->random()['id'],
                'message' => 'I bought some flared jeans for my niece, they’re making a comeback allright.',
                'share_count' => 1,
            ],
            [
                'post_id' => 12,
                'author_id' => User::all()->random()['id'],
                'message' => 'try to always wake up early or in the morning even if you got no morning classes.',
                'share_count' => 4,
            ],
            [
                'post_id' => 12,
                'author_id' => User::all()->random()['id'],
                'message' => 'manage your budget for food trust me you don’t want to eat cup noodles for 2 whole weeks straight.',
                'share_count' => 2,
            ],
            [
                'post_id' => 13,
                'author_id' => User::all()->random()['id'],
                'message' => 'dringking tea in the morning to focus, like seriously ginger tea with honey cures everything. Maybe even heartbreak.',
                'share_count' => 1,
            ],
            [
                'post_id' => 13,
                'author_id' => User::all()->random()['id'],
                'message' => 'always carry cash, there’re always a small chance of an emergency where you might need it.',
                'share_count' => 1,
            ],
            [
                'post_id' => 14,
                'author_id' => User::all()->random()['id'],
                'message' => 'people gonna hate me for this but the force awakens, it’s my first SW movie sooo.....',
                'share_count' => 3,
            ],
            [
                'post_id' => 14,
                'author_id' => User::all()->random()['id'],
                'message' => 'empire strike back, I don’t need to explain don’t I',
                'share_count' => 2,
            ],
            [
                'post_id' => 15,
                'author_id' => User::all()->random()['id'],
                'message' => 'yup, honestly I wonder why i even bother watching their newer stuff, maybe i had hope, not anymore tho.....',
                'share_count' => 1,
            ],
            [
                'post_id' => 15,
                'author_id' => User::all()->random()['id'],
                'message' => 'thunderbolt was actually preety good who knows they could be back.',
                'share_count' => 1,
            ],
            [
                'post_id' => 16,
                'author_id' => User::all()->random()['id'],
                'message' => 'Eleven, her mad face is kinda goofy I like it.',
                'share_count' => 2,
            ],
            [
                'post_id' => 16,
                'author_id' => User::all()->random()['id'],
                'message' => '“Billy, he pretty cool.',
                'share_count' => 1,
            ],
            [
                'post_id' => 17,
                'author_id' => User::all()->random()['id'],
                'message' => 'this is peak milenial humor, how could it be overated?',
                'share_count' => 3,
            ],
            [
                'post_id' => 17,
                'author_id' => User::all()->random()['id'],
                'message' => 'tbh I’m rewatching it rn and yeah...it’s kinda sucks',
                'share_count' => 2,
            ],
            [
                'post_id' => 18,
                'author_id' => User::all()->random()['id'],
                'message' => 'hank ain’t irredeemable, what are you talking about bro?',
                'share_count' => 4,
            ],
            [
                'post_id' => 18,
                'author_id' => User::all()->random()['id'],
                'message' => 'did you mean walt rather than hank here?',
                'share_count' => 2,
            ],
            [
                'post_id' => 19,
                'author_id' => User::all()->random()['id'],
                'message' => 'red wedding definitely, and yeah it was just so brutal',
                'share_count' => 1,
            ],
            [
                'post_id' => 19,
                'author_id' => User::all()->random()['id'],
                'message' => 'the battle at the bridge so many wildlings so little night watch, epicness.',
                'share_count' => 2,
            ],
            [
                'post_id' => 20,
                'author_id' => User::all()->random()['id'],
                'message' => 'frfr, especially the helmet just scream anglo saxon.',
                'share_count' => 3,
            ],
            [
                'post_id' => 20,
                'author_id' => User::all()->random()['id'],
                'message' => 'really? I kinda hate the scale surcoat ngl why not just give them normal mail hauberk?',
                'share_count' => 2,
            ],
            [
                'post_id' => 21,
                'author_id' => User::all()->random()['id'],
                'message' => 'ILLET, check them out their songs are pretty good.',
                'share_count' => 3,
            ],
            [
                'post_id' => 21,
                'author_id' => User::all()->random()['id'],
                'message' => 'babymonster (yes that’s their name)',
                'share_count' => 1,
            ],
            [
                'post_id' => 22,
                'author_id' => User::all()->random()['id'],
                'message' => 'a friend of mine he doesn’t even have insta, but other than not knowing world iccidents he’s normal',
                'share_count' => 3,
            ],
            [
                'post_id' => 22,
                'author_id' => User::all()->random()['id'],
                'message' => 'me, I’am that guy and I think I’am a pretty normal dude',
                'share_count' => 2,
            ],
            [
                'post_id' => 23,
                'author_id' => User::all()->random()['id'],
                'message' => 'nope their choices aren’t biased. you’re just salty.',
                'share_count' => 1,
            ],
            [
                'post_id' => 23,
                'author_id' => User::all()->random()['id'],
                'message' => 'FINALLY SOMEONE SAID IT! especially in the animation genre they HATE 2D and non pixar.',
                'share_count' => 2,
            ],
            [
                'post_id' => 24,
                'author_id' => User::all()->random()['id'],
                'message' => 'Hinata and it aint even close, look at this goddess man.',
                'share_count' => 3,
            ],
            [
                'post_id' => 24,
                'author_id' => User::all()->random()['id'],
                'message' => 'tsunade, for 2 humongous reasons.',
                'share_count' => 1,
            ],
            [
                'post_id' => 25,
                'author_id' => User::all()->random()['id'],
                'message' => 'yup it is, just keep watching it bro it’s gonna get amazing',
                'share_count' => 2,
            ],
            [
                'post_id' => 25,
                'author_id' => User::all()->random()['id'],
                'message' => 'haven’t read till there ngl.',
                'share_count' => 1,
            ],
            [
                'post_id' => 26,
                'author_id' => User::all()->random()['id'],
                'message' => 'the ending isn’t that bad, people are really overhating it',
                'share_count' => 4,
            ],
            [
                'post_id' => 26,
                'author_id' => User::all()->random()['id'],
                'message' => 'I mean sure the ending kinda suck but that doesn’t change the fact that AOT created a GENERATIONAL masterpiece with it’s story up to that point',
                'share_count' => 2,
            ],
            [
                'post_id' => 27,
                'author_id' => User::all()->random()['id'],
                'message' => 'because it is immerisive stephen hillenburg was a marine biologist he know his stuff.',
                'share_count' => 3,
            ],
            [
                'post_id' => 27,
                'author_id' => User::all()->random()['id'],
                'message' => 'they literally use car polution as homes, it is immersive bruh',
                'share_count' => 2,
            ],
            [
                'post_id' => 28,
                'author_id' => User::all()->random()['id'],
                'message' => 'no you’re not apparently the creator pushed them so hard as a prank to the watcher.',
                'share_count' => 2,
            ],
            [
                'post_id' => 28,
                'author_id' => User::all()->random()['id'],
                'message' => 'you must not be that active here, that’s like one of the most popular non cannon ship here.',
                'share_count' => 1,
            ],
            [
                'post_id' => 29,
                'author_id' => User::all()->random()['id'],
                'message' => 'nah people be hating on it cause they don’t want DS to end .',
                'share_count' => 2,
            ],
            [
                'post_id' => 29,
                'author_id' => User::all()->random()['id'],
                'message' => 'honestly nah it ended in a sweet and short way they defeat the bad guy and then they live happily ever after it’s good.',
                'share_count' => 1,
            ],
            [
                'post_id' => 30,
                'author_id' => User::all()->random()['id'],
                'message' => 'why would i change your mind when you’re right?',
                'share_count' => 3,
            ],
            [
                'post_id' => 30,
                'author_id' => User::all()->random()['id'],
                'message' => 'nah gravity falls better .',
                'share_count' => 2,
            ],
            [
                'post_id' => 31,
                'author_id' => User::all()->random()['id'],
                'message' => 'same I can’t see it either he’s literally a rich dude and he still depressed, some loser in the comment section gonna go ’’ooohh cause he’s depressed’’ or some shi trust me.',
                'share_count' => 2,
            ],
            [
                'post_id' => 31,
                'author_id' => User::all()->random()['id'],
                'message' => 'because of how the show handle his depression and sadness, it just hit the heart even if he’s a rich celebrity.',
                'share_count' => 1,
            ],
            [
                'post_id' => 32,
                'author_id' => User::all()->random()['id'],
                'message' => 'poyo, one of the newer ones but absolute peak.',
                'share_count' => 3,
            ],
            [
                'post_id' => 32,
                'author_id' => User::all()->random()['id'],
                'message' => 'same with you big dawg kiki delivery service is ABSOLUTE PEAK',
                'share_count' => 2,
            ],
            [
                'post_id' => 33,
                'author_id' => User::all()->random()['id'],
                'message' => 'TADC and it’s not even close.',
                'share_count' => 2,
            ],
            [
                'post_id' => 33,
                'author_id' => User::all()->random()['id'],
                'message' => 'people gonna make fun of me but Hazbin Hotel, cmon guys be honest it’s good',
                'share_count' => 1,
            ],
            [
                'post_id' => 34,
                'author_id' => User::all()->random()['id'],
                'message' => 'Hard, there’s a reason why people say it’s not rocket science when describing something that’s not hard.',
                'share_count' => 3,
            ],
            [
                'post_id' => 34,
                'author_id' => User::all()->random()['id'],
                'message' => 'really hard...what kinda question even is this just google the average rocket science problem and you’ll see.',
                'share_count' => 2,
            ],
            [
                'post_id' => 35,
                'author_id' => User::all()->random()['id'],
                'message' => 'OOP',
                'share_count' => 1,
            ],
            [
                'post_id' => 35,
                'author_id' => User::all()->random()['id'],
                'message' => 'i guess OOP it’s basic and yet really important',
                'share_count' => 2,
            ],
            [
                'post_id' => 36,
                'author_id' => User::all()->random()['id'],
                'message' => 'Definitely the hygiene, people really be suprised when i told them that they have bath houses in the medieval ages, it’s crazy.',
                'share_count' => 2,
            ],
            [
                'post_id' => 36,
                'author_id' => User::all()->random()['id'],
                'message' => 'sciences and church supported sciences in particular, they really think the civilization that created such beautiful architecture and metallurgy is somehow stupid, it’s crazy',
                'share_count' => 1,
            ],
            [
                'post_id' => 37,
                'author_id' => User::all()->random()['id'],
                'message' => 'uhhhh idk dinosaurs are overated early mammals are where its at',
                'share_count' => 2,
            ],
            [
                'post_id' => 37,
                'author_id' => User::all()->random()['id'],
                'message' => 'brontosaurus',
                'share_count' => 1,
            ],
            [
                'post_id' => 38,
                'author_id' => User::all()->random()['id'],
                'message' => 'I mean sure, just learn the simple stuff',
                'share_count' => 3,
            ],
            [
                'post_id' => 38,
                'author_id' => User::all()->random()['id'],
                'message' => 'bruh you haven’t even learn basic physics i don’t think it’s a good idea',
                'share_count' => 2,
            ],
            [
                'post_id' => 39,
                'author_id' => User::all()->random()['id'],
                'message' => 'thorfinn, the change from revengeful kid to a pacifist is crazy and yet masterfully done.',
                'share_count' => 2,
            ],
            [
                'post_id' => 39,
                'author_id' => User::all()->random()['id'],
                'message' => 'subaru from re zero, if you know you know',
                'share_count' => 1,
            ],
            [
                'post_id' => 40,
                'author_id' => User::all()->random()['id'],
                'message' => 'technically it’s not just a philosophy book, but orTHodoxy but Gk Chesterton, masterful writing',
                'share_count' => 2,
            ],
            [
                'post_id' => 40,
                'author_id' => User::all()->random()['id'],
                'message' => 'karl marx stuff frfr glory to the working class .',
                'share_count' => 1,
            ],
            [
                'post_id' => 41,
                'author_id' => User::all()->random()['id'],
                'message' => 'yup Catholic Cathedrals really does look majestic',
                'share_count' => 1,
            ],
            [
                'post_id' => 41,
                'author_id' => User::all()->random()['id'],
                'message' => 'Orhtodox churches for me they either look roman or look eastern with domes they look cool frfr',
                'share_count' => 1,
            ],
            [
                'post_id' => 42,
                'author_id' => User::all()->random()['id'],
                'message' => 'better than learning language alone',
                'share_count' => 3,
            ],
            [
                'post_id' => 42,
                'author_id' => User::all()->random()['id'],
                'message' => 'just use duolingo bruh',
                'share_count' => 2,
            ],
            [
                'post_id' => 43,
                'author_id' => User::all()->random()['id'],
                'message' => 'the people, if the people are friendly then it’s perfect',
                'share_count' => 2,
            ],
            [
                'post_id' => 43,
                'author_id' => User::all()->random()['id'],
                'message' => 'rather than feel you should look for a community that would help you grow',
                'share_count' => 1,
            ],
            [
                'post_id' => 44,
                'author_id' => User::all()->random()['id'],
                'message' => 'honestly I’m kinda numb to it all so many problems all the time is so exhausting',
                'share_count' => 3,
            ],
            [
                'post_id' => 44,
                'author_id' => User::all()->random()['id'],
                'message' => 'just hoping things get better i guess....',
                'share_count' => 2,
            ],
            [
                'post_id' => 45,
                'author_id' => User::all()->random()['id'],
                'message' => 'broken roads...it will always be about broken roads',
                'share_count' => 1,
            ],
            [
                'post_id' => 45,
                'author_id' => User::all()->random()['id'],
                'message' => 'people stealing steel everywhere from the side walk, benches, other people’s houses it’s crazy',
                'share_count' => 2,
            ],
            [
                'post_id' => 46,
                'author_id' => User::all()->random()['id'],
                'message' => 'weirdly enough a game, it’s called phoenix right',
                'share_count' => 3,
            ],
            [
                'post_id' => 46,
                'author_id' => User::all()->random()['id'],
                'message' => 'Death note, especially on the corrupt politician light killed',
                'share_count' => 2,
            ],
            ['post_id' => 47, 'author_id' => User::all()->random()['id'], 'message' => 'Healthcare and education affordability seem to be leading concerns.', 'sharecount' => rand(0, 30)],
            ['post_id' => 47, 'author_id' => User::all()->random()['id'], 'message' => 'Climate policy and economic inequality are getting major attention too.', 'sharecount' => rand(0, 30)],

            ['post_id' => 48, 'author_id' => User::all()->random()['id'], 'message' => 'Browser extensions like NewsGuard have been super helpful.', 'sharecount' => rand(0, 30)],
            ['post_id' => 48, 'author_id' => User::all()->random()['id'], 'message' => 'Always cross-reference stories and check for emotional language.', 'sharecount' => rand(0, 30)],

            ['post_id' => 49, 'author_id' => User::all()->random()['id'], 'message' => 'It’s important to share only verified updates—misinformation spreads fast.', 'sharecount' => rand(0, 30)],
            ['post_id' => 49, 'author_id' => User::all()->random()['id'], 'message' => 'Watching the developments in Sudan and Ukraine closely right now.', 'sharecount' => rand(0, 30)],

            ['post_id' => 50, 'author_id' => User::all()->random()['id'], 'message' => 'Tariffs are reshaping supply chains globally—it’s wild to watch.', 'sharecount' => rand(0, 30)],
            ['post_id' => 50, 'author_id' => User::all()->random()['id'], 'message' => 'These disputes often hit consumers hardest in the long run.', 'sharecount' => rand(0, 30)],

            ['post_id' => 51, 'author_id' => User::all()->random()['id'], 'message' => 'The momentum behind indigenous rights movements is inspiring.', 'sharecount' => rand(0, 30)],
            ['post_id' => 51, 'author_id' => User::all()->random()['id'], 'message' => 'It’s powerful to see how digital activism is shaping real policy.', 'sharecount' => rand(0, 30)],

            ['post_id' => 52, 'author_id' => User::all()->random()['id'], 'message' => 'History teaches us not just what happened, but why it matters.', 'sharecount' => rand(0, 30)],
            ['post_id' => 52, 'author_id' => User::all()->random()['id'], 'message' => 'Sometimes I wonder if we remember history more than we learn from it.', 'sharecount' => rand(0, 30)],

            ['post_id' => 53, 'author_id' => User::all()->random()['id'], 'message' => 'Frieren shows that even immortals carry emotional weight. So deep.', 'sharecount' => rand(0, 30)],
            ['post_id' => 53, 'author_id' => User::all()->random()['id'], 'message' => 'It’s wild how a fantasy elf feels more real than some human characters.', 'sharecount' => rand(0, 30)],

            ['post_id' => 54, 'author_id' => User::all()->random()['id'], 'message' => 'Weekend batch cooking saves me during exam weeks!', 'sharecount' => rand(0, 30)],
            ['post_id' => 54, 'author_id' => User::all()->random()['id'], 'message' => 'I try morning meals on class days and bulk meals every Sunday.', 'sharecount' => rand(0, 30)],

            ['post_id' => 55, 'author_id' => User::all()->random()['id'], 'message' => 'Some older Ultraman seasons are on archive sites, surprisingly.', 'sharecount' => rand(0, 30)],
            ['post_id' => 55, 'author_id' => User::all()->random()['id'], 'message' => 'Nothing beats owning the DVDs. Nostalgia feels better that way.', 'sharecount' => rand(0, 30)],

            ['post_id' => 56, 'author_id' => User::all()->random()['id'], 'message' => 'Laravel tutorial series on Laracasts helped me a lot.', 'sharecount' => rand(0, 30)],
            ['post_id' => 56, 'author_id' => User::all()->random()['id'], 'message' => 'Start small—build a CRUD app. It gives real confidence fast.', 'sharecount' => rand(0, 30)],

            ['post_id' => 57, 'author_id' => User::all()->random()['id'], 'message' => '5 minutes daily is how I started too. Now I can’t skip it!', 'sharecount' => rand(0, 30)],
            ['post_id' => 57, 'author_id' => User::all()->random()['id'], 'message' => 'Decluttering helps my brain feel more in control. Weird but true.', 'sharecount' => rand(0, 30)],

            ['post_id' => 58, 'author_id' => User::all()->random()['id'], 'message' => 'A short morning walk clears up mental fog like nothing else.', 'sharecount' => rand(0, 30)],
            ['post_id' => 58, 'author_id' => User::all()->random()['id'], 'message' => 'The sunlight and quiet really set the mood for the day.', 'sharecount' => rand(0, 30)],

            ['post_id' => 59, 'author_id' => User::all()->random()['id'], 'message' => 'Long-distance worked for me when we both had strong routines.', 'sharecount' => rand(0, 30)],
            ['post_id' => 59, 'author_id' => User::all()->random()['id'], 'message' => 'It can work, but only if communication is solid and constant.', 'sharecount' => rand(0, 30)],

            ['post_id' => 60, 'author_id' => User::all()->random()['id'], 'message' => 'Notion gives me flexibility but I still jot things down on paper.', 'sharecount' => rand(0, 30)],
            ['post_id' => 60, 'author_id' => User::all()->random()['id'], 'message' => 'Google Calendar for structure, paper for creative thoughts.', 'sharecount' => rand(0, 30)],

            ['post_id' => 61, 'author_id' => User::all()->random()['id'], 'message' => 'Check out DIY groups on Pinterest or Facebook. Tons of ideas!', 'sharecount' => rand(0, 30)],
            ['post_id' => 61, 'author_id' => User::all()->random()['id'], 'message' => 'Second-hand stores + fairy lights = instant cozy room.', 'sharecount' => rand(0, 30)],

            ['post_id' => 62, 'author_id' => User::all()->random()['id'], 'message' => 'Cool = confidence. Doesn’t matter if it’s designer or thrifted.', 'sharecount' => rand(0, 30)],
            ['post_id' => 62, 'author_id' => User::all()->random()['id'], 'message' => 'For me, it’s all about fit. A good fit changes everything.', 'sharecount' => rand(0, 30)],

            ['post_id' => 63, 'author_id' => User::all()->random()['id'], 'message' => 'We drop self-care because it feels optional in a crisis.', 'sharecount' => rand(0, 30)],
            ['post_id' => 63, 'author_id' => User::all()->random()['id'], 'message' => 'Self-care should be the first response, not the last resort.', 'sharecount' => rand(0, 30)],

            ['post_id' => 64, 'author_id' => User::all()->random()['id'], 'message' => 'Early mornings when no one else is awake—perfect focus time.', 'sharecount' => rand(0, 30)],
            ['post_id' => 64, 'author_id' => User::all()->random()['id'], 'message' => 'Mid-day with music is my sweet spot for productivity.', 'sharecount' => rand(0, 30)],

            ['post_id' => 65, 'author_id' => User::all()->random()['id'], 'message' => 'The tone was off. It didn’t feel like a Star Wars movie to me.', 'sharecount' => rand(0, 30)],
            ['post_id' => 65, 'author_id' => User::all()->random()['id'], 'message' => 'Characters made choices that didn’t align with their arcs.', 'sharecount' => rand(0, 30)],

            ['post_id' => 66, 'author_id' => User::all()->random()['id'], 'message' => 'Secret Wars could be Marvel’s reset button. They need it.', 'sharecount' => rand(0, 30)],
            ['post_id' => 66, 'author_id' => User::all()->random()['id'], 'message' => 'I hope they use it to introduce mutants smoothly.', 'sharecount' => rand(0, 30)],

            ['post_id' => 67, 'author_id' => User::all()->random()['id'], 'message' => 'When Eleven flipped that van—goosebumps!', 'sharecount' => rand(0, 30)],
            ['post_id' => 67, 'author_id' => User::all()->random()['id'], 'message' => 'Season 1 had such mystery. But the guitar scene in 4? Iconic.', 'sharecount' => rand(0, 30)],

            ['post_id' => 68, 'author_id' => User::all()->random()['id'], 'message' => 'Dwight is chaos and order all at once. A walking paradox.', 'sharecount' => rand(0, 30)],
            ['post_id' => 68, 'author_id' => User::all()->random()['id'], 'message' => 'The beet farm, the quotes, the rivalry—he\'s unforgettable.', 'sharecount' => rand(0, 30)],

            ['post_id' => 69, 'author_id' => User::all()->random()['id'], 'message' => 'For me, it was when he let Jane’s death happen. No turning back.', 'sharecount' => rand(0, 30)],
            ['post_id' => 69, 'author_id' => User::all()->random()['id'], 'message' => 'It’s the scene with the "I did it for me" line. That was chilling.', 'sharecount' => rand(0, 30)],

            ['post_id' => 70, 'author_id' => User::all()->random()['id'], 'message' => 'Arya exploring the west could be epic. Like fantasy Voyager.', 'sharecount' => rand(0, 30)],
            ['post_id' => 70, 'author_id' => User::all()->random()['id'], 'message' => 'Westeros rebuilding would be cool, but messy politically.', 'sharecount' => rand(0, 30)],

            ['post_id' => 71, 'author_id' => User::all()->random()['id'], 'message' => 'Sam’s loyalty is legendary. He never once gave up.', 'sharecount' => rand(0, 30)],
            ['post_id' => 71, 'author_id' => User::all()->random()['id'], 'message' => 'Samwise is the real hero. No question.', 'sharecount' => rand(0, 30)],

            ['post_id' => 72, 'author_id' => User::all()->random()['id'], 'message' => 'NewJeans\' stage presence is next level, but Aespa\'s vocals tho.', 'sharecount' => rand(0, 30)],
            ['post_id' => 72, 'author_id' => User::all()->random()['id'], 'message' => 'I can’t even choose—both are killing it this year!', 'sharecount' => rand(0, 30)],

            ['post_id' => 73, 'author_id' => User::all()->random()['id'], 'message' => 'That ‘screaming cat with a party hat’ meme cracked me up—anyone else see that?', 'sharecount' => rand(0, 30)],
            ['post_id' => 73, 'author_id' => User::all()->random()['id'], 'message' => 'Taylor’s new video dropped and the fan theories are wild this week.', 'sharecount' => rand(0, 30)],

            ['post_id' => 74, 'author_id' => User::all()->random()['id'], 'message' => 'Can’t believe Leo didn’t win for The Wolf of Wall Street. Robbery.', 'sharecount' => rand(0, 30)],
            ['post_id' => 74, 'author_id' => User::all()->random()['id'], 'message' => 'Toni Collette in Hereditary—how did the Academy miss that performance?', 'sharecount' => rand(0, 30)],

            ['post_id' => 75, 'author_id' => User::all()->random()['id'], 'message' => 'When Itachi smiled at Sasuke before he died… man, my heart broke.', 'sharecount' => rand(0, 30)],
            ['post_id' => 75, 'author_id' => User::all()->random()['id'], 'message' => 'Neji’s death in the war arc hit me hard too. He deserved better.', 'sharecount' => rand(0, 30)],

            ['post_id' => 76, 'author_id' => User::all()->random()['id'], 'message' => 'Surprisingly loved Buggy’s portrayal. Didn’t think they’d pull him off.', 'sharecount' => rand(0, 30)],
            ['post_id' => 76, 'author_id' => User::all()->random()['id'], 'message' => 'Luffy’s actor nailed the optimism. Hoping for more seasons!', 'sharecount' => rand(0, 30)],

            ['post_id' => 77, 'author_id' => User::all()->random()['id'], 'message' => 'Depends on your POV—he was fighting for freedom, but at what cost?', 'sharecount' => rand(0, 30)],
            ['post_id' => 77, 'author_id' => User::all()->random()['id'], 'message' => 'He became what he hated. That’s the tragedy of Eren.', 'sharecount' => rand(0, 30)],

            ['post_id' => 78, 'author_id' => User::all()->random()['id'], 'message' => '“Is mayonnaise an instrument?” will always be top-tier.', 'sharecount' => rand(0, 30)],
            ['post_id' => 78, 'author_id' => User::all()->random()['id'], 'message' => 'Patrick: “The inner machinations of my mind are an enigma.” *milk spills*', 'sharecount' => rand(0, 30)],

            ['post_id' => 79, 'author_id' => User::all()->random()['id'], 'message' => 'Zuko’s arc might be the best redemption story in any cartoon ever.', 'sharecount' => rand(0, 30)],
            ['post_id' => 79, 'author_id' => User::all()->random()['id'], 'message' => 'That moment in Ba Sing Se with Iroh… absolutely gut-wrenching.', 'sharecount' => rand(0, 30)],

            ['post_id' => 80, 'author_id' => User::all()->random()['id'], 'message' => 'Giyu and Tanjiro vs Akaza gave me chills. That animation!', 'sharecount' => rand(0, 30)],
            ['post_id' => 80, 'author_id' => User::all()->random()['id'], 'message' => 'Uzui’s fight with Gyutaro was chaotic and flashy in the best way.', 'sharecount' => rand(0, 30)],

            ['post_id' => 81, 'author_id' => User::all()->random()['id'], 'message' => '“I Remember You” had no right to be that emotional.', 'sharecount' => rand(0, 30)],
            ['post_id' => 81, 'author_id' => User::all()->random()['id'], 'message' => 'Simon and Marcy’s backstory still breaks me every time.', 'sharecount' => rand(0, 30)],

            ['post_id' => 82, 'author_id' => User::all()->random()['id'], 'message' => 'That underwater episode showed how isolating life can feel.', 'sharecount' => rand(0, 30)],
            ['post_id' => 82, 'author_id' => User::all()->random()['id'], 'message' => 'BoJack wasn’t always likable, but that’s what made him real.', 'sharecount' => rand(0, 30)],

            ['post_id' => 83, 'author_id' => User::all()->random()['id'], 'message' => 'Mine’s Princess Mononoke. That forest spirit was haunting and beautiful.', 'sharecount' => rand(0, 30)],
            ['post_id' => 83, 'author_id' => User::all()->random()['id'], 'message' => 'Howl’s Moving Castle always puts me in a dreamlike mood.', 'sharecount' => rand(0, 30)],

            ['post_id' => 84, 'author_id' => User::all()->random()['id'], 'message' => 'The Breadwinner was powerful and beautifully done.', 'sharecount' => rand(0, 30)],
            ['post_id' => 84, 'author_id' => User::all()->random()['id'], 'message' => 'Loved Ernest & Celestine—such a soft and charming story.', 'sharecount' => rand(0, 30)],

            ['post_id' => 85, 'author_id' => User::all()->random()['id'], 'message' => 'They hit about 11.2 km/s—called escape velocity. Insane, right?', 'sharecount' => rand(0, 30)],
            ['post_id' => 85, 'author_id' => User::all()->random()['id'], 'message' => 'Basically: enough thrust + angle + timing = freedom from gravity.', 'sharecount' => rand(0, 30)],

            ['post_id' => 86, 'author_id' => User::all()->random()['id'], 'message' => 'It’s like a toy that can be a car or a plane—same interface, different function.', 'sharecount' => rand(0, 30)],
            ['post_id' => 86, 'author_id' => User::all()->random()['id'], 'message' => 'When one method works differently depending on the object—neat and powerful!', 'sharecount' => rand(0, 30)],

            ['post_id' => 73, 'author_id' => User::all()->random()['id'], 'message' => 'That ‘screaming cat with a party hat’ meme cracked me up—anyone else see that?', 'sharecount' => rand(0, 30)],
            ['post_id' => 73, 'author_id' => User::all()->random()['id'], 'message' => 'Taylor’s new video dropped and the fan theories are wild this week.', 'sharecount' => rand(0, 30)],

            ['post_id' => 74, 'author_id' => User::all()->random()['id'], 'message' => 'Can’t believe Leo didn’t win for The Wolf of Wall Street. Robbery.', 'sharecount' => rand(0, 30)],
            ['post_id' => 74, 'author_id' => User::all()->random()['id'], 'message' => 'Toni Collette in Hereditary—how did the Academy miss that performance?', 'sharecount' => rand(0, 30)],

            ['post_id' => 75, 'author_id' => User::all()->random()['id'], 'message' => 'When Itachi smiled at Sasuke before he died… man, my heart broke.', 'sharecount' => rand(0, 30)],
            ['post_id' => 75, 'author_id' => User::all()->random()['id'], 'message' => 'Neji’s death in the war arc hit me hard too. He deserved better.', 'sharecount' => rand(0, 30)],

            ['post_id' => 76, 'author_id' => User::all()->random()['id'], 'message' => 'Surprisingly loved Buggy’s portrayal. Didn’t think they’d pull him off.', 'sharecount' => rand(0, 30)],
            ['post_id' => 76, 'author_id' => User::all()->random()['id'], 'message' => 'Luffy’s actor nailed the optimism. Hoping for more seasons!', 'sharecount' => rand(0, 30)],

            ['post_id' => 77, 'author_id' => User::all()->random()['id'], 'message' => 'Depends on your POV—he was fighting for freedom, but at what cost?', 'sharecount' => rand(0, 30)],
            ['post_id' => 77, 'author_id' => User::all()->random()['id'], 'message' => 'He became what he hated. That’s the tragedy of Eren.', 'sharecount' => rand(0, 30)],

            ['post_id' => 78, 'author_id' => User::all()->random()['id'], 'message' => '“Is mayonnaise an instrument?” will always be top-tier.', 'sharecount' => rand(0, 30)],
            ['post_id' => 78, 'author_id' => User::all()->random()['id'], 'message' => 'Patrick: “The inner machinations of my mind are an enigma.” *milk spills*', 'sharecount' => rand(0, 30)],

            ['post_id' => 79, 'author_id' => User::all()->random()['id'], 'message' => 'Zuko’s arc might be the best redemption story in any cartoon ever.', 'sharecount' => rand(0, 30)],
            ['post_id' => 79, 'author_id' => User::all()->random()['id'], 'message' => 'That moment in Ba Sing Se with Iroh… absolutely gut-wrenching.', 'sharecount' => rand(0, 30)],

            ['post_id' => 80, 'author_id' => User::all()->random()['id'], 'message' => 'Giyu and Tanjiro vs Akaza gave me chills. That animation!', 'sharecount' => rand(0, 30)],
            ['post_id' => 80, 'author_id' => User::all()->random()['id'], 'message' => 'Uzui’s fight with Gyutaro was chaotic and flashy in the best way.', 'sharecount' => rand(0, 30)],

            ['post_id' => 81, 'author_id' => User::all()->random()['id'], 'message' => '“I Remember You” had no right to be that emotional.', 'sharecount' => rand(0, 30)],
            ['post_id' => 81, 'author_id' => User::all()->random()['id'], 'message' => 'Simon and Marcy’s backstory still breaks me every time.', 'sharecount' => rand(0, 30)],

            ['post_id' => 82, 'author_id' => User::all()->random()['id'], 'message' => 'That underwater episode showed how isolating life can feel.', 'sharecount' => rand(0, 30)],
            ['post_id' => 82, 'author_id' => User::all()->random()['id'], 'message' => 'BoJack wasn’t always likable, but that’s what made him real.', 'sharecount' => rand(0, 30)],

            ['post_id' => 83, 'author_id' => User::all()->random()['id'], 'message' => 'Mine’s Princess Mononoke. That forest spirit was haunting and beautiful.', 'sharecount' => rand(0, 30)],
            ['post_id' => 83, 'author_id' => User::all()->random()['id'], 'message' => 'Howl’s Moving Castle always puts me in a dreamlike mood.', 'sharecount' => rand(0, 30)],

            ['post_id' => 84, 'author_id' => User::all()->random()['id'], 'message' => 'The Breadwinner was powerful and beautifully done.', 'sharecount' => rand(0, 30)],
            ['post_id' => 84, 'author_id' => User::all()->random()['id'], 'message' => 'Loved Ernest & Celestine—such a soft and charming story.', 'sharecount' => rand(0, 30)],

            ['post_id' => 85, 'author_id' => User::all()->random()['id'], 'message' => 'They hit about 11.2 km/s—called escape velocity. Insane, right?', 'sharecount' => rand(0, 30)],
            ['post_id' => 85, 'author_id' => User::all()->random()['id'], 'message' => 'Basically: enough thrust + angle + timing = freedom from gravity.', 'sharecount' => rand(0, 30)],

            ['post_id' => 86, 'author_id' => User::all()->random()['id'], 'message' => 'It’s like a toy that can be a car or a plane—same interface, different function.', 'sharecount' => rand(0, 30)],
            ['post_id' => 86, 'author_id' => User::all()->random()['id'], 'message' => 'When one method works differently depending on the object—neat and powerful!', 'sharecount' => rand(0, 30)],
        ], uniqueBy: 'id');

        PostComment::upsert([
            [
                'post_id' => 1,
                'parent_message_id' => 1,
                'author_id' => User::all()->random()['id'],
                'message' => 'Yep. I agree with you',
                'share_count' => 2,
            ],
            [
                'post_id' => 1,
                'parent_message_id' => 1,
                'author_id' => User::all()->random()['id'],
                'message' => 'The reality is, that system really sucks in practice',
                'share_count' => 2,
            ],
            [
                'post_id' => 1,
                'parent_message_id' => 2,
                'author_id' => User::all()->random()['id'],
                'message' => 'Why is that?',
                'share_count' => 2,
            ],
            [
                'post_id' => 1,
                'parent_message_id' => 3,
                'author_id' => User::all()->random()['id'],
                'message' => 'If you were unlucky to be born into a peasant, there’s really nothing you can do to get up the feudal hierarchy.',
                'share_count' => 2,
            ],
        ], uniqueBy: 'id');
    }
}
