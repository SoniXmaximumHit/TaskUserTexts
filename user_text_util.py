import csv
import os
dict_list=[]
def reat_csv():
    """Открывает .csv файл и считывает 
    id(int) и name(str) построчно
    в лист словаря"""
    list=[]; arr=[]; f_csv= 'people.csv'
    with open(f_csv, 'r', newline='') as csvfile:
        reader = csv.reader(csvfile)
        for row in reader:
            arr.append(', '.join(row))
    for i in arr:
        dict_csv={};
        dict_csv["namber"]=int(i.split(';')[0])
        dict_csv["name"]=i.split(';')[1]
        list.append(dict_csv)    
    return list
def read_texts():
    """Открывает папку texts/ и считывает 
    вложенное в лист словаря"""
    path='texts/'
    dict_list=reat_csv()
    for rootdir, dirs, files in os.walk(path):
        for i in range(len(dict_list)):
            arr_line_mass=[]
            for file in files:  
                a=dict_list[i].get('namber')                      
                if int((file.split('-')[0]))==a:                  
                    with open(path+file, "r") as txtfile:
                        arr_line=[];
                        line=txtfile.read()
                        arr_line.append(line)
                    arr_line_mass.append(line)
            dict_list[i].update({"texts":arr_line_mass})
    return dict_list

def countAverageLineCount():
    """Функция находит и выводит среднее количество 
    строк на одного пользователя"""   
    global dict_list
    dict_list=  read_texts()       
    for i in range(len(dict_list)):
        ct=0
        a=dict_list[i].get('texts')
        for m in a:
            """Перебор строк в файле"""  
            ct=ct+1
            ct+=m.count('\n')
        dict_list[i].update({"count_line":round(ct/len(a))}) 

def replaceDates():
    """Функция находит "/" и заменяет на "-", записывает эти 
    данные в папку output_texts/, выводит количество замен"""  
    global dict_list
    dict_list=  read_texts()
    for i in range(len(dict_list)):
        ct=0; mass=[]
        a=dict_list[i].get('texts')            
        for m in a:
            """Перебор строк в файле"""  
            m1 = m.replace('/', '-') 
            ct+=m.count('/')
            mass.append(m1)
        dict_list[i].update({"texts":mass,"count_replace":ct})  
    output_texts(dict_list) 
def output_texts(dict_list):
    """Открывает папку output_texts/ и добавляет 
    туда изменённые файлы из папки texts/"""    
    path="output_texts/"
    for i in range(len(dict_list)): 
        for j in range(len(dict_list[i].get("texts"))):
            name_file=path+"{0}-{1:03d}.txt".format(i+1,j+1)
            b = dict_list[i].get("texts")[j]
            with open(name_file, 'w') as f:
                f.write(b)

def print_symbol(x,symbol,y):
    """Форма строки (имя,символ,число)"""
    print(x+symbol+y)
def print_full(s): 
    """Вывод строки со знаком (,) или (;)""" 
    global dict_list  
    for i in range(len(dict_list)): 
        a=str(dict_list[i].get("name"))
        b=str(dict_list[i].get("count_replace"))
        c=str(dict_list[i].get("count_line"))
        if b != 'None':            
            print_symbol(a,s,b)
        if c != 'None':        
            print_symbol(a,s,c)   
def comma():
    """Вывод строки со знаком (,)""" 
    print_full(',')
def semicolon ():
    """Вывод строки со знаком (;)""" 
    print_full(';')




replaceDates()
comma()


#countAverageLineCount()
#semicolon ()
# 
# #print(dict_list)
