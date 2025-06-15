<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('topic_rules')->insert([
            // Topic ID 1 - Medieval
            [
                'topic_id' => 1,
                'order' => 1,
                'title' => 'Respect historical context',
                'description' => 'Please stay grounded in real medieval history and avoid modern reinterpretations.',
            ],
            [
                'topic_id' => 1,
                'order' => 2,
                'title' => 'No fantasy unless specified',
                'description' => 'Fantasy discussions are allowed only if clearly marked as such.',
            ],

            // Topic ID 2 - Frieren
            [
                'topic_id' => 2,
                'order' => 1,
                'title' => 'Spoiler policy',
                'description' => 'Use spoiler tags for anything beyond the latest anime episode or chapter.',
            ],
            [
                'topic_id' => 2,
                'order' => 2,
                'title' => 'Stay on topic',
                'description' => 'This is for Frieren discussion only. Please take unrelated series elsewhere.',
            ],

            // Topic ID 3 - Cooking
            [
                'topic_id' => 3,
                'order' => 1,
                'title' => 'Use clear measurements',
                'description' => 'Recipes must include clear units (e.g. grams, ml, tsp).',
            ],
            [
                'topic_id' => 3,
                'order' => 2,
                'title' => 'Constructive feedback only',
                'description' => 'Be respectful and helpful when commenting on others’ recipes or techniques.',
            ],

            // Topic ID 4 - Ultramen
            [
                'topic_id' => 4,
                'order' => 1,
                'title' => 'Stick to Ultramen lore',
                'description' => 'Keep theories grounded in canon unless labeled as fan theory.',
            ],
            [
                'topic_id' => 4,
                'order' => 1,
                'title' => 'no weird versus without good descriptions',
                'description' => 'no would ultraman won againts *insert character* without description of the power of that character',
            ],

            // Topic ID 5 - Programming
            [
                'topic_id' => 5,
                'order' => 1,
                'title' => 'Share your code clearly',
                'description' => 'Use formatting when posting code snippets.',
            ],
            [
                'topic_id' => 5,
                'order' => 2,
                'title' => 'Be language-agnostic',
                'description' => 'No bashing of languages, respect each coder’s tool of choice.',
            ],

            // Topic ID 6 - Minimalist Living
            [
                'topic_id' => 6,
                'order' => 1,
                'title' => 'No consumerism promotion',
                'description' => 'Avoid sharing content that contradicts minimalist values, like excessive shopping hauls.',
            ],
            [
                'topic_id' => 6,
                'order' => 2,
                'title' => 'Respect personal lifestyle choices',
                'description' => 'Minimalism looks different for everyone—don’t shame others for their version.',
            ],

            // Topic ID 7 - Healthy Habits
            [
                'topic_id' => 7,
                'order' => 1,
                'title' => 'No medical misinformation',
                'description' => 'Do not share unverified health advice or “miracle cures.”',
            ],
            [
                'topic_id' => 7,
                'order' => 2,
                'title' => 'Encourage, don’t pressure',
                'description' => 'Avoid guilt-tripping others about their current habits or progress.',
            ],

            // Topic ID 8 - Relationship Advice
            [
                'topic_id' => 8,
                'order' => 1,
                'title' => 'Keep it respectful and safe',
                'description' => 'Do not promote toxic behavior or unsafe relationship dynamics.',
            ],
            [
                'topic_id' => 8,
                'order' => 2,
                'title' => 'Avoid judging personal stories',
                'description' => 'Offer advice with empathy, not harshness or ridicule.',
            ],

            // Topic ID 9 - Time Management
            [
                'topic_id' => 9,
                'order' => 1,
                'title' => 'Stay on-topic with productivity',
                'description' => 'Keep posts related to tools, methods, and motivation—not general life rants.',
            ],
            [
                'topic_id' => 9,
                'order' => 2,
                'title' => 'No toxic hustle culture',
                'description' => 'Promote balance and well-being, not burnout or unrealistic expectations.',
            ],


            // Topic ID 10 - Interior Design
            [
                'topic_id' => 10,
                'order' => 1,
                'title' => 'Post sources for designs',
                'description' => 'Include links or references for any inspiration or design images shared.',
            ],
            [
                'topic_id' => 10,
                'order' => 2,
                'title' => 'Respect all styles',
                'description' => 'Minimalist, maximalist, vintage—every style is welcome.',
            ],

            // Topic ID 11 - Fashion Trends
            [
                'topic_id' => 11,
                'order' => 1,
                'title' => 'No body shaming',
                'description' => 'Comments must be kind and inclusive, regardless of personal style.',
            ],
            [
                'topic_id' => 11,
                'order' => 2,
                'title' => 'Label current vs. retro',
                'description' => 'When posting, clarify if a trend is current or from past decades.',
            ],

            // Topic ID 12 - Self-Care Routines
            [
                'topic_id' => 12,
                'order' => 1,
                'title' => 'No medical advice',
                'description' => 'Share personal experiences only; avoid acting as a health professional.',
            ],
            [
                'topic_id' => 12,
                'order' => 2,
                'title' => 'Respect emotional space',
                'description' => 'Be sensitive and supportive when replying to personal stories.',
            ],

            // Topic ID 13 - Productivity Hacks
            [
                'topic_id' => 13,
                'order' => 1,
                'title' => 'Share what works for you',
                'description' => 'Explain how your hack improves focus or output.',
            ],
            [
                'topic_id' => 13,
                'order' => 2,
                'title' => 'Avoid burnout culture',
                'description' => 'Promote balanced productivity—not overwork.',
            ],

            // Topic ID 14 - Star Wars
            [
                'topic_id' => 14,
                'order' => 1,
                'title' => 'Separate canon and legends',
                'description' => 'Make it clear whether you’re referencing official canon or Legends material.',
            ],
            [
                'topic_id' => 14,
                'order' => 2,
                'title' => 'No trilogy bashing',
                'description' => 'Respect fans of all Star Wars eras—even if you have your favorites.',
            ],

            // Topic ID 15 - Marvel Cinematic Universe
            [
                'topic_id' => 15,
                'order' => 1,
                'title' => 'Spoiler etiquette',
                'description' => 'Wait at least 2 weeks after release before discussing openly.',
            ],
            [
                'topic_id' => 15,
                'order' => 2,
                'title' => 'No actor harassment',
                'description' => 'Avoid personal attacks on MCU cast members, even in criticism.',
            ],

            // Topic ID 16 - Stranger Things
            [
                'topic_id' => 16,
                'order' => 1,
                'title' => 'Respect the timeline',
                'description' => 'Try to organize posts by season for clarity.',
            ],
            [
                'topic_id' => 16,
                'order' => 2,
                'title' => 'Conspiracy theories allowed (within reason)',
                'description' => 'Fan theories are welcome—just tag them as such.',
            ],

            // Topic ID 17 - The Office
            [
                'topic_id' => 17,
                'order' => 1,
                'title' => 'Mark NSFW jokes',
                'description' => 'Some episodes or quotes may not be workplace friendly—tag appropriately.',
            ],
            [
                'topic_id' => 17,
                'order' => 2,
                'title' => 'No real-life workplace comparisons',
                'description' => 'Keep the fun inside Dunder Mifflin—not your actual boss.',
            ],

            // Topic ID 18 - Breaking Bad
            [
                'topic_id' => 18,
                'order' => 1,
                'title' => 'Trigger warnings encouraged',
                'description' => 'Flag discussions involving drugs, violence, or death.',
            ],
            [
                'topic_id' => 18,
                'order' => 2,
                'title' => 'Avoid glorifying crime',
                'description' => 'Appreciate the story, not the illegal actions.',
            ],

            // Topic ID 19 - Game of Thrones
            [
                'topic_id' => 19,
                'order' => 1,
                'title' => 'Spoilers need tags',
                'description' => 'Even for older episodes, spoiler tagging is respectful.',
            ],
            [
                'topic_id' => 19,
                'order' => 2,
                'title' => 'No finale shaming',
                'description' => 'Mixed feelings are okay—don’t attack others for liking/disliking the ending.',
            ],

            // Topic ID 20 - Lord of the Rings
            [
                'topic_id' => 20,
                'order' => 1,
                'title' => 'Distinguish book vs movie',
                'description' => 'Mention whether your post is referring to Tolkien’s writing or the films.',
            ],
            [
                'topic_id' => 20,
                'order' => 2,
                'title' => 'Respect the lore',
                'description' => 'Stay true to the tone and legacy of Middle-earth.',
            ],

            // Topic ID 21 - Kpop Central
            [
                'topic_id' => 21,
                'order' => 1,
                'title' => 'No fan wars',
                'description' => 'Support your group, but don’t tear others down.',
            ],
            [
                'topic_id' => 21,
                'order' => 2,
                'title' => 'Credible sources only',
                'description' => 'All news and rumors must include proper sources.',
            ],

            // Topic ID 22 - Pop Culture Watch
            [
                'topic_id' => 22,
                'order' => 1,
                'title' => 'Be respectful of opinions',
                'description' => 'Disagree respectfully—pop culture is subjective.',
            ],
            [
                'topic_id' => 22,
                'order' => 2,
                'title' => 'Mark spoilers',
                'description' => 'If discussing recent content, use spoiler tags for at least 2 weeks.',
            ],

            // Topic ID 23 - Award Show Discussion
            [
                'topic_id' => 23,
                'order' => 1,
                'title' => 'No celebrity bashing',
                'description' => 'Critique performances, not people.',
            ],
            [
                'topic_id' => 23,
                'order' => 2,
                'title' => 'Use live discussion threads',
                'description' => 'During live shows, post comments in designated live threads.',
            ],

            // Topic ID 24 - Naruto
            [
                'topic_id' => 24,
                'order' => 1,
                'title' => 'Spoilers for Boruto go under tags',
                'description' => 'Respect anime-only fans by tagging Boruto spoilers.',
            ],
            [
                'topic_id' => 24,
                'order' => 2,
                'title' => 'Respect all characters',
                'description' => 'Healthy debates are welcome—no hate toward fans of specific characters.',
            ],

            // Topic ID 25 - One Piece
            [
                'topic_id' => 25,
                'order' => 1,
                'title' => 'No manga spoilers in anime threads',
                'description' => 'Keep manga-only discussion in spoiler-marked posts.',
            ],
            [
                'topic_id' => 25,
                'order' => 2,
                'title' => 'Theories must be tagged',
                'description' => 'Fan theories are great—just label them as speculation.',
            ],

            // Topic ID 26 - Attack on Titan
            [
                'topic_id' => 26,
                'order' => 1,
                'title' => 'Separate manga and anime posts',
                'description' => 'Always clarify if your post relates to manga or anime.',
            ],
            [
                'topic_id' => 26,
                'order' => 2,
                'title' => 'Use trigger warnings',
                'description' => 'Discussions involving violence or trauma themes must be tagged.',
            ],

            // Topic ID 27 - Spongebob Squarepants
            [
                'topic_id' => 27,
                'order' => 1,
                'title' => 'Keep it fun and light',
                'description' => 'This space is for laughs and nostalgia, not serious debate.',
            ],
            [
                'topic_id' => 27,
                'order' => 2,
                'title' => 'Use episode titles or screenshots',
                'description' => 'Help others join the joke by referencing the specific moment.',
            ],

            // Topic ID 28 - Avatar: The Last Airbender
            [
                'topic_id' => 28,
                'order' => 1,
                'title' => 'No live-action hate posts',
                'description' => 'Critiques are fine, but avoid unproductive bashing.',
            ],
            [
                'topic_id' => 28,
                'order' => 2,
                'title' => 'Balance lore and fun',
                'description' => 'Deep discussions are welcome—so are memes. Just label appropriately.',
            ],

            // Topic ID 29 - Demon Slayer
            [
                'topic_id' => 29,
                'order' => 1,
                'title' => 'Tag manga content',
                'description' => 'Don’t spoil upcoming anime arcs without spoiler tags.',
            ],
            [
                'topic_id' => 29,
                'order' => 2,
                'title' => 'No animation studio comparisons',
                'description' => 'Avoid flame wars about animation studios—enjoy the art!',
            ],

            // Topic ID 30 - Adventure Time
            [
                'topic_id' => 30,
                'order' => 1,
                'title' => 'Label theories and lore deep-dives',
                'description' => 'Casual fans and lore enthusiasts can both enjoy this space with proper labeling.',
            ],
            [
                'topic_id' => 30,
                'order' => 2,
                'title' => 'Be kind to all ages',
                'description' => 'This show spans generations—keep the tone appropriate for younger viewers too.',
            ],

            // Topic ID 31 - BoJack Horseman
            [
                'topic_id' => 31,
                'order' => 1,
                'title' => 'Content warning required',
                'description' => 'Label posts with sensitive themes like addiction or depression.',
            ],
            [
                'topic_id' => 31,
                'order' => 2,
                'title' => 'Respect the tone of the show',
                'description' => 'Dark humor is part of the show—keep discussions thoughtful, not hurtful.',
            ],

            // Topic ID 32 - Studio Ghibli
            [
                'topic_id' => 32,
                'order' => 1,
                'title' => 'Keep things wholesome',
                'description' => 'Studio Ghibli is about heart—avoid cynical or overly negative takes.',
            ],
            [
                'topic_id' => 32,
                'order' => 2,
                'title' => 'No piracy links',
                'description' => 'Support official releases—do not share illegal viewing links.',
            ],

            // Topic ID 33 - Indie Animation
            [
                'topic_id' => 33,
                'order' => 1,
                'title' => 'Promote lesser-known works',
                'description' => 'Highlight original content and help indie creators thrive.',
            ],
            [
                'topic_id' => 33,
                'order' => 2,
                'title' => 'Constructive critique only',
                'description' => 'Respect the craft—no trashing creators or amateur work.',
            ],

            // Topic ID 34 - Rocket Science
            [
                'topic_id' => 34,
                'order' => 1,
                'title' => 'Use sources and citations',
                'description' => 'Ensure technical info is accurate and cite reputable sources.',
            ],
            [
                'topic_id' => 34,
                'order' => 2,
                'title' => 'No oversimplification of complex systems',
                'description' => 'Balance accessibility with accuracy when explaining rocket mechanics.',
            ],

            // Topic ID 35 - Programming Concepts
            [
                'topic_id' => 35,
                'order' => 1,
                'title' => 'Clarify your language',
                'description' => 'When using technical terms, give examples or context if needed.',
            ],
            [
                'topic_id' => 35,
                'order' => 2,
                'title' => 'Respect all experience levels',
                'description' => 'Beginners and experts both belong—no gatekeeping.',
            ],

            // Topic ID 36 - Medieval History
            [
                'topic_id' => 36,
                'order' => 1,
                'title' => 'Stick to factual history',
                'description' => 'Fantasy comparisons are welcome, but clearly separate them from real events.',
            ],
            [
                'topic_id' => 36,
                'order' => 2,
                'title' => 'Respect cultural contexts',
                'description' => 'Avoid anachronistic judgments or disrespect toward past civilizations.',
            ],

            // Topic ID 37 - Paleontology
            [
                'topic_id' => 37,
                'order' => 1,
                'title' => 'No pseudoscience',
                'description' => 'Stick to scientifically supported information about prehistoric life.',
            ],
            [
                'topic_id' => 37,
                'order' => 2,
                'title' => 'Credit fossil discoveries',
                'description' => 'When sharing images or data, credit the museum or publication.',
            ],

            // Topic ID 38 - Quantum Physics
            [
                'topic_id' => 38,
                'order' => 1,
                'title' => 'Label speculative topics',
                'description' => 'Quantum interpretations should be clearly marked as theory or speculation.',
            ],
            [
                'topic_id' => 38,
                'order' => 2,
                'title' => 'No misuse of terminology',
                'description' => 'Don’t use quantum buzzwords to justify unrelated ideas (e.g. law of attraction).',
            ],

            // Topic ID 39 - Environmental Science
            [
                'topic_id' => 39,
                'order' => 1,
                'title' => 'Support data-driven discussion',
                'description' => 'Claims about the environment must be backed by studies or reliable data.',
            ],
            [
                'topic_id' => 39,
                'order' => 2,
                'title' => 'No climate change denial',
                'description' => 'This space acknowledges the scientific consensus on environmental issues.',
            ],

            // Topic ID 40 - Philosophy 101
            [
                'topic_id' => 40,
                'order' => 1,
                'title' => 'Engage with arguments, not people',
                'description' => 'Challenge ideas respectfully without attacking the speaker.',
            ],
            [
                'topic_id' => 40,
                'order' => 2,
                'title' => 'Source your philosophy',
                'description' => 'If referencing a philosopher or concept, include a brief context or citation.',
            ],

            // Topic ID 41 - World Religions
            [
                'topic_id' => 41,
                'order' => 1,
                'title' => 'Respect all faiths',
                'description' => 'This is a space for understanding, not judgment or mockery.',
            ],
            [
                'topic_id' => 41,
                'order' => 2,
                'title' => 'No proselytizing or anti-religious content',
                'description' => 'Educational posts are welcome—avoid trying to convert or attack beliefs.',
            ],

            // Topic ID 42 - Language Learning
            [
                'topic_id' => 42,
                'order' => 1,
                'title' => 'Respect language diversity',
                'description' => 'No mocking of accents, grammar struggles, or regional variations.',
            ],
            [
                'topic_id' => 42,
                'order' => 2,
                'title' => 'Stay encouraging',
                'description' => 'Learning a language is hard—support others with patience and kindness.',
            ],

            // Topic ID 43 - College Survival Guide
            [
                'topic_id' => 43,
                'order' => 1,
                'title' => 'No academic dishonesty',
                'description' => 'Do not share or request exam answers, plagiarized work, or cheat tips.',
            ],
            [
                'topic_id' => 43,
                'order' => 2,
                'title' => 'Keep advice constructive',
                'description' => 'College is tough—share practical support, not cynicism.',
            ],

            // Topic ID 44 - Global Headlines
            [
                'topic_id' => 44,
                'order' => 1,
                'title' => 'Use verified sources',
                'description' => 'When posting news, always link to reputable and traceable sources.',
            ],
            [
                'topic_id' => 44,
                'order' => 2,
                'title' => 'Avoid fearmongering',
                'description' => 'Keep discussion factual—avoid exaggeration or panic-based claims.',
            ],

            // Topic ID 45 - Local Issues
            [
                'topic_id' => 45,
                'order' => 1,
                'title' => 'Respect local perspectives',
                'description' => 'Outsiders commenting should listen first and avoid judgment.',
            ],
            [
                'topic_id' => 45,
                'order' => 2,
                'title' => 'Verify local events',
                'description' => 'Avoid spreading unconfirmed rumors about your area.',
            ],

            // Topic ID 46 - Policy and Law
            [
                'topic_id' => 46,
                'order' => 1,
                'title' => 'No legal misinformation',
                'description' => 'Only share legal interpretations if sourced or clearly opinion-based.',
            ],
            [
                'topic_id' => 46,
                'order' => 2,
                'title' => 'Stay respectful in political debate',
                'description' => 'It’s fine to disagree—just do so without insults or flamewars.',
            ],

            // Topic ID 47 - Election Watch
            [
                'topic_id' => 47,
                'order' => 1,
                'title' => 'No fake election news',
                'description' => 'Election-related posts must be based on verified, factual info.',
            ],
            [
                'topic_id' => 47,
                'order' => 2,
                'title' => 'No voter manipulation',
                'description' => 'Do not encourage voter suppression, misinformation, or intimidation.',
            ],

            // Topic ID 48 - Media Literacy
            [
                'topic_id' => 48,
                'order' => 1,
                'title' => 'Teach, don’t condescend',
                'description' => 'Not everyone knows how media works—be educational, not superior.',
            ],
            [
                'topic_id' => 48,
                'order' => 2,
                'title' => 'Avoid promoting conspiracy content',
                'description' => 'Discussions should be grounded in critical thinking and reliable sources.',
            ],

            // Topic ID 49 - Conflict Zones
            [
                'topic_id' => 49,
                'order' => 1,
                'title' => 'Be sensitive to suffering',
                'description' => 'Avoid disrespectful memes or jokes about active conflicts.',
            ],
            [
                'topic_id' => 49,
                'order' => 2,
                'title' => 'No spreading of extremist content',
                'description' => 'Do not share graphic violence or propaganda from militant groups.',
            ],

            // Topic ID 50 - Economic Politics
            [
                'topic_id' => 50,
                'order' => 1,
                'title' => 'Back up economic claims',
                'description' => 'Use charts, studies, or credible economists when presenting opinions.',
            ],
            [
                'topic_id' => 50,
                'order' => 2,
                'title' => 'Be civil in ideology debates',
                'description' => 'Left, right, or center—every voice deserves basic respect.',
            ],

            // Topic ID 51 - Human Rights Talks
            [
                'topic_id' => 51,
                'order' => 1,
                'title' => 'Respect lived experiences',
                'description' => 'Listen to those directly affected before making sweeping statements.',
            ],
            [
                'topic_id' => 51,
                'order' => 2,
                'title' => 'No hate speech or denial',
                'description' => 'Any form of hate speech or human rights abuse denial will not be tolerated.',
            ],          
        ]);
    }
}
