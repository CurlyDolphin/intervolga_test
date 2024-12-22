DELETE 
    c, p, s
FROM 
    categories c
LEFT JOIN products p 
    ON c.id = p.category_id
LEFT JOIN availabilities a 
    ON p.id = a.product_id
LEFT JOIN stocks s 
    ON s.id = a.stock_id
WHERE 
   p.id IS NULL 
   OR a.product_id IS NULL 
   OR a.stock_id IS NULL;