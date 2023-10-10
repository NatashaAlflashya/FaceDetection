from ItemController import ItemController
from ItemView import ItemView
from ItemModel import ItemModel

def main():
    my_items = [
        {'name': 'bread', 'price': 0.5, 'quantity': 20},
        {'name': 'milk', 'price': 1.0, 'quantity': 10},
        {'name': 'wine', 'price': 10.0, 'quantity': 5},
        ]

    c = ItemController(ItemModel(my_items), ItemView())
    c.show_items()
    
if __name__ == "__main__":
     main()