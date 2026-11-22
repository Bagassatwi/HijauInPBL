CREATE TABLE IF NOT EXISTS public.landing_page_content (
  page_key text NOT NULL,
  section_key text NOT NULL,
  content jsonb NOT NULL,
  updated_at timestamp with time zone NOT NULL DEFAULT now(),
  CONSTRAINT landing_page_content_pkey PRIMARY KEY (page_key, section_key)
);

CREATE TABLE IF NOT EXISTS public.landing_form_submissions (
  id uuid NOT NULL DEFAULT gen_random_uuid(),
  form_key text NOT NULL,
  data jsonb NOT NULL,
  attachment bytea,
  attachment_name text,
  attachment_mime text,
  status text NOT NULL DEFAULT 'new',
  created_at timestamp with time zone NOT NULL DEFAULT now(),
  CONSTRAINT landing_form_submissions_pkey PRIMARY KEY (id)
);

CREATE INDEX IF NOT EXISTS landing_form_submissions_lookup_idx
  ON public.landing_form_submissions (form_key, created_at DESC);
