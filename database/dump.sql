INSERT INTO place ("id", "name", "type", "people_count", "light_state", "warm_state", "clim_state") VALUES
    ('d3b13593-ea5c-4514-85dc-91f8873fe478', 'A104', 'bureau', 0, false, false, false),
    ('7cebcd19-cd4f-499a-94d7-3fcf63cf01e9', 'A105', 'salle', 0, false, false, false),
    ('f5893611-b6e9-447b-9c09-12903c0b886c', 'A106', 'salle', 0, false, false, false),
    ('a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9', 'A107', 'bureau', 0, false, false, false),
    ('67f6e308-7b79-4a7d-9ad9-85a5c24d4db1', 'A108', 'bureau', 0, false, false, false),
    ('efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0', 'A109', 'bureau', 0, false, false, false),
    ('d583ea32-2c11-4e92-87ef-1b19a59e2e45', 'A110', 'bureau', 0, false, false, false),
    ('5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c', 'A111', 'salle', 0, false, false, false),
    ('84d49fc1-2116-47e0-b5c7-60d20c0c37e7', 'A112', 'salle', 0, false, false, false),
    ('6a98b4f8-9e45-4d78-a07f-78db161628b9', 'A113', 'salle', 0, false, false, false),
    ('f8103f76-458d-4d08-8945-7792dca0e69c', 'cafet 1', 'commun', 0, false, false, false),
    ('b3fc76e9-60e2-4018-b39c-1053c65a8539', 'cafet 2', 'commun', 0, false, false, false),
    ('032e1f5d-2de3-4f29-9a5f-c79e31f78884', 'couloir', 'commun', 0, false, false, false);

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











-- Pour 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9' A107
INSERT INTO node ("id", "name", "place_id") VALUES
    ('3d64a034-381b-46b7-b2a4-428b1ae4f2b3', 'mouvement', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9'),
    ('e0d1c8a3-64b4-4d35-8934-1b14a9c5f32a', 'eau', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9'),
    ('b58e8f59-48af-4eab-a31c-34d5d7a78dbf', 'co2', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9'),
    ('f7d5163b-003b-4c8c-9f48-268bd87f48e9', 'fumee', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9'),
    ('83a11e2a-9e34-44e4-9b71-3c5f4183c2f0', 'temperature', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9'),
    ('d10f7b79-5c7d-4ff1-97f2-7e37ef29e3e9', 'luminosite', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9'),
    ('15d55d1c-6f2e-49b2-93fe-10586d501cb2', 'relay', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9'),
    ('2e7eb63a-53e5-4b3c-8199-50bc9beee84d', 'relay', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9'),
    ('a7e244fb-3db0-4e11-a8c0-7526fddfc6e4', 'relay', 'a848cf1a-0e3b-4e89-b6e3-2c7b2163a6f9');

-- Pour '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1' A108
INSERT INTO node ("id", "name", "place_id") VALUES
    ('28cd4e0d-2c85-441e-9f8a-961a4761d2ed', 'mouvement', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1'),
    ('90868fc2-7cfd-4d5e-b92c-78af6bc440c6', 'eau', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1'),
    ('f7580d60-5a64-46f1-9e74-4ac0f536f431', 'co2', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1'),
    ('0f9e3df6-7a4e-4f92-824b-4e49b8a63be1', 'fumee', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1'),
    ('f749c13b-3ab1-47a4-979e-48d1a21e8ea2', 'temperature', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1'),
    ('a8b3c1e5-98f4-4ef5-8c47-1efbc7e7ff17', 'luminosite', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1'),
    ('68e043cc-0b6e-45b0-97e1-14a1e2429e7a', 'relay', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1'),
    ('f1e7e5ef-2f7f-41c6-889d-34ddbfbbd9b5', 'relay', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1'),
    ('f92e7e3d-d301-4f96-ba1c-d0ff83bb6475', 'relay', '67f6e308-7b79-4a7d-9ad9-85a5c24d4db1');

-- Pour 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0' A109
INSERT INTO node ("id", "name", "place_id") VALUES
    ('6e8d22e0-0e96-4b2b-9e3e-7f8c6d6e6010', 'mouvement', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0'),
    ('3d73a32f-5a9d-4e70-8298-1f2955166aae', 'eau', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0'),
    ('191a5d12-bf60-4985-8a5a-651ae18054c6', 'co2', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0'),
    ('c9b1005e-0402-4dbf-9db6-7b9d4c9a4e79', 'fumee', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0'),
    ('8239921a-57d2-4815-881f-fc91e5b84e75', 'temperature', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0'),
    ('d2d0434b-1d46-4769-b5c4-23e051e735a9', 'luminosite', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0'),
    ('97856e37-22d3-4f3a-81d1-f3b7d8e1b986', 'relay', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0'),
    ('d87c3af0-4fa9-43b5-8c7e-235813f89768', 'relay', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0'),
    ('784be3c4-8926-4e49-b881-2b3b1f071be9', 'relay', 'efb3b5a7-1f3a-4b4f-a44d-d1c12e9373c0');

-- Pour 'd583ea32-2c11-4e92-87ef-1b19a59e2e45' A110
INSERT INTO node ("id", "name", "place_id") VALUES
    ('9f9946d4-71df-459d-b784-11d9c7a536e0', 'mouvement', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45'),
    ('9ad80929-5e4f-4a84-8dd6-8a9ae2c19a8c', 'eau', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45'),
    ('3f8e1ef7-3a7e-4e3b-99a7-81c9885a623f', 'co2', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45'),
    ('c6220e7e-aa5f-4c36-bc62-2f01e4ed72e6', 'fumee', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45'),
    ('bf3d0c5d-79c0-4c14-86ad-00e1dabf3f37', 'temperature', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45'),
    ('30d152ae-d5e4-4b62-80d2-9c55bb2021d4', 'luminosite', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45'),
    ('a6a38950-0325-4a2f-8eaf-6708ad0a99e5', 'relay', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45'),
    ('90b5c0a0-8582-48b1-9f95-65d1ed8e2b9f', 'relay', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45'),
    ('ab9f525f-8763-43e6-b036-1b55d97bb8ff', 'relay', 'd583ea32-2c11-4e92-87ef-1b19a59e2e45');



-- Pour '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c' A111
INSERT INTO node ("id", "name", "place_id") VALUES
    ('e3c15b7b-08fb-4c46-a2db-c0b7e541d5f1', 'mouvement', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c'),
    ('f8779e84-3be4-4cb2-956a-3ce5c7b4da60', 'eau', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c'),
    ('b9e9372d-0af2-4fdd-a7b0-6179132b2d02', 'co2', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c'),
    ('8e637f7d-94f2-4e01-9d60-3b738c96b5b4', 'fumee', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c'),
    ('73ef16d1-6b69-4a38-9070-25cc20db29f7', 'temperature', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c'),
    ('dd2ee924-6015-4f24-8ad2-6a4ab1c78d97', 'luminosite', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c'),
    ('2e9e07e2-ee20-4db5-b878-5b153e30d88b', 'relay', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c'),
    ('b7f9dc2a-59d2-4f59-a32b-c541c942c431', 'relay', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c'),
    ('aeb5b89d-309f-4c89-8af7-361c6c7f8652', 'relay', '5e2e4a32-1b3e-4bc6-8b17-0ff1f3c72f6c');

-- Pour '84d49fc1-2116-47e0-b5c7-60d20c0c37e7' A112
INSERT INTO node ("id", "name", "place_id") VALUES
    ('8e696d7e-cc2b-4df4-88ea-bd8238cbe5f0', 'mouvement', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7'),
    ('a8dc7473-4ad5-4b20-b5f7-3d7f9b5aeb5b', 'eau', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7'),
    ('7db8e6ce-c723-4ce4-89d0-5806b594ce89', 'co2', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7'),
    ('a3ebe4b6-8988-4a2d-91b9-48f18d80eefb', 'fumee', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7'),
    ('a2b9cde4-78e5-4f1e-8a6a-01f2492da770', 'temperature', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7'),
    ('30c14884-cb54-437e-88a0-2d726bde29cd', 'luminosite', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7'),
    ('b5d476fc-11df-48c6-9e2d-4ac3f492a5c0', 'relay', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7'),
    ('b3f0e1a6-d56a-405a-947d-d3f8033d9843', 'relay', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7'),
    ('ef8d5b30-c5c0-4e92-bb50-0a31d3f3b4c9', 'relay', '84d49fc1-2116-47e0-b5c7-60d20c0c37e7');

-- Pour '6a98b4f8-9e45-4d78-a07f-78db161628b9' A113
INSERT INTO node ("id", "name", "place_id") VALUES
    ('da95a831-06b3-43e7-8b4b-b8d91e2ff044', 'mouvement', '6a98b4f8-9e45-4d78-a07f-78db161628b9'),
    ('a9a35f7a-aa11-4c2a-8d9e-8e8c9886de04', 'eau', '6a98b4f8-9e45-4d78-a07f-78db161628b9'),
    ('a0128f2c-3897-4dbf-8c08-5f8f1a6dd2f1', 'co2', '6a98b4f8-9e45-4d78-a07f-78db161628b9'),
    ('09c3a6c1-7902-4e2b-ae16-f7b996b28fa0', 'fumee', '6a98b4f8-9e45-4d78-a07f-78db161628b9'),
    ('a208bd0f-89b3-49d9-881d-1c927c95653f', 'temperature', '6a98b4f8-9e45-4d78-a07f-78db161628b9'),
    ('d1d7b82b-2b85-4de4-981a-61b5d44c051f', 'luminosite', '6a98b4f8-9e45-4d78-a07f-78db161628b9'),
    ('4fb9e7a4-7eaa-42fd-9649-34c56ee6e48f', 'relay', '6a98b4f8-9e45-4d78-a07f-78db161628b9'),
    ('e50e03fe-8734-4b1f-91d9-4d6303e7d6ab', 'relay', '6a98b4f8-9e45-4d78-a07f-78db161628b9'),
    ('b1b08ff5-44e5-4d63-a8da-05286f4d7fbf', 'relay', '6a98b4f8-9e45-4d78-a07f-78db161628b9');

-- Pour 'f8103f76-458d-4d08-8945-7792dca0e69c' cafet 1
INSERT INTO node ("id", "name", "place_id") VALUES
    ('3e0a4185-1869-4eaa-af22-736c4a9bca4b', 'mouvement', 'f8103f76-458d-4d08-8945-7792dca0e69c'),
    ('2d8f63e1-646f-4c9e-9d9a-3e97c47a8e59', 'eau', 'f8103f76-458d-4d08-8945-7792dca0e69c'),
    ('e20e6d45-7fb5-4c10-aadd-b9c9b40ab252', 'co2', 'f8103f76-458d-4d08-8945-7792dca0e69c'),
    ('6fc47b2f-4b3f-4b02-82d2-2d3c21fb5f15', 'fumee', 'f8103f76-458d-4d08-8945-7792dca0e69c'),
    ('9a598e16-6d4d-4d1e-9185-6b7f5b57b8d2', 'temperature', 'f8103f76-458d-4d08-8945-7792dca0e69c'),
    ('b1b787c3-9f0d-4fb7-86be-9e5cde1d3ab1', 'luminosite', 'f8103f76-458d-4d08-8945-7792dca0e69c'),
    ('43e2bb50-16a2-46e2-862a-02b36ff20177', 'relay', 'f8103f76-458d-4d08-8945-7792dca0e69c'),
    ('78a63f9b-2d0c-421f-b207-af76866d4b3e', 'relay', 'f8103f76-458d-4d08-8945-7792dca0e69c'),
    ('20989c63-6bb3-47ff-bba1-69f9f158001d', 'relay', 'f8103f76-458d-4d08-8945-7792dca0e69c');

-- Pour 'b3fc76e9-60e2-4018-b39c-1053c65a8539' cafet 2
INSERT INTO node ("id", "name", "place_id") VALUES
    ('2b7a6d2c-6837-421e-bc14-b5a628a8b16c', 'mouvement', 'b3fc76e9-60e2-4018-b39c-1053c65a8539'),
    ('0c425cc2-8394-49c0-9ae2-702d39435b87', 'eau', 'b3fc76e9-60e2-4018-b39c-1053c65a8539'),
    ('feea61f5-df6d-4de0-af74-2dbb7564b1d7', 'co2', 'b3fc76e9-60e2-4018-b39c-1053c65a8539'),
    ('08d8d9f1-7212-439d-9a4f-26fe2e5e179a', 'fumee', 'b3fc76e9-60e2-4018-b39c-1053c65a8539'),
    ('4da9f9d7-2b6d-40cd-b309-4e0c3ddc7324', 'temperature', 'b3fc76e9-60e2-4018-b39c-1053c65a8539'),
    ('768a2b53-bf96-4da4-aa5b-7a74f73e4f55', 'luminosite', 'b3fc76e9-60e2-4018-b39c-1053c65a8539'),
    ('a36a348b-2e57-40d4-a9db-859014c800a2', 'relay', 'b3fc76e9-60e2-4018-b39c-1053c65a8539'),
    ('c7be15b3-776f-4da1-ba97-ae9c85a133f4', 'relay', 'b3fc76e9-60e2-4018-b39c-1053c65a8539'),
    ('f68995f6-40d6-4859-8ab9-3c0e5d2f7fc3', 'relay', 'b3fc76e9-60e2-4018-b39c-1053c65a8539');

-- Pour '032e1f5d-2de3-4f29-9a5f-c79e31f78884' couloir
INSERT INTO node ("id", "name", "place_id") VALUES
    ('ad1246f1-12b5-48a6-8983-6e51a9946e4c', 'mouvement', '032e1f5d-2de3-4f29-9a5f-c79e31f78884'),
    ('7c7d6a5e-40d3-40c7-a2cc-73fdac065b6c', 'eau', '032e1f5d-2de3-4f29-9a5f-c79e31f78884'),
    ('82272369-4ae1-4e8a-894a-18c84e9c8c16', 'co2', '032e1f5d-2de3-4f29-9a5f-c79e31f78884'),
    ('f8dbd3ad-0db7-4f78-8b53-f0328c84e8c2', 'fumee', '032e1f5d-2de3-4f29-9a5f-c79e31f78884'),
    ('a95e6e63-40d5-4e2e-a90c-04c1510d8926', 'temperature', '032e1f5d-2de3-4f29-9a5f-c79e31f78884'),
    ('3e9598e1-c4d3-4a3b-8d36-3d8c1f8098a3', 'luminosite', '032e1f5d-2de3-4f29-9a5f-c79e31f78884'),
    ('6ce9124b-601a-45ff-a7d1-656192c4a1e9', 'relay', '032e1f5d-2de3-4f29-9a5f-c79e31f78884'),
    ('c24c0fb4-3146-45f7-ae6e-26ef6db154a0', 'relay', '032e1f5d-2de3-4f29-9a5f-c79e31f78884'),
    ('7fbb3ed1-d334-4493-9888-b5f1ab6e09f0', 'relay', '032e1f5d-2de3-4f29-9a5f-c79e31f78884');
