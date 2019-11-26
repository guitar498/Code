#First matrix
R=int(input("Enter number of first rows : "))
C=int(input("Enter number of first columns: "))
if(R != 0 and C != 0):
    matrix = []
    print("Enter the entries rowwise:")      
    for i in range(R):          
        a =[] 
        for j in range(C):      
             a.append(int(input())) 
        matrix.append(a) 
       
    for i in range(R): 
        for j in range(C): 
            print(matrix[i][j], end = " ") 
        print()

    #Second matrix
    R2=int(input("Enter number of second rows : "))
    C2=int(input("Enter number of second columns: "))
    if(R2 != 0 and C2 != 0):
            matrix2 = []
            print("Enter the entries rowwise:")

            for I in range(R2):          
                b =[] 
                for J in range(C2):      
                     b.append(int(input())) 
                matrix2.append(b) 
               
            for I in range(R2): 
                for J in range(C2): 
                    print(matrix2[I][J], end = " ") 
                print()
            print()
            #result of multiply
            result= []
            for i in range(len(matrix)):
                new=[]
                for j in range(len(matrix2[0])):
                        new.append(0)
                result.append(new)

            if(C==R2):
                for y in range(len(matrix)):      
                    for z in range(len(matrix2[0])):
                        for k in range(len(matrix2)):
                            result[y][z] += matrix[y][k]*matrix2[k][z]
                for Y in result:
                    print(Y)
            else:
                print("Multiplication not possible")

    else:
        print("invalid matrix")
        
else:
    print("invalid matrix")


    


