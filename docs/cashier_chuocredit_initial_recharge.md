# Cashier card collection: ChuoCredit students get TZS 11,000 initial recharge

Changes to `registerSubscriberByAmbassadorEcoPlus()` and `_initial_recharge()`.
WhatsApp (waba_ecoplus) and ambassador students keep TZS 1,000.

## 1. Detect a ChuoCredit student (from the database, not the form)

Right after:
```php
$waba_reg_code_ecoplus = $this->input->post('waba_reg_code_ecoplus');
```
add:
```php
// ChuoCredit students are identified by their ecoplus_paid_reg row
$is_chuocredit_reg = false;
if (!empty($waba_reg_code_ecoplus)) {
    $paid_reg = $this->db->get_where('eco_ecoplus_paid_reg', array('waba_reg_code' => $waba_reg_code_ecoplus))->row();
    $is_chuocredit_reg = ($paid_reg && $paid_reg->registered_by === 'chuocredit');
}
```

## 2. Keep `registered_by = 'chuocredit'` on the subscriber

Replace:
```php
if ($is_waba_reg === 'Y') {
    $registered_by = 'waba_ecoplus';
} elseif ($is_ambasador_reg === 'Y') {
```
with:
```php
if ($is_chuocredit_reg) {
    $registered_by = 'chuocredit';
} elseif ($is_waba_reg === 'Y') {
    $registered_by = 'waba_ecoplus';
} elseif ($is_ambasador_reg === 'Y') {
```

## 3. Initial recharge amount

Replace:
```php
$topup_amount = $this->_initial_recharge($card_no, $sub_id);
```
with:
```php
$initial_amount = $is_chuocredit_reg ? 11000 : 1000;
$topup_amount = $this->_initial_recharge($card_no, $sub_id, $initial_amount);
```

## 4. SMS shows the right litres (1L = TZS 200)

Replace the message line with:
```php
$litres = $initial_amount / 200;
$message = 'Ecowater account successfully created on ' . date('d/m/y H:i') . ' Cost: Tsh 5,000 and initial ' . $litres . 'L offer. Tap validator to validate. Customer Care ' . $system_param->customer_care_1 . '/' . $system_param->customer_care_2;
```

## 5. `_initial_recharge()` takes the amount

Change:
```php
function _initial_recharge($card_no, $sub_id)
{
    $sub_data = $this->db->get_where('sub_card_vw', array('sub_id' => $sub_id))->row();
    $amount = 1000;
```
to:
```php
function _initial_recharge($card_no, $sub_id, $amount = 1000)
{
    $sub_data = $this->db->get_where('sub_card_vw', array('sub_id' => $sub_id))->row();
```
The default stays 1000, so every other caller is unchanged.
