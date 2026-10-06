CREATE TABLE "migrations" ("id" integer primary key autoincrement not null, "migration" varchar not null, "batch" integer not null);

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('1', '0001_01_01_000000_create_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('2', '0001_01_01_000001_create_cache_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('3', '0001_01_01_000002_create_jobs_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('4', '2026_10_02_060447_create_bnn_content_tables', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('5', '2026_10_02_060815_add_two_factor_columns_to_users_table', '2');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('6', '2026_10_02_060816_create_passkeys_table', '2');

CREATE TABLE "roles" ("id" integer primary key autoincrement not null, "name" varchar not null, "created_at" datetime, "updated_at" datetime);

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES ('1', 'user', '2026-10-04 08:41:54', '2026-10-04 08:41:54');

CREATE TABLE "users" ("id" integer primary key autoincrement not null, "role_id" integer not null, "name" varchar not null, "email" varchar not null, "phone" varchar, "email_verified_at" datetime, "phone_verified_at" datetime, "password" varchar not null, "avatar" varchar, "is_active" tinyint(1) not null default '1', "remember_token" varchar, "created_at" datetime, "updated_at" datetime, "two_factor_secret" text, "two_factor_recovery_codes" text, "two_factor_confirmed_at" datetime, foreign key("role_id") references "roles"("id") on delete cascade);

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `phone`, `email_verified_at`, `phone_verified_at`, `password`, `avatar`, `is_active`, `remember_token`, `created_at`, `updated_at`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`) VALUES ('1', '1', 'Ahmad Tijani', 'ilhamm1979@gmail.com', NULL, NULL, NULL, '$2y$12$/yy/Ohk75wJXVlO.dXHPmeyKBjMJVaCi52XQR0Xxno7AknQKlTNNC', NULL, '1', NULL, '2026-10-04 08:41:55', '2026-10-04 08:41:55', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `phone`, `email_verified_at`, `phone_verified_at`, `password`, `avatar`, `is_active`, `remember_token`, `created_at`, `updated_at`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`) VALUES ('2', '1', 'Josuke', 'ilhamilham93514@gmail.com', NULL, NULL, NULL, '$2y$12$lIsRa/j11nxV3VV1GWGR3.PeRxRQ6bJV8gKh9eWYNGRxAGBDCE0LS', NULL, '1', NULL, '2026-10-05 00:10:12', '2026-10-05 00:10:12', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `phone`, `email_verified_at`, `phone_verified_at`, `password`, `avatar`, `is_active`, `remember_token`, `created_at`, `updated_at`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`) VALUES ('3', '1', 'Neymar Jr', 'freejpgtopng2@gmail.com', NULL, NULL, NULL, '$2y$12$rN9Tx.FZc9B.4yCftAVX2.87kMTGnpUB7443txpbBA.Lwo97KC5pm', NULL, '1', NULL, '2026-10-05 00:26:08', '2026-10-05 00:26:08', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `phone`, `email_verified_at`, `phone_verified_at`, `password`, `avatar`, `is_active`, `remember_token`, `created_at`, `updated_at`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`) VALUES ('4', '1', 'Felix', 'freejpgtopng3@gmail.com', NULL, NULL, NULL, '$2y$12$cItAu05Mb8JUPZ0Gtavvte0dOmIfrWOFJfb9ecqoNDOW9WIvfokR6', NULL, '1', NULL, '2026-10-05 01:37:08', '2026-10-05 01:37:08', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `phone`, `email_verified_at`, `phone_verified_at`, `password`, `avatar`, `is_active`, `remember_token`, `created_at`, `updated_at`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`) VALUES ('5', '1', 'Nanang', 'freejpgtopng4@gmail.com', NULL, NULL, NULL, '$2y$12$0UBZH/Cc.6FAo0jYGTmha.ye3JzDXLgivmDU/iadjQfNiVbcu.q2.', NULL, '1', NULL, '2026-10-06 03:16:02', '2026-10-06 03:16:02', NULL, NULL, NULL);

CREATE TABLE "password_reset_tokens" ("email" varchar not null, "token" varchar not null, "created_at" datetime, primary key ("email"));


CREATE TABLE "sessions" ("id" varchar not null, "user_id" integer, "ip_address" varchar, "user_agent" text, "payload" text not null, "last_activity" integer not null, primary key ("id"));


CREATE TABLE "cache" ("key" varchar not null, "value" text not null, "expiration" integer not null, primary key ("key"));

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-3999cb7ab3398d88b77c5b26c7159225:timer', 'i:1790961340;', '1790961340');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-3999cb7ab3398d88b77c5b26c7159225', 'i:3;', '1790961340');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-c030324062@gmail.com|127.0.0.1:timer', 'i:1790961340;', '1790961340');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-c030324062@gmail.com|127.0.0.1', 'i:2;', '1790961340');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-c001c4a52231606fd6fe9f6f41dd0193:timer', 'i:1790962455;', '1790962455');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-c001c4a52231606fd6fe9f6f41dd0193', 'i:1;', '1790962455');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-dosen5@kampus.ac.idddssddd|127.0.0.1:timer', 'i:1790962455;', '1790962455');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-dosen5@kampus.ac.idddssddd|127.0.0.1', 'i:1;', '1790962455');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-c6be2cf7c13d9a527ee2fe401bbae3c7:timer', 'i:1791030747;', '1791030747');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-c6be2cf7c13d9a527ee2fe401bbae3c7', 'i:1;', '1791030747');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-bdd10ce41e011a05a10b7ecfd5ac1bfc:timer', 'i:1791033075;', '1791033075');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-bdd10ce41e011a05a10b7ecfd5ac1bfc', 'i:1;', '1791033075');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-dddsss@d.com|127.0.0.1:timer', 'i:1791033075;', '1791033075');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-dddsss@d.com|127.0.0.1', 'i:1;', '1791033075');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-a6a31d439194abf6f1e0ee0937057089:timer', 'i:1791033335;', '1791033335');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-a6a31d439194abf6f1e0ee0937057089', 'i:3;', '1791033335');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-2217051013@student.kampus.ac.id|127.0.0.1:timer', 'i:1791033335;', '1791033335');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-2217051013@student.kampus.ac.id|127.0.0.1', 'i:2;', '1791033335');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-24f6a052a94c458d1d57147734a80201:timer', 'i:1791034101;', '1791034101');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-24f6a052a94c458d1d57147734a80201', 'i:4;', '1791034101');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-2217051012@student.kampus.ac.id|127.0.0.1:timer', 'i:1791034101;', '1791034101');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-2217051012@student.kampus.ac.id|127.0.0.1', 'i:3;', '1791034101');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-e0346aad9a68a0a6d4e7e42417f310f5:timer', 'i:1791108776;', '1791108776');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-e0346aad9a68a0a6d4e7e42417f310f5', 'i:1;', '1791108776');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-ilham1979@gmail.com|127.0.0.1:timer', 'i:1791108777;', '1791108777');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-ilham1979@gmail.com|127.0.0.1', 'i:1;', '1791108777');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-527b7cab5d5b45ded72ab6c93f564568:timer', 'i:1791166031;', '1791166031');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-527b7cab5d5b45ded72ab6c93f564568', 'i:2;', '1791166031');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-freeejpgtopng2@gmail.com|127.0.0.1:timer', 'i:1791166031;', '1791166031');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-freeejpgtopng2@gmail.com|127.0.0.1', 'i:2;', '1791166031');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-d7e58146d5519ff40e273610e112dd96:timer', 'i:1791166048;', '1791166048');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-d7e58146d5519ff40e273610e112dd96', 'i:1;', '1791166048');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-f957e294660fcf385709eaa14bcf564d:timer', 'i:1791184688;', '1791184688');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-f957e294660fcf385709eaa14bcf564d', 'i:1;', '1791184688');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-46df3514b19f1a86a9c345abbc7b3732:timer', 'i:1791186876;', '1791186876');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-46df3514b19f1a86a9c345abbc7b3732', 'i:1;', '1791186876');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-dosen5@kampus.ac.id|127.0.0.1:timer', 'i:1791186876;', '1791186876');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-dosen5@kampus.ac.id|127.0.0.1', 'i:1;', '1791186876');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-39d6567d443b25055bf0363e717220fa:timer', 'i:1791257613;', '1791257613');
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-39d6567d443b25055bf0363e717220fa', 'i:1;', '1791257613');

CREATE TABLE "cache_locks" ("key" varchar not null, "owner" varchar not null, "expiration" integer not null, primary key ("key"));


CREATE TABLE "jobs" ("id" integer primary key autoincrement not null, "queue" varchar not null, "payload" text not null, "attempts" integer not null, "reserved_at" integer, "available_at" integer not null, "created_at" integer not null);


CREATE TABLE "job_batches" ("id" varchar not null, "name" varchar not null, "total_jobs" integer not null, "pending_jobs" integer not null, "failed_jobs" integer not null, "failed_job_ids" text not null, "options" text, "cancelled_at" integer, "created_at" integer not null, "finished_at" integer, primary key ("id"));


CREATE TABLE "failed_jobs" ("id" integer primary key autoincrement not null, "uuid" varchar not null, "connection" text not null, "queue" text not null, "payload" text not null, "exception" text not null, "failed_at" datetime not null default CURRENT_TIMESTAMP);


CREATE TABLE "email_verifications" ("id" integer primary key autoincrement not null, "user_id" integer not null, "email" varchar not null, "code" varchar not null, "expires_at" datetime not null, "is_used" tinyint(1) not null default '0', "created_at" datetime, "updated_at" datetime, foreign key("user_id") references "users"("id") on delete cascade);

INSERT INTO `email_verifications` (`id`, `user_id`, `email`, `code`, `expires_at`, `is_used`, `created_at`, `updated_at`) VALUES ('1', '4', 'freejpgtopng3@gmail.com', '49639', '2026-10-05 01:39:08', '1', '2026-10-05 01:37:08', '2026-10-05 01:39:43');
INSERT INTO `email_verifications` (`id`, `user_id`, `email`, `code`, `expires_at`, `is_used`, `created_at`, `updated_at`) VALUES ('2', '4', 'freejpgtopng3@gmail.com', '67254', '2026-10-05 01:41:43', '0', '2026-10-05 01:39:43', '2026-10-05 01:39:43');
INSERT INTO `email_verifications` (`id`, `user_id`, `email`, `code`, `expires_at`, `is_used`, `created_at`, `updated_at`) VALUES ('3', '5', 'freejpgtopng4@gmail.com', '73519', '2026-10-06 03:18:02', '1', '2026-10-06 03:16:02', '2026-10-06 03:19:41');
INSERT INTO `email_verifications` (`id`, `user_id`, `email`, `code`, `expires_at`, `is_used`, `created_at`, `updated_at`) VALUES ('4', '5', 'freejpgtopng4@gmail.com', '26474', '2026-10-06 03:21:41', '1', '2026-10-06 03:19:41', '2026-10-06 03:23:38');
INSERT INTO `email_verifications` (`id`, `user_id`, `email`, `code`, `expires_at`, `is_used`, `created_at`, `updated_at`) VALUES ('5', '5', 'freejpgtopng4@gmail.com', '65585', '2026-10-06 03:25:38', '0', '2026-10-06 03:23:38', '2026-10-06 03:23:38');

CREATE TABLE "phone_verifications" ("id" integer primary key autoincrement not null, "user_id" integer not null, "phone" varchar not null, "otp_code" varchar not null, "expires_at" datetime not null, "is_used" tinyint(1) not null default '0', "created_at" datetime, "updated_at" datetime, foreign key("user_id") references "users"("id") on delete cascade);


CREATE TABLE "categories" ("id" integer primary key autoincrement not null, "name" varchar not null, "slug" varchar not null, "description" text, "color" varchar, "is_active" tinyint(1) not null default '1', "created_at" datetime, "updated_at" datetime);


CREATE TABLE "tags" ("id" integer primary key autoincrement not null, "name" varchar not null, "slug" varchar not null, "color" varchar, "created_at" datetime, "updated_at" datetime);


CREATE TABLE "articles" ("id" integer primary key autoincrement not null, "user_id" integer not null, "title" varchar not null, "slug" varchar not null, "excerpt" text, "content" text not null, "featured_image" varchar, "featured_video" varchar, "status" varchar check ("status" in ('draft', 'published', 'archived')) not null default 'draft', "published_at" datetime, "views_count" integer not null default '0', "is_featured" tinyint(1) not null default '0', "created_at" datetime, "updated_at" datetime, foreign key("user_id") references "users"("id") on delete cascade);


CREATE TABLE "article_category" ("article_id" integer not null, "category_id" integer not null, foreign key("article_id") references "articles"("id") on delete cascade, foreign key("category_id") references "categories"("id") on delete cascade, primary key ("article_id", "category_id"));


CREATE TABLE "article_tag" ("article_id" integer not null, "tag_id" integer not null, foreign key("article_id") references "articles"("id") on delete cascade, foreign key("tag_id") references "tags"("id") on delete cascade, primary key ("article_id", "tag_id"));


CREATE TABLE "article_images" ("id" integer primary key autoincrement not null, "article_id" integer not null, "file_path" varchar not null, "file_name" varchar not null, "alt_text" varchar, "sort_order" integer not null default '0', "created_at" datetime, "updated_at" datetime, foreign key("article_id") references "articles"("id") on delete cascade);


CREATE TABLE "comments" ("id" integer primary key autoincrement not null, "user_id" integer not null, "article_id" integer not null, "parent_id" integer, "body" text not null, "is_approved" tinyint(1) not null default '0', "created_at" datetime, "updated_at" datetime, foreign key("user_id") references "users"("id") on delete cascade, foreign key("article_id") references "articles"("id") on delete cascade, foreign key("parent_id") references "comments"("id") on delete cascade);


CREATE TABLE "user_reports" ("id" integer primary key autoincrement not null, "user_id" integer not null, "subject" varchar not null, "description" text not null, "category" varchar not null, "attachment" varchar, "status" varchar check ("status" in ('pending', 'reviewing', 'resolved', 'rejected')) not null default 'pending', "admin_notes" text, "created_at" datetime, "updated_at" datetime, foreign key("user_id") references "users"("id") on delete cascade);


CREATE TABLE "reports" ("id" integer primary key autoincrement not null, "user_id" integer not null, "title" varchar not null, "description" text, "file_path" varchar not null, "file_name" varchar not null, "file_type" varchar not null, "file_size" integer not null, "download_count" integer not null default '0', "is_public" tinyint(1) not null default '1', "created_at" datetime, "updated_at" datetime, foreign key("user_id") references "users"("id") on delete cascade);


CREATE TABLE "passkeys" ("id" integer primary key autoincrement not null, "user_id" integer not null, "name" varchar not null, "credential_id" varchar not null, "credential" text not null, "last_used_at" datetime, "created_at" datetime, "updated_at" datetime, foreign key("user_id") references "users"("id") on delete cascade);


