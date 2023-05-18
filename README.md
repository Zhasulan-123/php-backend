# Тестовое задание для архитектора backend

## Я внес следующие изменения:

1. Созданы отдельные закрытые методы в классе «Shop» для обработки логики обновления для каждого типа предметов (regular, blue cheese, concert tickets, magic cake).
2. Удалены ненужные условия if-else и упрощен код за счет использования операторов switch-case.
3. Реорганизован код для повышения удобочитаемости и удобства сопровождения.
4. Добавлены методы `updateBlueCheese()`, `updateConcertTickets()` и `updateMagicCake()` для обработки конкретных правил для этих элементов.
5. Обновлен метод `updateRegularItem()`, чтобы следовать существующим правилам для обычных предметов.
6. Рефакторинг тестовых данных для включения образца элемента «magic cake» для тестирования.

## Система складского учета работает по следующим правилам:

* Regular items: качество уменьшается на 1, а стоимость продажи уменьшается на 1. Если стоимость продажи меньше 0, качество снижается еще на 1 (если качество больше 0).
* Blue cheese: качество увеличивается на 1, а стоимость продажи уменьшается на 1. Если стоимость реализации меньше 0, качество увеличивается еще на 2 (если качество меньше 50).
* Concert tickets: качество увеличивается на 1, а стоимость продажи уменьшается на 1. Если стоимость продажи составляет 10 или меньше, качество увеличивается еще на 1. Если стоимость продажи составляет 5 или меньше, качество увеличивается еще на 1. Если стоимость продажи меньше 0, качество устанавливается равным 0.
* Mjolnir: не меняется ни по качеству, ни по стоимости продажи.
* Magic cake: качество уменьшается на 2, а стоимость продажи уменьшается на 1. Если стоимость продажи меньше 0, качество снижается еще на 2 (если качество больше 0).