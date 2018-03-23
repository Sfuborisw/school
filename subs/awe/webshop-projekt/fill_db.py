lang_dict = {'en_fname_input': 'varchar(50)', 'de_fname_input': 'varchar(50)', 'en_lname_input': 'varchar(50)', 'de_lname_input': 'varchar(50)', 'en_city_code_input': 'varchar(50)', 'de_city_code_input': 'varchar(50)', 'en_city_name_input': 'varchar(50)', 'de_city_name_input': 'varchar(50)', 'en_street_input': 'varchar(50)', 'de_street_input': 'varchar(50)', 'en_housenr_input': 'varchar(50)', 'de_housenr_input': 'varchar(50)', 'en_register_btn': 'varchar(50)', 'de_register_btn': 'varchar(50)', 'en_pass_input': 'varchar(50)', 'de_pass_input': 'varchar(50)', 'en_birthdate_input': 'varchar(50)', 'de_birthdate_input': 'varchar(50)', 'en_web_title': 'varchar(50)', 'de_web_title': 'varchar(50)', 'en_cart_title': 'varchar(50)', 'de_cart_title': 'varchar(50)', 'en_add_to_cart_btn': 'varchar(50)', 'de_add_to_cart_btn': 'varchar(50)', 'en_placeholder': 'varchar(50)', 'de_placeholder': 'varchar(50)'}

for el in lang_dict:
    if el[0:2] == 'en':
        #print "${0} = $row[$lang.'{0}'];".format(el[3:])
        print "<?php echo ${0}; ?>".format(el[3:])
