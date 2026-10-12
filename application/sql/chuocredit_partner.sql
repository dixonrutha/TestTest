-- ChuoCredit partner API key (table prefix eco_).
-- Generate the token with e.g.:  openssl rand -hex 48
-- Share the token with ChuoCredit over a secure channel; never commit it.
INSERT INTO eco_rest_api_keys (username, cert) VALUES ('chuocredit', '<GENERATED_TOKEN>');
