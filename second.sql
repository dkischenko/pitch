#Написать запрос, желательно без подзапросов, отыскивающий неуникальные значения id в таблице texts
SELECT id FROM texts GROUP BY id HAVING COUNT(*) > 1;

#Составить запрос, желательно без подзапросов,
# который выбирает все категории у которых есть потомки, но нет связанных текстов

select *
from category
where parent_id IS NOT NULL and texts_id IS NULL;

добавить индексы для колонок
create index idx_id ON texts(id);
create index idx_texts_id ON category(texts_id);

