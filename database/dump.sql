INSERT INTO place ("id", "name", "type", "people_count", "light_state",
                   "heater_state", "ac_state", "vent_state", "shut_down")
VALUES
    ('d3b13593-ea5c-4514-85dc-91f8873fe478', 'A104', 'bureau', 0, false, 0, 0, 0, false),
    ('7cebcd19-cd4f-499a-94d7-3fcf63cf01e9', 'A105', 'salle', 0, false, 0, 0, 0, false),
    ('f5893611-b6e9-447b-9c09-12903c0b886c', 'A106', 'salle', 0, false, 0, 0, 0, false);

--Pour '33f0c468-34bf-4e5e-a2d6-8d90f4a7d1d2', A104
INSERT INTO node ("id", "name", "place_id") VALUES
    ('152b27fa-1e78-4cda-a3b9-66d592123402', 'co2', 'd3b13593-ea5c-4514-85dc-91f8873fe478'),
    ('21780020-e515-4182-a2bd-652cb1c35a57', 'temperature', 'd3b13593-ea5c-4514-85dc-91f8873fe478'),
    ('034bd42d-efc9-4a36-9954-2026de06296c', 'luminosity', 'd3b13593-ea5c-4514-85dc-91f8873fe478'),
    ('e9a7bc0f-7175-4066-938a-40e7538c6fad', 'humidity', 'd3b13593-ea5c-4514-85dc-91f8873fe478'),
    ('86237e63-89cf-45d3-b61a-dc0c592aee09', 'adc', 'd3b13593-ea5c-4514-85dc-91f8873fe478'),
    ('ec3ce68c-b315-473e-b7b1-a5f41321a564', 'sound', 'd3b13593-ea5c-4514-85dc-91f8873fe478'),
    ('16ce9d75-6a19-43c2-a982-eb6df7bb02e2', 'light', 'd3b13593-ea5c-4514-85dc-91f8873fe478'),
    ('27fcd53e-8f2f-4ee0-8eb4-263f9d7642ac', 'vent', 'd3b13593-ea5c-4514-85dc-91f8873fe478'),
    ('da6ed2b2-ef56-42ad-9d3b-27b8447eeae5', 'heater', 'd3b13593-ea5c-4514-85dc-91f8873fe478'),
    ('9794c6aa-10bc-4998-9480-8206011fadd7', 'voltage', 'd3b13593-ea5c-4514-85dc-91f8873fe478'),
    ('41d795e2-eb88-417f-8292-dc4e5b0f1609', 'movement', 'd3b13593-ea5c-4514-85dc-91f8873fe478'),
    ('57ac6eca-c1bc-4f3f-95c7-809aafe6306d', 'passage', 'd3b13593-ea5c-4514-85dc-91f8873fe478'),
    ('76c69acf-649f-4005-a724-d5ebdb43fe2b', 'ac', 'd3b13593-ea5c-4514-85dc-91f8873fe478'),
    ('17327887-a7af-4241-bff0-80d713d87d01', 'atmospheric_pressure', 'd3b13593-ea5c-4514-85dc-91f8873fe478');

-- Pour '9a03d8c0-bcc7-47cc-937d-68117c1a29d4' A105
INSERT INTO node ("id", "name", "place_id") VALUES
    ('67baa2e4-cc1f-40f8-9f68-17bfc3366bb9', 'co2', '7cebcd19-cd4f-499a-94d7-3fcf63cf01e9'),
    ('6cc19be7-3af8-46dd-976f-cbdb544e8c6c', 'temperature', '7cebcd19-cd4f-499a-94d7-3fcf63cf01e9'),
    ('2af9597b-b82a-41d7-963a-ae7606bc4306', 'luminosity', '7cebcd19-cd4f-499a-94d7-3fcf63cf01e9'),
    ('eeeb9086-9a95-4792-9f25-13e5b46916ba', 'humidity', '7cebcd19-cd4f-499a-94d7-3fcf63cf01e9'),
    ('022d8cfa-c1a4-4aa7-b3e1-c45ce27ddcc4', 'adc', '7cebcd19-cd4f-499a-94d7-3fcf63cf01e9'),
    ('3a15981e-f45e-4000-9995-0647e179426d', 'sound', '7cebcd19-cd4f-499a-94d7-3fcf63cf01e9'),
    ('a3d6bd45-5a64-42e2-9d89-c3b10a65150e', 'light', '7cebcd19-cd4f-499a-94d7-3fcf63cf01e9'),
    ('e1140d26-e9d2-4342-9542-e655d0ec2441', 'vent', '7cebcd19-cd4f-499a-94d7-3fcf63cf01e9'),
    ('16ad8854-6254-4e27-99b2-71ca4ea51c4e', 'heater', '7cebcd19-cd4f-499a-94d7-3fcf63cf01e9'),
    ('400bf734-a93f-4770-8b3b-d7c5fcbb2c54', 'voltage', '7cebcd19-cd4f-499a-94d7-3fcf63cf01e9'),
    ('95b409c0-eae0-44d1-90ee-2a425e8c994f', 'movement', '7cebcd19-cd4f-499a-94d7-3fcf63cf01e9'),
    ('28b1d692-7f79-4008-b311-c8d2135e9dbd', 'passage', '7cebcd19-cd4f-499a-94d7-3fcf63cf01e9'),
    ('8de58053-a110-4306-8827-dd8db73c65d1', 'ac', '7cebcd19-cd4f-499a-94d7-3fcf63cf01e9'),
    ('1bedb318-a3e1-4b4c-a9dd-e75cd073e01c', 'atmospheric_pressure', '7cebcd19-cd4f-499a-94d7-3fcf63cf01e9');

-- Pour '247f7519-ba7f-4c77-b3a1-4d682fc2ff8e' A106
INSERT INTO node ("id", "name", "place_id") VALUES
    ('47b51269-8be4-47c9-907e-44a3c145d31e', 'co2', 'f5893611-b6e9-447b-9c09-12903c0b886c'),
    ('426a1cf2-65e9-46ba-a1a8-d950d48214d5', 'temperature', 'f5893611-b6e9-447b-9c09-12903c0b886c'),
    ('64bd8bbe-d3b4-4ddc-99d6-beaa28e05722', 'luminosity', 'f5893611-b6e9-447b-9c09-12903c0b886c'),
    ('0d5e0862-067c-4d6e-a9d3-db9e9e156a61', 'humidity', 'f5893611-b6e9-447b-9c09-12903c0b886c'),
    ('197ed5d5-bf4a-4f06-a3de-aab9378661b2', 'adc', 'f5893611-b6e9-447b-9c09-12903c0b886c'),
    ('0e9ce1ac-010d-4426-ade5-b558c33535a2', 'sound', 'f5893611-b6e9-447b-9c09-12903c0b886c'),
    ('f830308c-86ae-43e2-88e5-0b5fb584040c', 'light', 'f5893611-b6e9-447b-9c09-12903c0b886c'),
    ('123eac3b-f0fe-4218-8d68-780faef072a4', 'vent', 'f5893611-b6e9-447b-9c09-12903c0b886c'),
    ('eb316717-faaa-4592-8e79-b6b703a1538a', 'heater', 'f5893611-b6e9-447b-9c09-12903c0b886c'),
    ('7853d1b0-f390-4278-a49f-2058eb3be81f', 'voltage', 'f5893611-b6e9-447b-9c09-12903c0b886c'),
    ('4a9fd9c2-54f6-4d2d-a717-69f9fbcedda9', 'movement', 'f5893611-b6e9-447b-9c09-12903c0b886c'),
    ('6322871f-dab9-414e-ac34-eb16848f1a08', 'passage', 'f5893611-b6e9-447b-9c09-12903c0b886c'),
    ('86f1af4a-23d7-4824-b576-289a7e2b7864', 'ac', 'f5893611-b6e9-447b-9c09-12903c0b886c'),
    ('d57ffe67-753e-4de0-9379-7f2d4cfe7f55', 'atmospheric_pressure', 'f5893611-b6e9-447b-9c09-12903c0b886c');

-- User

INSERT INTO "user" ("id", "email", "roles", "password", "first_name", "last_name", "admin") VALUES
    ('01896406-f234-7860-a596-5e8ef6acec55', 'sarah@admin.com', '["ROLE_ADMIN"]', '$2y$13$h4Fh37q0OxDqboIivm2M4uP.k8y5wryGUXOdvFL27GEo1lx9GzDlK', 'Sarah', 'Aziza', true),
    ('01896407-2e07-7753-bc70-2fe05353b57a', 'markjohnson@gmail.com', '["ROLE_USER"]', '$2y$13$YshhjbpAJR.hPK2sSXhz2Oq/JiZEQ22Kmze9By8jkk/RKOX0XSqAK', 'Mark', 'Johnson', false),
    ('01896407-5650-7e03-9aea-2acb9ecb2867', 'janesmith@gmail.com', '["ROLE_USER"]', '$2y$13$tzr5Ma4CFWJy7pn27EKtK.JpWD/ubb9QvQwgXRbSLoCFrGkGw2.V6', 'Jane', 'Smith', false),
    ('01896407-84bb-72c6-abc5-49e001a836aa', 'johndoe@gmail.com', '["ROLE_USER"]', '$2y$13$jluAw6MSJuhriXkXBxauZeYUKj5yx7OuUFrbhmah1meTjG7tYAVg6', 'John', 'Doe', false),
    ('01896407-ad44-7364-9fb9-6ac866426555', 'bob@admin.com', '["ROLE_ADMIN"]', '$2y$13$SknQo9QbN4ex2uaqZmVE..zENB/pMsB2TIIIfUeuXsUaBW3PbSW3q', 'Bob', 'Sinclair', true),
    ('01896407-db3a-7116-934a-3c718f5e12ba', 'alice@admin.com', '["ROLE_ADMIN"]', '$2y$13$sE5TGUFxlEgYzAVREd8DkOYaYkxL0nCQbIy1oWctdroVwImdz0xdO', 'Alice', 'Land', true);
