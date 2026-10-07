-- 1. Tables without foreign keys
CREATE TABLE public.articles (
  id uuid NOT NULL DEFAULT gen_random_uuid(),
  title text NOT NULL,
  slug text UNIQUE,
  thumbnail text,
  category text,
  summary text,
  content text,
  author text,
  read_time integer,
  created_at timestamp with time zone DEFAULT now(),
  CONSTRAINT articles_pkey PRIMARY KEY (id)
);

CREATE TABLE public.badges (
  id uuid NOT NULL DEFAULT gen_random_uuid(),
  name text,
  description text,
  image text,
  created_at timestamp with time zone DEFAULT now(),
  CONSTRAINT badges_pkey PRIMARY KEY (id)
);

CREATE TABLE public.categories (
  id uuid NOT NULL DEFAULT gen_random_uuid(),
  name text,
  icon text,
  color text,
  created_at timestamp with time zone DEFAULT now(),
  point integer NOT NULL DEFAULT 20,
  description text,
  CONSTRAINT categories_pkey PRIMARY KEY (id)
);

CREATE TABLE public.challenges (
  id uuid NOT NULL DEFAULT gen_random_uuid(),
  title text NOT NULL,
  description text,
  image text,
  duration integer,
  reward_point integer,
  reward_badge text,
  created_at timestamp with time zone DEFAULT now(),
  tag text,
  CONSTRAINT challenges_pkey PRIMARY KEY (id)
);

CREATE TABLE public.communities (
  id uuid NOT NULL DEFAULT gen_random_uuid(),
  name text NOT NULL,
  description text,
  city text,
  image text,
  member_count integer DEFAULT 0,
  created_at timestamp with time zone DEFAULT now(),
  caption text,
  tags text[],
  CONSTRAINT communities_pkey PRIMARY KEY (id)
);

CREATE TABLE public.messages (
  id uuid NOT NULL DEFAULT gen_random_uuid(),
  user_id uuid NOT NULL,
  role text CHECK (role = ANY (ARRAY['user'::text, 'model'::text])),
  content text NOT NULL,
  created_at timestamp with time zone NOT NULL DEFAULT timezone('utc'::text, now()),
  CONSTRAINT messages_pkey PRIMARY KEY (id)
);

-- 2. Primary user profile table (Depends on auth.users)
CREATE TABLE public.profiles (
  id uuid NOT NULL,
  full_name text,
  avatar_url text DEFAULT 'https://bzmrlrsyezgogcjhcytz.supabase.co/storage/v1/object/public/image/ava1.png'::text,
  bio text,
  city text,
  eco_score integer DEFAULT 0,
  level integer DEFAULT 1,
  xp integer DEFAULT 0,
  streak integer DEFAULT 0,
  created_at timestamp with time zone DEFAULT now(),
  CONSTRAINT profiles_pkey PRIMARY KEY (id),
  CONSTRAINT profiles_id_fkey FOREIGN KEY (id) REFERENCES auth.users(id)
);

-- 3. Dependent tables (Depend on profiles, categories, challenges, badges, or communities)
CREATE TABLE public.eco_actions (
  id uuid NOT NULL DEFAULT gen_random_uuid(),
  title text NOT NULL,
  description text,
  point integer DEFAULT 0,
  co2_saved numeric DEFAULT 0,
  water_saved numeric DEFAULT 0,
  energy_saved numeric DEFAULT 0,
  verification_type text,
  icon text,
  created_at timestamp with time zone DEFAULT now(),
  user_id uuid,
  category_id uuid,
  activity_date timestamp without time zone,
  status text DEFAULT 'verified'::text,
  image_url text,
  location text,
  photo_url text,
  CONSTRAINT eco_actions_pkey PRIMARY KEY (id),
  CONSTRAINT eco_actions_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.profiles(id),
  CONSTRAINT eco_actions_category_id_fkey FOREIGN KEY (category_id) REFERENCES public.categories(id)
);

CREATE TABLE public.user_challenges (
  id uuid NOT NULL DEFAULT gen_random_uuid(),
  user_id uuid,
  challenge_id uuid,
  progress integer DEFAULT 0,
  target integer,
  status text DEFAULT 'active'::text,
  reward_claimed boolean DEFAULT false,
  joined_at timestamp with time zone DEFAULT now(),
  completed_at timestamp with time zone,
  CONSTRAINT user_challenges_pkey PRIMARY KEY (id),
  CONSTRAINT user_challenges_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.profiles(id),
  CONSTRAINT user_challenges_challenge_id_fkey FOREIGN KEY (challenge_id) REFERENCES public.challenges(id)
);

CREATE TABLE public.community_members (
  id uuid NOT NULL DEFAULT gen_random_uuid(),
  community_id uuid,
  user_id uuid,
  joined_at timestamp with time zone DEFAULT now(),
  CONSTRAINT community_members_pkey PRIMARY KEY (id),
  CONSTRAINT community_members_community_id_fkey FOREIGN KEY (community_id) REFERENCES public.communities(id),
  CONSTRAINT community_members_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.profiles(id)
);

CREATE TABLE public.community_posts (
  id uuid NOT NULL DEFAULT gen_random_uuid(),
  community_id uuid,
  user_id uuid,
  caption text,
  image text,
  like_count integer DEFAULT 0,
  comment_count integer DEFAULT 0,
  created_at timestamp with time zone DEFAULT now(),
  CONSTRAINT community_posts_pkey PRIMARY KEY (id),
  CONSTRAINT community_posts_community_id_fkey FOREIGN KEY (community_id) REFERENCES public.communities(id),
  CONSTRAINT community_posts_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.profiles(id)
);

CREATE TABLE public.user_badges (
  id uuid NOT NULL DEFAULT gen_random_uuid(),
  badge_id uuid,
  user_id uuid,
  earned_at timestamp with time zone DEFAULT now(),
  CONSTRAINT user_badges_pkey PRIMARY KEY (id),
  CONSTRAINT user_badges_badge_id_fkey FOREIGN KEY (badge_id) REFERENCES public.badges(id),
  CONSTRAINT user_badges_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.profiles(id)
);

CREATE TABLE public.notifications (
  id uuid NOT NULL DEFAULT gen_random_uuid(),
  user_id uuid,
  title text,
  message text,
  is_read boolean DEFAULT false,
  created_at timestamp with time zone DEFAULT now(),
  CONSTRAINT notifications_pkey PRIMARY KEY (id),
  CONSTRAINT notifications_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.profiles(id)
);