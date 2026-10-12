-- ChuoCredit partner registrations
-- Table prefix is eco_ (CodeIgniter dbprefix), so ecoplus_paid_reg => eco_ecoplus_paid_reg.

ALTER TABLE eco_ecoplus_paid_reg
    ADD COLUMN partner_reference VARCHAR(64) NULL AFTER waba_reg_code,
    ADD COLUMN payment_reference VARCHAR(64) NULL AFTER partner_reference,
    ADD COLUMN payment_channel   VARCHAR(32) NULL AFTER payment_reference,
    ADD UNIQUE KEY uq_partner_reference (registered_by, partner_reference),
    ADD KEY idx_paid_reg_mobile (mobile);

-- API key for ChuoCredit. Generate the token with e.g.:  openssl rand -hex 48
-- Share the token with ChuoCredit over a secure channel; never commit it.
INSERT INTO eco_rest_api_keys (username, cert) VALUES ('chuocredit', '<GENERATED_TOKEN>');
