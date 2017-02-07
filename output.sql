--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.1
-- Dumped by pg_dump version 9.6.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: blanket_size; Type: TABLE; Schema: public; Owner: rpdblhqsnnjkab
--

CREATE TABLE blanket_size (
    size_id integer NOT NULL,
    type character varying(10) NOT NULL,
    size character varying(15) NOT NULL
);


ALTER TABLE blanket_size OWNER TO rpdblhqsnnjkab;

--
-- Name: blanket_size_size_id_seq; Type: SEQUENCE; Schema: public; Owner: rpdblhqsnnjkab
--

CREATE SEQUENCE blanket_size_size_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE blanket_size_size_id_seq OWNER TO rpdblhqsnnjkab;

--
-- Name: blanket_size_size_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER SEQUENCE blanket_size_size_id_seq OWNED BY blanket_size.size_id;


--
-- Name: pattern; Type: TABLE; Schema: public; Owner: rpdblhqsnnjkab
--

CREATE TABLE pattern (
    pattern_id integer NOT NULL,
    pattern_title character varying(100) NOT NULL,
    pattern_img character varying(2083) NOT NULL,
    time_required integer NOT NULL,
    blanket_type integer NOT NULL,
    created_by integer NOT NULL
);


ALTER TABLE pattern OWNER TO rpdblhqsnnjkab;

--
-- Name: pattern_pattern_id_seq; Type: SEQUENCE; Schema: public; Owner: rpdblhqsnnjkab
--

CREATE SEQUENCE pattern_pattern_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pattern_pattern_id_seq OWNER TO rpdblhqsnnjkab;

--
-- Name: pattern_pattern_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER SEQUENCE pattern_pattern_id_seq OWNED BY pattern.pattern_id;


--
-- Name: saved_pattern; Type: TABLE; Schema: public; Owner: rpdblhqsnnjkab
--

CREATE TABLE saved_pattern (
    saved_pattern_id integer NOT NULL,
    user_id integer NOT NULL,
    pattern_id integer NOT NULL
);


ALTER TABLE saved_pattern OWNER TO rpdblhqsnnjkab;

--
-- Name: saved_pattern_saved_pattern_id_seq; Type: SEQUENCE; Schema: public; Owner: rpdblhqsnnjkab
--

CREATE SEQUENCE saved_pattern_saved_pattern_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE saved_pattern_saved_pattern_id_seq OWNER TO rpdblhqsnnjkab;

--
-- Name: saved_pattern_saved_pattern_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER SEQUENCE saved_pattern_saved_pattern_id_seq OWNED BY saved_pattern.saved_pattern_id;


--
-- Name: story_blanket_user; Type: TABLE; Schema: public; Owner: rpdblhqsnnjkab
--

CREATE TABLE story_blanket_user (
    user_id integer NOT NULL,
    username character varying(50) NOT NULL,
    password character varying(100) NOT NULL,
    full_name character varying(50) NOT NULL,
    email character varying(100) NOT NULL
);


ALTER TABLE story_blanket_user OWNER TO rpdblhqsnnjkab;

--
-- Name: story_blanket_user_user_id_seq; Type: SEQUENCE; Schema: public; Owner: rpdblhqsnnjkab
--

CREATE SEQUENCE story_blanket_user_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE story_blanket_user_user_id_seq OWNER TO rpdblhqsnnjkab;

--
-- Name: story_blanket_user_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER SEQUENCE story_blanket_user_user_id_seq OWNED BY story_blanket_user.user_id;


--
-- Name: time_required; Type: TABLE; Schema: public; Owner: rpdblhqsnnjkab
--

CREATE TABLE time_required (
    time_id integer NOT NULL,
    time_required character varying(15) NOT NULL
);


ALTER TABLE time_required OWNER TO rpdblhqsnnjkab;

--
-- Name: time_required_time_id_seq; Type: SEQUENCE; Schema: public; Owner: rpdblhqsnnjkab
--

CREATE SEQUENCE time_required_time_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE time_required_time_id_seq OWNER TO rpdblhqsnnjkab;

--
-- Name: time_required_time_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER SEQUENCE time_required_time_id_seq OWNED BY time_required.time_id;


--
-- Name: blanket_size size_id; Type: DEFAULT; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER TABLE ONLY blanket_size ALTER COLUMN size_id SET DEFAULT nextval('blanket_size_size_id_seq'::regclass);


--
-- Name: pattern pattern_id; Type: DEFAULT; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER TABLE ONLY pattern ALTER COLUMN pattern_id SET DEFAULT nextval('pattern_pattern_id_seq'::regclass);


--
-- Name: saved_pattern saved_pattern_id; Type: DEFAULT; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER TABLE ONLY saved_pattern ALTER COLUMN saved_pattern_id SET DEFAULT nextval('saved_pattern_saved_pattern_id_seq'::regclass);


--
-- Name: story_blanket_user user_id; Type: DEFAULT; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER TABLE ONLY story_blanket_user ALTER COLUMN user_id SET DEFAULT nextval('story_blanket_user_user_id_seq'::regclass);


--
-- Name: time_required time_id; Type: DEFAULT; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER TABLE ONLY time_required ALTER COLUMN time_id SET DEFAULT nextval('time_required_time_id_seq'::regclass);


--
-- Data for Name: blanket_size; Type: TABLE DATA; Schema: public; Owner: rpdblhqsnnjkab
--

COPY blanket_size (size_id, type, size) FROM stdin;
1	unknown	unknown
2	Baby	30" X 35"
3	Throw	52" X 60"
4	Twin	66" X 90"
5	Double	90" X 108"
6	Queen	90" X 108"
7	King	108" X 108"
\.


--
-- Name: blanket_size_size_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rpdblhqsnnjkab
--

SELECT pg_catalog.setval('blanket_size_size_id_seq', 7, true);


--
-- Data for Name: pattern; Type: TABLE DATA; Schema: public; Owner: rpdblhqsnnjkab
--

COPY pattern (pattern_id, pattern_title, pattern_img, time_required, blanket_type, created_by) FROM stdin;
\.


--
-- Name: pattern_pattern_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rpdblhqsnnjkab
--

SELECT pg_catalog.setval('pattern_pattern_id_seq', 1, false);


--
-- Data for Name: saved_pattern; Type: TABLE DATA; Schema: public; Owner: rpdblhqsnnjkab
--

COPY saved_pattern (saved_pattern_id, user_id, pattern_id) FROM stdin;
\.


--
-- Name: saved_pattern_saved_pattern_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rpdblhqsnnjkab
--

SELECT pg_catalog.setval('saved_pattern_saved_pattern_id_seq', 1, false);


--
-- Data for Name: story_blanket_user; Type: TABLE DATA; Schema: public; Owner: rpdblhqsnnjkab
--

COPY story_blanket_user (user_id, username, password, full_name, email) FROM stdin;
\.


--
-- Name: story_blanket_user_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rpdblhqsnnjkab
--

SELECT pg_catalog.setval('story_blanket_user_user_id_seq', 1, false);


--
-- Data for Name: time_required; Type: TABLE DATA; Schema: public; Owner: rpdblhqsnnjkab
--

COPY time_required (time_id, time_required) FROM stdin;
1	< 5 hours
2	5-10 hours
3	10-15 hours
4	15-20 hours
5	20-25 hours
6	25-30 hours
7	> 30 hours
\.


--
-- Name: time_required_time_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rpdblhqsnnjkab
--

SELECT pg_catalog.setval('time_required_time_id_seq', 7, true);


--
-- Name: blanket_size blanket_size_pkey; Type: CONSTRAINT; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER TABLE ONLY blanket_size
    ADD CONSTRAINT blanket_size_pkey PRIMARY KEY (size_id);


--
-- Name: pattern pattern_pkey; Type: CONSTRAINT; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER TABLE ONLY pattern
    ADD CONSTRAINT pattern_pkey PRIMARY KEY (pattern_id);


--
-- Name: saved_pattern saved_pattern_pkey; Type: CONSTRAINT; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER TABLE ONLY saved_pattern
    ADD CONSTRAINT saved_pattern_pkey PRIMARY KEY (saved_pattern_id);


--
-- Name: story_blanket_user story_blanket_user_pkey; Type: CONSTRAINT; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER TABLE ONLY story_blanket_user
    ADD CONSTRAINT story_blanket_user_pkey PRIMARY KEY (user_id);


--
-- Name: time_required time_required_pkey; Type: CONSTRAINT; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER TABLE ONLY time_required
    ADD CONSTRAINT time_required_pkey PRIMARY KEY (time_id);


--
-- Name: pattern pattern_blanket_type_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER TABLE ONLY pattern
    ADD CONSTRAINT pattern_blanket_type_fkey FOREIGN KEY (blanket_type) REFERENCES blanket_size(size_id);


--
-- Name: pattern pattern_created_by_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER TABLE ONLY pattern
    ADD CONSTRAINT pattern_created_by_fkey FOREIGN KEY (created_by) REFERENCES story_blanket_user(user_id);


--
-- Name: pattern pattern_time_required_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER TABLE ONLY pattern
    ADD CONSTRAINT pattern_time_required_fkey FOREIGN KEY (time_required) REFERENCES time_required(time_id);


--
-- Name: saved_pattern saved_pattern_pattern_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER TABLE ONLY saved_pattern
    ADD CONSTRAINT saved_pattern_pattern_id_fkey FOREIGN KEY (pattern_id) REFERENCES pattern(pattern_id);


--
-- Name: saved_pattern saved_pattern_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rpdblhqsnnjkab
--

ALTER TABLE ONLY saved_pattern
    ADD CONSTRAINT saved_pattern_user_id_fkey FOREIGN KEY (user_id) REFERENCES story_blanket_user(user_id);


--
-- Name: public; Type: ACL; Schema: -; Owner: rpdblhqsnnjkab
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO rpdblhqsnnjkab;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO rpdblhqsnnjkab;


--
-- PostgreSQL database dump complete
--

