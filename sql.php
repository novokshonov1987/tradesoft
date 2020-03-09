Выбрать документ (documents) с максимальной суммой (dcm_summ)

Запрос:
SELECT dcm_id, dcm_summ from  documents
GROUP BY dcm_summ DESC
limit 1

Ответ:
dcm_id	dcm_summ
381	2507.00

//////////////////////////////////////////////////////////////////////
Выбрать клиентов, у которых есть документы с суммой более 1000

SELECT cst_id, dcm_summ FROM customers as c
INNER JOIN documents  as d ON c.cst_id = d.dcm_cst_id
WHERE dcm_summ > 1000
GROUP BY cst_id

cst_id	dcm_summ
354	1278.00


/////////////////////////////////////////////////////////////////////
Выбрать клиентов у которых нет документов

SELECT cst_id, d.dcm_cst_id  FROM customers as c
LEFT JOIN documents  as d ON c.cst_id = d.dcm_cst_id
WHERE dcm_cst_id is NULL


/////////////////////////////////////////////////////////////////////
Соединить все таблицы в один запрос, связь по полям: cst_id = dcm_cst_id, dcm_id = ord_dcm_id, ord_id = pst_ord_id

SELECT *  FROM customers as c
INNER JOIN documents  as d ON c.cst_id = d.dcm_cst_id
INNER JOIN orders as o ON d.dcm_id = o.ord_dcm_id
INNER JOIN positions as p ON o.ord_id = p.pst_ord_id

/////////////////////////////////////////////////////////////////////
Получить клиента, у которого самая большая сумма документов

SELECT cst_id, MAX(dcm_summ)
FROM customers as c
INNER JOIN documents  as d ON c.cst_id = d.dcm_cst_id
GROUP BY cst_id
HAVING MAX(dcm_summ)
ORDER BY MAX(dcm_summ) DESC
LIMIT 1

Ответ
cst_id	MAX(dcm_summ)
354	2507.00
