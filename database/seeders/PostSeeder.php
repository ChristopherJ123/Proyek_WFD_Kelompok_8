<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'topic_id' => 1,
                'author_id' => 1,
                'title' => 'What makes medieval feudalism so appealing in fantasy settings?',
                'description' => 'I’ve noticed many fantasy games and stories lean into feudal structures. Is it the drama, the hierarchy, or the knights? What do you all think?',
                'share_count' => 18,
                // created_at sama updated_at pakai factory buat di randomkan biar gak sama semua tlg marco
            ],
            [
                'topic_id' => 2,
                'author_id' => 2,
                'title' => 'Why Frieren is a masterpiece in slow-paced storytelling',
                'description' => 'Just finished episode 20 and I’m in awe. The quiet depth, the emotional beats… this series is something special. Anyone else feel the same?',
                'share_count' => 29,
            ],
            [
                'topic_id' => 3,
                'author_id' => 3,
                'title' => 'What are your go-to 15-minute meals that don’t feel like fast food?',
                'description' => 'I’m trying to cut down on takeout. Would love to see some quick, healthy, and genuinely satisfying meals the community enjoys.',
                'share_count' => 21,
            ],
            [
                'topic_id' => 4,
                'author_id' => 4,
                'title' => 'Which ultraman do you think is the strongest?',
                'description' => 'My guess would be ultraman Noa, but King and Legend seems just as strong',
                'share_count' => 13,
            ],
            [
                'topic_id' => 5,
                'author_id' => 5,
                'title' => 'is Python the best programing language to learn for begginers?',
                'description' => 'I am trying to learn programming and tbh idk where to start, should i start with learning python?',
                'share_count' => 17,
            ],
            [
                'topic_id' => 6,
                'author_id' => 6,
                'title' => 'Do you think Minimalist living can help save up money?',
                'description' => 'I am quite intrested in doing it, ngl I have been buying to much games anyway to save up money is good',
                'share_count' => 26,
            ],
            [
                'topic_id' => 7,
                'author_id' => 7,
                'title' => 'How did your parents shape your healthy habist?',
                'description' => 'Let’s talk upbringing and family. What lessons (or traumas 😅) did your household living habits leave you with?',
                'share_count' => 20,
            ],
            [
                'topic_id' => 8,
                'author_id' => 8,
                'title' => 'I finally landed my first relationship, anything I should know?',
                'description' => 'Me and my gf just started going out with each other and this is our first relationship, do you guys have any advice on how to make this last?',
                'share_count' => 31,
            ],
            [
                'topic_id' => 9,
                'author_id' => 9,
                'title' => 'Let’s talk about daily digital time — how do you manage your digital time?',
                'description' => 'Between work, news, and social media, how do you structure your screen time without losing your mind?',
                'share_count' => 15,
            ],
            [
                'topic_id' => 10,
                'author_id' => 10,
                'title' => 'Just got my first house, what should i have in my bedrooom? ',
                'description' => 'Foor some info the room is about 52 square meter and it got no windows (it is actually underground)',
                'share_count' => 28,
            ],
            [
                'topic_id' => 11,
                'author_id' => 11,
                'title' => 'What’s fashion trend from your childhood that’s made a comeback?',
                'description' => 'me personally i have been seing more flared jeans lately. What fashion trend have you seen lately that gave you déjà vu?',
                'share_count' => 14,
            ],
            [
                'topic_id' => 12,
                'author_id' => 12,
                'title' => 'what self care routines should i start when i first start college?',
                'description' => 'So in 2 months i will start my first class in college and ngl I am really scared and since I failed to get into my first choice college, I am kinda depressed lately what should i do to take care of myself?',
                'share_count' => 33,
            ],
            [
                'topic_id' => 13,
                'author_id' => 13,
                'title' => 'Your favorite boomer productivity hacks that actually work?',
                'description' => 'Old wives’ tales or not — some of these hacks just *work*. Share the ones that have stood the test of time.',
                'share_count' => 19,
            ],
            [
                'topic_id' => 14,
                'author_id' => 14,
                'title' => 'Ranking all star wars movies — which is best and why?',
                'description' => 'I’m compiling a list for my blog. Give me your best star wars movie and your reasons. Let the debate begin!',
                'share_count' => 37,
            ],
            [
                'topic_id' => 15,
                'author_id' => 15,
                'title' => 'is the MCU burning out?',
                'description' => 'tbh I didn’t even bother watching thunderbolt all of their movies these past few years after end game sucks, is this the end for marvel? ',
                'share_count' => 22,
            ],
            [
                'topic_id' => 16,
                'author_id' => 16,
                'title' => 'Favourite Stranger Things character?',
                'description' => 'title don’t feel like I need to expalain much',
                'share_count' => 20,
            ],
            [
                'topic_id' => 17,
                'author_id' => 17,
                'title' => 'The Office: Overrated or the perfect comedy?',
                'description' => 'It’s widely debated as either a masterpiece of comedy shows or a bloated unfunny show for millenials. Where do you stand?',
                'share_count' => 34,
            ],
            [
                'topic_id' => 18,
                'author_id' => 18,
                'title' => 'When do you think hank became irredeemable?',
                'description' => 'I mean he used to be just a dad trying to provide for his family after he’s gone, he used to be good, when do you think that just stops?',
                'share_count' => 15,
            ],
            [
                'topic_id' => 19,
                'author_id' => 19,
                'title' => 'Most iconic scene in GOT?',
                'description' => 'my choice would be the red wedding, I mean it was just so brutal',
                'share_count' => 41,
            ],
            [
                'topic_id' => 20,
                'author_id' => 20,
                'title' => 'the armor of rohan is so good looking it’s crazy ',
                'description' => 'I mean just look at them, it look so beautiful man, you can tell they’re based on the anglo saxon ',
                'share_count' => 17,
            ],
            [
                'topic_id' => 21,
                'author_id' => 21,
                'title' => 'best up and coming kpop group?',
                'description' => 'men or women group idc as long as they’re talented, any reccomendations?',
                'share_count' => 28,
            ],
            [
                'topic_id' => 22,
                'author_id' => 22,
                'title' => 'Know anyone who’s basically absent from pop culture and the like? how are they irl?',
                'description' => 'ngl I’am way to addicted to pop culture and the like, how would someone is absent from it live?',
                'share_count' => 23,
            ],
            [
                'topic_id' => 23,
                'author_id' => 23,
                'title' => 'do you think award shows are pointless?',
                'description' => 'I’ll be honest most award shows sucks, they’re clearly biased againts some genres (2d animation for example)',
                'share_count' => 39,
            ],
            [
                'topic_id' => 24,
                'author_id' => 24,
                'title' => 'best waifu of naruto?',
                'description' => 'hinata, sakura, inno, etc etc?',
                'share_count' => 18,
            ],
            [
                'topic_id' => 25,
                'author_id' => 25,
                'title' => 'is the The Marineford Arc really the best one piece arc there is?',
                'description' => 'I have watched 5 episoded from this arc in the anime and ngl...I don’t see what’s so special about it, is this really the best arc in one piece.',
                'share_count' => 25,
            ],
            [
                'topic_id' => 26,
                'author_id' => 26,
                'title' => 'Why is AOT still relevant today?',
                'description' => 'I mean people really hated the ending i thought for sure the AOT legacy would be destroyed but right now it’s still really beloved and relevant why is that?',
                'share_count' => 20,
            ],
            [
                'topic_id' => 27,
                'author_id' => 27,
                'title' => 'IDK why but the spongebob world seems incredibly immersive to me and like i said i really don’t know why......',
                'description' => 'Is it the lore, the maps, the music? I honestly don’t know but hey I am enjoying it.',
                'share_count' => 33,
            ],
            [
                'topic_id' => 28,
                'author_id' => 28,
                'title' => 'am I crazy or did katara and zuko actually have chemistry?',
                'description' => 'I am now the only one thingking this right? I mean it almost seems like the show was pushing them as a couple',
                'share_count' => 24,
            ],
            [
                'topic_id' => 29,
                'author_id' => 29,
                'title' => 'Is the manga ending for demon slayer really that bad',
                'description' => 'I am an anime only but man an old friend of mine keep complaing on how I should drop it and that the manga ending was so horrible, is it really that bad?',
                'share_count' => 27,
            ],
            [
                'topic_id' => 30,
                'author_id' => 30,
                'title' => 'Adventure Time is the GOAT of 2010s cartoon. can’t change my mind?',
                'description' => 'gumball who? steven universe who? regular show who? ADVENTURE TIME IS THE GOAT OF ALL TIME FRFR',
                'share_count' => 30,
            ],
            [
                'topic_id' => 31,
                'author_id' => 31,
                'title' => 'What makes bojack horseman so relatable? tbh i can’t see it',
                'description' => 'people online keep saying of how amazing of a show it is because of how relatable it is, ngl i can’t see it what so relatable about a horny horse celebrity cartoon?',
                'share_count' => 22,
            ],
            [
                'topic_id' => 32,
                'author_id' => 32,
                'title' => 'What’s your comfort ghibli move and why?',
                'description' => 'The one you go back to when life feels chaotic. Could be childhood nostalgia or a timeless message. mine kiki’s delivery service',
                'share_count' => 19,
            ],
            [
                'topic_id' => 33,
                'author_id' => 33,
                'title' => 'the best indie animation out right now?',
                'description' => 'right now it’s basically the era of indie animation, which do you think is the best indie animated show out rn?',
                'share_count' => 27,
            ],
            [
                'topic_id' => 34,
                'author_id' => 34,
                'title' => 'How hard is rocket science really?',
                'description' => 'I mean it’s gotta be really hard but how hard is it compared to let say medical school?',
                'share_count' => 36,
            ],
            [
                'topic_id' => 35,
                'author_id' => 35,
                'title' => 'what programming concept do you think is most crucial for a beginner to master asap?',
                'description' => 'wanting to learn programming rn, what programming concept is basically the most crucial yet basic thing for me to learn?',
                'share_count' => 31,
            ],
            [
                'topic_id' => 36,
                'author_id' => 36,
                'title' => 'What is the easily the most misunderstood part of medieval history',
                'description' => 'So many people misunderstood so many things from the medieval ages from the inquisition to something like bathing what do you think is the worst misconception?',
                'share_count' => 29,
            ],
            [
                'topic_id' => 37,
                'author_id' => 37,
                'title' => 'What is a dinosaur you wish more people cared about?',
                'description' => 'my choice is the Therizinosaurus, you guys probably don’t know what dinosaur that is, exactly my point',
                'share_count' => 21,
            ],
            [
                'topic_id' => 38,
                'author_id' => 38,
                'title' => 'is it a good idea to learn quantum physic as a 9 YO?',
                'description' => 'hello I am 9 YO and i want to learn quantum physic, do you think i can do it?',
                'share_count' => 24,
            ],
            [
                'topic_id' => 39,
                'author_id' => 39,
                'title' => 'Which anime character’s growth arc felt the most real?',
                'description' => 'Some characters go through genuine change. Who had the most satisfying development?',
                'share_count' => 32,
            ],
            [
                'topic_id' => 40,
                'author_id' => 40,
                'title' => 'What philosophy book that changed how you see the world?',
                'description' => 'something that challenged your worldview, mine is this indonesian book called filosofi teras',
                'share_count' => 28,
            ],
            [
                'topic_id' => 41,
                'author_id' => 41,
                'title' => 'What’s the religion with the most beautiful architecture?',
                'description' => 'obviously this is subjective and basically all of them have beautiful architecture, but man something different about Catholic’s Cathedrals bruh they beautiful frfr',
                'share_count' => 19,
            ],
            [
                'topic_id' => 42,
                'author_id' => 42,
                'title' => 'Are online courses worth the time?',
                'description' => ' Have they actually helped you learn a new language — or meh?',
                'share_count' => 25,
            ],
            [
                'topic_id' => 43,
                'author_id' => 43,
                'title' => 'What makes a college community space feel welcoming to you?',
                'description' => 'i wanna join a community in my campus, got any advice?',
                'share_count' => 23,
            ],
            [
                'topic_id' => 44,
                'author_id' => 44,
                'title' => 'What do you think about what is happening in world rn?',
                'description' => 'Seems right everywhere in the world is a mess rn what do you think about the state of it all — and why?',
                'share_count' => 34,
            ],
            [
                'topic_id' => 45,
                'author_id' => 45,
                'title' => 'what local issue do you think is being ignored in your country?',
                'description' => 'I mean a ton of issue seems to be ignored by the goverment because the issue is more local, what is this issue in your country',
                'share_count' => 26,
            ],
            [
                'topic_id' => 46,
                'author_id' => 46,
                'title' => 'What piece of media changed the way you think about the law?',
                'description' => 'Could be a book, film, series, or podcast — something that shifted your perspective for good.',
                'share_count' => 30,
            ],
            [
                'topic_id' => 47,
                'author_id' => User::all()->random()->id,
                'title' => 'What Are the Key Issues in This Election Season?',
                'description' => 'Let\'s discuss the most pressing matters influencing voters right now.',
                'share_count' => rand(5, 100),
            ],
            [
                'topic_id' => 48,
                'author_id' => User::all()->random()->id,
                'title' => 'How to Identify Fake News in 2025?',
                'description' => 'Tips and tools for navigating biased or misleading information.',
                'share_count' => rand(5, 100),
            ],
            [
                'topic_id' => 49,
                'author_id' => User::all()->random()->id,
                'title' => 'Latest Developments in Global Conflict Zones',
                'description' => 'Post your updates or insights about conflict regions around the world.',
                'share_count' => rand(5, 100),
            ],
            [
                'topic_id' => 50,
                'author_id' => User::all()->random()->id,
                'title' => 'Economic Impacts of Trade Wars',
                'description' => 'How are international policies affecting our economy?',
                'share_count' => rand(5, 100),
            ],
            [
                'topic_id' => 51,
                'author_id' => User::all()->random()->id,
                'title' => 'Understanding Modern Human Rights Movements',
                'description' => 'A place to explore ongoing campaigns and legal reforms.',
                'share_count' => rand(5, 100),
            ],
            [
                'topic_id' => 1,
                'author_id' => User::all()->random()->id,
                'title' => 'What is history really for?',
                'description' => 'Is it to learn or just remember?',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 2,
                'author_id' => User::all()->random()->id,
                'title' => 'Why is Frieren so relatable?',
                'description' => 'Even though she’s immortal, she feels real.',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 3,
                'author_id' => User::all()->random()->id,
                'title' => 'When do you cook during college?',
                'description' => 'Morning, night, or just weekend bulk meals?',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 4,
                'author_id' => User::all()->random()->id,
                'title' => 'Where can I watch old Ultraman episodes?',
                'description' => 'Streaming or DVD? I need that nostalgia!',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 5,
                'author_id' => User::all()->random()->id,
                'title' => 'How did you learn Laravel fast?',
                'description' => 'Tips for a beginner trying to build fast.',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 6,
                'author_id' => User::all()->random()->id,
                'title' => 'What’s your daily declutter habit?',
                'description' => 'I’m starting with 5 minutes a day.',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 7,
                'author_id' => User::all()->random()->id,
                'title' => 'Why does a morning walk help so much?',
                'description' => 'Clear mind, better mood, every time.',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 8,
                'author_id' => User::all()->random()->id,
                'title' => 'When is long-distance worth it?',
                'description' => 'Let’s be honest: does it work?',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 9,
                'author_id' => User::all()->random()->id,
                'title' => 'Where do you plan your week?',
                'description' => 'Notion, Google Calendar, or paper?',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 10,
                'author_id' => User::all()->random()->id,
                'title' => 'How do I decorate on a budget?',
                'description' => 'Room still feels empty as a student.',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 11,
                'author_id' => User::all()->random()->id,
                'title' => 'What makes fashion “cool” to you?',
                'description' => 'Brand? Fit? Personality?',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 12,
                'author_id' => User::all()->random()->id,
                'title' => 'Why do we skip self-care when stressed?',
                'description' => 'Shouldn’t it be the opposite?',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 13,
                'author_id' => User::all()->random()->id,
                'title' => 'When are you most productive?',
                'description' => 'Late night, early morning, or mid-day burst?',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 14,
                'author_id' => User::all()->random()->id,
                'title' => 'Where did The Last Jedi go wrong?',
                'description' => 'Plot, characters, tone, or just timing?',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 15,
                'author_id' => User::all()->random()->id,
                'title' => 'How will Secret Wars change the MCU?',
                'description' => 'Multiverse reset? Final chapter?',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 16,
                'author_id' => User::all()->random()->id,
                'title' => 'What’s your fav Stranger Things moment?',
                'description' => 'I can’t pick between season 1 and 4.',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 17,
                'author_id' => User::all()->random()->id,
                'title' => 'Why is Dwight so iconic?',
                'description' => 'Is it the quotes or the chaos?',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 18,
                'author_id' => User::all()->random()->id,
                'title' => 'When did Walt truly break bad?',
                'description' => 'What was the turning point for you?',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 19,
                'author_id' => User::all()->random()->id,
                'title' => 'Where would a Thrones sequel even start?',
                'description' => 'Arya’s journey? Rebuilding Westeros?',
                'share_count' => rand(0, 30),
            ],
            [
                'topic_id' => 20,
                'author_id' => User::all()->random()->id,
                'title' => 'How strong is Sam’s loyalty?',
                'description' => 'Would you have made it that far for Frodo?',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 21,
                'title' => 'Who’s your favorite K-Pop group right now?',
                'description' => 'I’m torn between NewJeans and Aespa. Their latest comebacks have been amazing!',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 22,
                'title' => 'What’s trending this week?',
                'description' => 'Let’s gather the most viral moments and memes from this week!',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 23,
                'title' => 'Oscar snubs that still bother you',
                'description' => 'What actor or movie deserved an Oscar but didn’t win?',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 24,
                'title' => 'Saddest moment in Naruto?',
                'description' => 'Mine was Jiraiya’s death. What about yours?',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 25,
                'title' => 'One Piece live-action thoughts?',
                'description' => 'What did you think of the casting and the tone?',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 26,
                'title' => 'Eren: Hero or Villain?',
                'description' => 'The final arc left a lot to unpack.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 27,
                'title' => 'Funniest Spongebob quote?',
                'description' => '“I’m ugly and I’m proud.” gets me every time.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 28,
                'title' => 'Zuko’s character development is elite',
                'description' => 'Anyone else tear up during his apology to Uncle Iroh?',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 29,
                'title' => 'Best Hashira fight?',
                'description' => 'Personally, Rengoku vs Akaza takes the cake.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 30,
                'title' => 'Adventure Time episodes that hit deep',
                'description' => 'This show went from silly to philosophical real fast.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 31,
                'title' => 'BoJack Horseman and mental health',
                'description' => 'This show really portrayed depression in a real and raw way.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 32,
                'title' => 'Favorite Studio Ghibli movie?',
                'description' => 'For me, it’s *Spirited Away*. What about you?',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 33,
                'title' => 'Best indie animated film you’ve seen?',
                'description' => 'Loving “Wolfwalkers” and “Song of the Sea” recently.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 34,
                'title' => 'How do rockets escape Earth’s gravity?',
                'description' => 'Let’s discuss thrust, velocity, and escape trajectories.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 35,
                'title' => 'What is polymorphism in OOP?',
                'description' => 'Explain like I’m five!',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 36,
                'title' => 'Favorite medieval castle and why?',
                'description' => 'I’m fascinated by Neuschwanstein Castle. What about you?',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 37,
                'title' => 'Coolest fossil you’ve ever seen?',
                'description' => 'I saw a full Triceratops skull at a museum once!',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 38,
                'title' => 'Quantum superposition explained simply?',
                'description' => 'Can anyone explain this without invoking Schrödinger’s cat?',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 39,
                'title' => 'Best documentaries on climate change?',
                'description' => '*Before the Flood* and *Our Planet* are my top picks.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 40,
                'title' => 'Which philosopher influenced you the most?',
                'description' => 'Stoicism has been life-changing for me.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 41,
                'title' => 'Most peaceful world religion?',
                'description' => 'Let’s share insights from various faiths.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 42,
                'title' => 'Best way to learn a new language?',
                'description' => 'Immersion or apps like Duolingo? What worked for you?',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 43,
                'title' => 'College tip that saved your semester?',
                'description' => 'Mine was discovering Pomodoro and Notion!',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 44,
                'title' => 'Most pressing issue in global news?',
                'description' => 'Let’s keep it respectful and insightful.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 45,
                'title' => 'What’s a local issue you care about?',
                'description' => 'Let’s raise awareness and discuss solutions.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 46,
                'title' => 'Law or policy that needs changing?',
                'description' => 'Mine is around housing and zoning reform.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 47,
                'title' => 'Which election are you closely watching?',
                'description' => 'Let’s analyze the platforms and candidates.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 48,
                'title' => 'How do you verify news online?',
                'description' => 'Share your fact-checking methods and tools.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 49,
                'title' => 'What’s happening in [conflict region] right now?',
                'description' => 'Let’s keep it informative and sensitive.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 50,
                'title' => 'How does inflation affect politics?',
                'description' => 'Interesting to see how governments respond.',
                'share_count' => rand(0, 30),
            ],
            [
                'author_id' => User::all()->random()->id,
                'topic_id' => 51,
                'title' => 'Which human rights issue needs more spotlight?',
                'description' => 'Let’s bring awareness to global causes.',
                'share_count' => rand(0, 30),
            ],
        ];

        foreach ($posts as &$post) {
            $created = fake()->dateTimeBetween(startDate: '-2 years');
            $post['created_at'] = $created;
            $post['updated_at'] = $created;
        }

        Post::upsert($posts, uniqueBy: 'id');
    }
}
