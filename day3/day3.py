with open('day3_input.txt') as f:
    triangles = f.readlines()

i = 0
p = 0

for triangle in triangles:
    triangle = triangle.strip().split();
    triangle[0] = int(triangle[0])
    triangle[1] = int(triangle[1])
    triangle[2] = int(triangle[2])

    if (triangle[0] + triangle[1] > triangle[2]) and (triangle[1] + triangle[2] > triangle[0]) and (triangle[2] + triangle[0] > triangle[1]):
        p=p+1

    if triangle[0] + triangle[1] < triangle[2]:
#        print "%d + %d < %d" % (triangle[0], triangle[1], triangle[2])
        continue
    if triangle[1] + triangle[2] < triangle[0]:
#        print "%d + %d < %d" % (triangle[1], triangle[2], triangle[0])
        continue
    if triangle[2] + triangle[0] < triangle[1]:
#        print "%d + %d < %d" % (triangle[2], triangle[0], triangle[1])
        continue



    i = i + 1
#    print i

print i
print p
