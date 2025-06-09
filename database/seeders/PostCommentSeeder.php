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
                'message' => 'Cardboard, duct tape, and black paint = instant Batman.',
                'share_count' => 0,
            ],
            [
                'post_id' => 4,
                'author_id' => User::all()->random()['id'],
                'message' => 'Used bubble wrap for a mecha suit once. Loud but impressive!',
                'share_count' => 2,
            ],
            [
                'post_id' => 5,
                'author_id' => User::all()->random()['id'],
                'message' => 'Been journaling for 3 months. Helped me identify thought patterns.',
                'share_count' => 2,
            ],
            [
                'post_id' => 5,
                'author_id' => User::all()->random()['id'],
                'message' => 'Honestly, just writing “I’m tired” every day helped me realize I was burned out.',
                'share_count' => 1,
            ],
            [
                'post_id' => 6,
                'author_id' => User::all()->random()['id'],
                'message' => '“Now and Then, Here and There” deserves more love!',
                'share_count' => 2,
            ],
            [
                'post_id' => 6,
                'author_id' => User::all()->random()['id'],
                'message' => 'Irresponsible Captain Tylor is peak 90s absurdity.',
                'share_count' => 1,
            ],
            [
                'post_id' => 7,
                'author_id' => User::all()->random()['id'],
                'message' => 'My parents never talked about money. I had to learn the hard way.',
                'share_count' => 0,
            ],
            [
                'post_id' => 7,
                'author_id' => User::all()->random()['id'],
                'message' => '“Don’t spend more than you earn.” That was the whole lesson.',
                'share_count' => 1,
            ],
            [
                'post_id' => 8,
                'author_id' => User::all()->random()['id'],
                'message' => 'Lelouch carried the show with just his eyes.',
                'share_count' => 3,
            ],
            [
                'post_id' => 8,
                'author_id' => User::all()->random()['id'],
                'message' => 'It’s the constant 4D chess that kept me hooked.',
                'share_count' => 2,
            ],
            [
                'post_id' => 9,
                'author_id' => User::all()->random()['id'],
                'message' => 'I use a time-block app. Helps me remember to eat.',
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
                'message' => 'Ghibli hits you in the soul, Shinkai hits you in the heart.',
                'share_count' => 3,
            ],
            [
                'post_id' => 10,
                'author_id' => User::all()->random()['id'],
                'message' => 'Makoto Shinkai’s weather scenes are more emotional than most dialogue.',
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
                'message' => 'I bought a Tamagotchi for my niece… and now I’m the one raising it.',
                'share_count' => 1,
            ],
            [
                'post_id' => 12,
                'author_id' => User::all()->random()['id'],
                'message' => 'Season 2 was brave. No shounen action, just pure growth.',
                'share_count' => 4,
            ],
            [
                'post_id' => 12,
                'author_id' => User::all()->random()['id'],
                'message' => 'Can’t lie, I missed the battles… but Thorfinn’s arc? Chef’s kiss.',
                'share_count' => 2,
            ],
            [
                'post_id' => 13,
                'author_id' => User::all()->random()['id'],
                'message' => 'Ginger tea with honey cures everything. Maybe even heartbreak.',
                'share_count' => 1,
            ],
            [
                'post_id' => 13,
                'author_id' => User::all()->random()['id'],
                'message' => 'Saltwater gargle still my go-to for sore throat.',
                'share_count' => 1,
            ],
            [
                'post_id' => 14,
                'author_id' => User::all()->random()['id'],
                'message' => 'Gundam 00, Eureka Seven, and Gurren Lagann. That’s my trinity.',
                'share_count' => 3,
            ],
            [
                'post_id' => 14,
                'author_id' => User::all()->random()['id'],
                'message' => 'Big O was underrated. Noir + mech? Yes, please.',
                'share_count' => 2,
            ],
            [
                'post_id' => 15,
                'author_id' => User::all()->random()['id'],
                'message' => 'Less stuff, less stress. Minimalism helped me breathe again.',
                'share_count' => 1,
            ],
            [
                'post_id' => 15,
                'author_id' => User::all()->random()['id'],
                'message' => 'Honestly, I started because of TikTok. Stayed because my apartment feels peaceful.',
                'share_count' => 1,
            ],
            [
                'post_id' => 16,
                'author_id' => User::all()->random()['id'],
                'message' => 'Kino’s Journey made me rethink how I see the world. Every episode’s a parable.',
                'share_count' => 2,
            ],
            [
                'post_id' => 16,
                'author_id' => User::all()->random()['id'],
                'message' => '“The world is not beautiful, therefore it is.” Still haunts me.',
                'share_count' => 1,
            ],
            [
                'post_id' => 17,
                'author_id' => User::all()->random()['id'],
                'message' => 'If we don’t invest in art education, we’re setting ourselves up for a grey future.',
                'share_count' => 3,
            ],
            [
                'post_id' => 17,
                'author_id' => User::all()->random()['id'],
                'message' => 'Kids need crayons and clay as much as they need coding.',
                'share_count' => 2,
            ],
            [
                'post_id' => 18,
                'author_id' => User::all()->random()['id'],
                'message' => 'Togashi’s storytelling is leagues above most shounen.',
                'share_count' => 4,
            ],
            [
                'post_id' => 18,
                'author_id' => User::all()->random()['id'],
                'message' => 'Greed Island felt like a whole different anime and I loved it.',
                'share_count' => 2,
            ],
            [
                'post_id' => 19,
                'author_id' => User::all()->random()['id'],
                'message' => 'Local libraries are the backbone of democracy, fr.',
                'share_count' => 1,
            ],
            [
                'post_id' => 19,
                'author_id' => User::all()->random()['id'],
                'message' => 'Shoutout to the librarian who helped me prep for my visa interview.',
                'share_count' => 2,
            ],
            [
                'post_id' => 20,
                'author_id' => User::all()->random()['id'],
                'message' => 'Ozymandias is still the greatest single episode of any show. Period.',
                'share_count' => 3,
            ],
            [
                'post_id' => 20,
                'author_id' => User::all()->random()['id'],
                'message' => 'No filler. Just raw, calculated tension and emotional collapse.',
                'share_count' => 2,
            ],
            [
                'post_id' => 21,
                'author_id' => User::all()->random()['id'],
                'message' => 'I miss the simple online forums. No algorithms, just discussion.',
                'share_count' => 3,
            ],
            [
                'post_id' => 21,
                'author_id' => User::all()->random()['id'],
                'message' => 'Honestly, LiveJournal and DeviantArt were my digital home.',
                'share_count' => 1,
            ],
            [
                'post_id' => 22,
                'author_id' => User::all()->random()['id'],
                'message' => 'Kaguya and Shirogane’s mind games? Literal romcom warfare.',
                'share_count' => 3,
            ],
            [
                'post_id' => 22,
                'author_id' => User::all()->random()['id'],
                'message' => 'Best confession scene ever. Period.',
                'share_count' => 2,
            ],
            [
                'post_id' => 23,
                'author_id' => User::all()->random()['id'],
                'message' => 'Aesthetics aren’t shallow. They’re expressions of values.',
                'share_count' => 1,
            ],
            [
                'post_id' => 23,
                'author_id' => User::all()->random()['id'],
                'message' => 'Minimalist, cozy, brutalist — all legit ways to live your truth.',
                'share_count' => 2,
            ],
            [
                'post_id' => 24,
                'author_id' => User::all()->random()['id'],
                'message' => 'Wotakoi made me feel seen. It’s rare to find adult anime romance this good.',
                'share_count' => 3,
            ],
            [
                'post_id' => 24,
                'author_id' => User::all()->random()['id'],
                'message' => 'Narumi and Hirotaka are OTP material.',
                'share_count' => 1,
            ],
            [
                'post_id' => 25,
                'author_id' => User::all()->random()['id'],
                'message' => 'A single song changed how I view color and mood.',
                'share_count' => 2,
            ],
            [
                'post_id' => 25,
                'author_id' => User::all()->random()['id'],
                'message' => 'Lofi while journaling unlocked new parts of my brain tbh.',
                'share_count' => 1,
            ],
            [
                'post_id' => 26,
                'author_id' => User::all()->random()['id'],
                'message' => 'Evangelion is a masterpiece and a mess. And that’s why it works.',
                'share_count' => 4,
            ],
            [
                'post_id' => 26,
                'author_id' => User::all()->random()['id'],
                'message' => 'It’s not about robots. It’s about trauma in a robot-shaped box.',
                'share_count' => 2,
            ],
            [
                'post_id' => 27,
                'author_id' => User::all()->random()['id'],
                'message' => 'We need to stop pretending “burnout” is just being tired.',
                'share_count' => 3,
            ],
            [
                'post_id' => 27,
                'author_id' => User::all()->random()['id'],
                'message' => 'Normalize saying “no” without guilt.',
                'share_count' => 2,
            ],
            [
                'post_id' => 28,
                'author_id' => User::all()->random()['id'],
                'message' => 'Saiki K is comedic gold. The straight face sells every punchline.',
                'share_count' => 2,
            ],
            [
                'post_id' => 28,
                'author_id' => User::all()->random()['id'],
                'message' => 'His dad being more chaotic than him? Hilarious.',
                'share_count' => 1,
            ],
            [
                'post_id' => 29,
                'author_id' => User::all()->random()['id'],
                'message' => 'Color theory made me understand why I hate certain wallpapers.',
                'share_count' => 2,
            ],
            [
                'post_id' => 29,
                'author_id' => User::all()->random()['id'],
                'message' => 'Warm vs cool lighting has changed my productivity more than coffee.',
                'share_count' => 1,
            ],
            [
                'post_id' => 30,
                'author_id' => User::all()->random()['id'],
                'message' => 'Tatami Galaxy was chaotic brilliance. Took two rewatches to fully get it.',
                'share_count' => 3,
            ],
            [
                'post_id' => 30,
                'author_id' => User::all()->random()['id'],
                'message' => '“The opportunity is always slipping away while I hesitate.” Hit me hard.',
                'share_count' => 2,
            ],
            [
                'post_id' => 31,
                'author_id' => User::all()->random()['id'],
                'message' => 'Not every classic holds up, but you can’t deny their influence.',
                'share_count' => 2,
            ],
            [
                'post_id' => 31,
                'author_id' => User::all()->random()['id'],
                'message' => 'Sometimes older stories say more with less. Respect.',
                'share_count' => 1,
            ],
            [
                'post_id' => 32,
                'author_id' => User::all()->random()['id'],
                'message' => 'I cried at the ending of Violet Evergarden. And I don’t cry easily.',
                'share_count' => 3,
            ],
            [
                'post_id' => 32,
                'author_id' => User::all()->random()['id'],
                'message' => 'The animation alone is art. Kyoto Animation deserves all the love.',
                'share_count' => 2,
            ],
            [
                'post_id' => 33,
                'author_id' => User::all()->random()['id'],
                'message' => 'Nothing wrong with being quiet. The loudest person isn’t always the smartest.',
                'share_count' => 2,
            ],
            [
                'post_id' => 33,
                'author_id' => User::all()->random()['id'],
                'message' => 'Introverts aren’t broken extroverts. Let them be.',
                'share_count' => 1,
            ],
            [
                'post_id' => 34,
                'author_id' => User::all()->random()['id'],
                'message' => 'Mob Psycho’s message about self-worth hit harder than any fight scene.',
                'share_count' => 3,
            ],
            [
                'post_id' => 34,
                'author_id' => User::all()->random()['id'],
                'message' => 'Mob’s growth is one of the best character arcs in anime.',
                'share_count' => 2,
            ],
            [
                'post_id' => 35,
                'author_id' => User::all()->random()['id'],
                'message' => 'I used to feel guilty for resting. Now I schedule it like a meeting.',
                'share_count' => 1,
            ],
            [
                'post_id' => 35,
                'author_id' => User::all()->random()['id'],
                'message' => 'Rest is not a reward, it’s a right.',
                'share_count' => 2,
            ],
            [
                'post_id' => 36,
                'author_id' => User::all()->random()['id'],
                'message' => 'Cyberpunk isn’t just neon and chrome—it’s resistance.',
                'share_count' => 2,
            ],
            [
                'post_id' => 36,
                'author_id' => User::all()->random()['id'],
                'message' => 'Ghost in the Shell predicted so much it’s scary.',
                'share_count' => 1,
            ],
            [
                'post_id' => 37,
                'author_id' => User::all()->random()['id'],
                'message' => 'Art from struggle has a rawness that can’t be faked.',
                'share_count' => 2,
            ],
            [
                'post_id' => 37,
                'author_id' => User::all()->random()['id'],
                'message' => 'Hard times don’t automatically make great art, but they sharpen vision.',
                'share_count' => 1,
            ],
            [
                'post_id' => 38,
                'author_id' => User::all()->random()['id'],
                'message' => 'I could watch Spirited Away a hundred times and still discover something new.',
                'share_count' => 3,
            ],
            [
                'post_id' => 38,
                'author_id' => User::all()->random()['id'],
                'message' => 'Ghibli doesn’t just animate stories—they breathe life into them.',
                'share_count' => 2,
            ],
            [
                'post_id' => 39,
                'author_id' => User::all()->random()['id'],
                'message' => 'Art galleries intimidate me, but I always leave feeling inspired.',
                'share_count' => 2,
            ],
            [
                'post_id' => 39,
                'author_id' => User::all()->random()['id'],
                'message' => 'Sometimes a single painting can say more than a thousand tweets.',
                'share_count' => 1,
            ],
            [
                'post_id' => 40,
                'author_id' => User::all()->random()['id'],
                'message' => 'Ping Pong the Animation was ugly in the best way possible.',
                'share_count' => 2,
            ],
            [
                'post_id' => 40,
                'author_id' => User::all()->random()['id'],
                'message' => 'Every frame was purposefully weird. I respect that boldness.',
                'share_count' => 1,
            ],
            [
                'post_id' => 41,
                'author_id' => User::all()->random()['id'],
                'message' => 'Spending time alone doesn’t mean you’re lonely.',
                'share_count' => 1,
            ],
            [
                'post_id' => 41,
                'author_id' => User::all()->random()['id'],
                'message' => 'Some of my best memories are solo café visits and quiet walks.',
                'share_count' => 1,
            ],
            [
                'post_id' => 42,
                'author_id' => User::all()->random()['id'],
                'message' => 'Made in Abyss destroyed me emotionally—and I still recommend it to everyone.',
                'share_count' => 3,
            ],
            [
                'post_id' => 42,
                'author_id' => User::all()->random()['id'],
                'message' => 'Don’t let the cute art fool you. This series is DARK.',
                'share_count' => 2,
            ],
            [
                'post_id' => 43,
                'author_id' => User::all()->random()['id'],
                'message' => 'Not everyone’s an artist, but everyone has the capacity to create.',
                'share_count' => 2,
            ],
            [
                'post_id' => 43,
                'author_id' => User::all()->random()['id'],
                'message' => 'We need more safe spaces to try and fail creatively.',
                'share_count' => 1,
            ],
            [
                'post_id' => 44,
                'author_id' => User::all()->random()['id'],
                'message' => 'March Comes in Like a Lion made me want to try shogi—and heal my inner wounds.',
                'share_count' => 3,
            ],
            [
                'post_id' => 44,
                'author_id' => User::all()->random()['id'],
                'message' => 'The animation feels like a warm blanket and a gut punch at the same time.',
                'share_count' => 2,
            ],
            [
                'post_id' => 45,
                'author_id' => User::all()->random()['id'],
                'message' => 'The value of aesthetics is deeply personal. It’s okay to just like pretty things.',
                'share_count' => 1,
            ],
            [
                'post_id' => 45,
                'author_id' => User::all()->random()['id'],
                'message' => 'Not everything has to be deep. Aesthetic joy is reason enough.',
                'share_count' => 2,
            ],
            [
                'post_id' => 46,
                'author_id' => User::all()->random()['id'],
                'message' => 'Shinsekai Yori still lives rent-free in my brain. That world-building was unmatched.',
                'share_count' => 3,
            ],
            [
                'post_id' => 46,
                'author_id' => User::all()->random()['id'],
                'message' => 'I need more anime that challenge me the way this one did.',
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
    }
}
